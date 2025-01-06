<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function handleCandidateSignUp(Request $request) {
        $allRequestedData = $request->all();
            $requestedData = array_map(function($value, $key) {
                return ($key != 'password') ? trim($value) : $value;
            }, $allRequestedData, array_keys($allRequestedData));
    
            $request->merge($requestedData);
    
            $validatedData = $request->validate([
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'email' => 'required|email|regex:/^(?=.*[a-z])(?=.*[@$!%*?&#]).+$/|unique:users,email',
                'password' => 'required|min:8|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
                'toc' => 'required|accepted'
            ], [
                'fname.required' => 'Please enter your first name',
                'lname.required' => 'Please enter your last name',
    
                'email.required' => 'Please enter your email address',
                'email.email' => 'Please enter a valid email',
                'email.regex' => 'Please enter a valid email address (e.g. example@gmail.com)',
                'email.unique' => 'Email already exists',
    
                'password.required' => 'Please enter a password',
                'password.min' => 'Password must be at least 8 characters long',
                'password.max' => 'Password must not exceed 20 characters',
    
                'toc.required' => 'You must agree to the Terms and Conditions',
              
            ]);

    
            $validatedData['password'] = bcrypt($validatedData['password']);

            $signUpFormData = User::create($validatedData);
    
            if($signUpFormData) {
                // condition to perform page redirection with ajax
                if($request->ajax()) {
                    session()->flash('status', 'Your account has been created successfully!');
                    return response()->json([
                        'status' => true, 
                        'message' => 'Your account has been created successfully!', 
                        'redirect' => route('account.candidate-sign-in')
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong, Please try again later!'
                ]);
        }
    }

    public function handleCandidateSignIn(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|regex:/^(?=.*[a-z])(?=.*[@$!%*?&#]).+$/'
        ], [
            'email.required' => 'Email is required',
            'email.regex' => 'Please enter a valid email address (e.g. example@gmail.com)'
        ]);

        $candidate = User::where('email', $request->email)->first(); // Get first matching email

        // Check candidate exists
        if($candidate) {
            return response()->json([
                'status' => true,
                'redirectURL' => route('account.candidate.password', ['id' => $candidate->id])
            ]);
        } else {
            session(['email' => $request->email]);
            return response()->json([
                'status' => false,
                'redirectURL' => route('account.show-candidate-sign-up'),
            ]);
        }
    }

    function handleCandidateSignInPassword(Request $request, $id) {

        // Validate password
        $validatedData = $request->validate([
            'password' => 'required'
        ], [
            'password.required' => 'Password is required'
        ]);

        $password = $request->password;
        $data = User::where('id', $id)->first(); // Get first matching candidate

        // Check the email and password is authenticated
        $session = Auth::guard('candidate')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redirect if candidate is authenticated
        if($validatedData && $session) {
            session()->flash('status', 'Logged In Successfully!');
            return response()->json([
                'status' => true,
                'redirectURL' => route('home', ['id' => $data->id])
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    // Handle candidate sign out
    public function handleCandidateSignOut(Request $request) {
        $logout = Auth::guard('candidate')->logout(); // Clears the current logged in session.

        $request->session()->invalidate(); // Removes all the session variables if its exists

        $request->session()->regenerateToken(); // Regenerates a new fresh CSRF token for a user.

        return redirect()->route('home')->with('status', 'You have been logged out successfully!');
    }
    
}
