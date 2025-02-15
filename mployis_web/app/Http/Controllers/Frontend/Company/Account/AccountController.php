<?php

namespace App\Http\Controllers\Frontend\Company\Account;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function handleCompanySignUp(Request $request) {
        $allRequestedData = $request->all();
        $requestedData = array_map(function($value, $key) {
            return ($key != 'password') ? trim($value) : $value;
        }, $allRequestedData, array_keys($allRequestedData));

        $request->merge($requestedData);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|regex:/^(?=.*[a-z])(?=.*[@$!%*?&#]).+$/|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).+$/',
            'cpassword' => 'required|same:password',
            'phone_no' => 'required|max:15|regex:/^\+?[0-9\s\-\(\)]+$/',
            'toc' => 'required|accepted'
        ], [
            'name.required' => 'The name field required.',
            'password.regex' => 'Password must contain at least one letter, one number, and one special character.',
            'cpassword.required' => 'Please enter your confirm password.',
            'toc.required' => 'Agree the terms and conditions.',
        ]);


        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['user_type'] = $request->role;

        $signUpFormData = User::create($validatedData);

        if($signUpFormData) {
            // condition to perform page redirection with ajax
            if($request->ajax()) {
                session()->flash('status', 'Your account has been created successfully!');
                return response()->json([
                    'status' => true, 
                    'message' => 'Your account has been created successfully!', 
                    'redirect' => route('account.company.sign-in')
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, Please try again later!'
            ]);
        }
    }

    public function handleCompanySignIn(Request $request) {
        $validatedData = $request->validate([
           'email' => [
                'required',
                'email',
                'regex:/^(?=.*[a-z])(?=.*[@$!%*?&#]).+$/',
                function ($attribute, $value, $fail) use ($request) {
                    // Check if the email is associated with a company
                    $user = User::where('email', $value)->first();
                    
                    if ($user && $user->user_type === 'candidate') {
                        // Custom error message if user_type is company
                        $fail('This email is associated with a student account. Please log in as an student.');
                    }
                }
            ],
        ], [
            'email.required' => 'Email is required',
            'email.regex' => 'Please enter a valid email address (e.g. example@gmail.com)'
        ]);

        $company = User::where('email', $request->email)->first(); // Get first matching email

        // Check company exists
        if($company) {
            return response()->json([
                'status' => true,
                'redirectURL' => route('account.company.password', ['id' => $company->id])
            ]);
        } else {
            session(['email' => $request->email]);
            return response()->json([
                'status' => false,
                'redirectURL' => route('account.company.sign-up'),
            ]);
        }
    }

    public function handleCompanySignInPassword(Request $request, $id) {
          // Validate password
          $validatedData = $request->validate([
            'password' => 'required'
        ], [
            'password.required' => 'Password is required'
        ]);

        $password = $request->password;
        $data = User::where('id', $id)->first(); // Get first matching company

        // Check the email and password is authenticated
        $session = Auth::guard('company')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redirect if candidate is authenticated
        if($validatedData && $session) {
            session()->flash('status', 'Logged In Successfully!');
            return response()->json([
                'status' => true,
                'redirectURL' => route('auth.account.company.profile', ['id' => $data->id])
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function handleCompanySignOut(Request $request) {
        $logout = Auth::guard('company')->logout(); // Clears the current logged in session.

        $request->session()->invalidate(); // Removes all the session variables if its exists

        $request->session()->regenerateToken(); // Regenerates a new fresh CSRF token for a user.

        return redirect()->route('home')->with('status', 'You have been logged out successfully!');
    }
}
