<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{

    public function showCandidateSignUpPage() {
        return view('frontend.candidates.auth.sign_up', ['hideHeader' => true, 'hideFooter' => true]);
    }

    public function handleCandidateSignUp(Request $request) {
        $allRequestedData = $request->all();
            $requestedData = array_map(function($value, $key) {
                return ($key != 'password') ? trim($value) : $value;
            }, $allRequestedData, array_keys($allRequestedData));
    
            $request->merge($requestedData);
    
            $validatedData = $request->validate([
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'email' => 'required|email|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#]).+$/|unique:users,email',
                'password' => 'required|min:8|max:20|confirmed',
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
                'password.confirmed' => 'Password do not match',
    
                'toc.required' => 'You must agree to the Terms and Conditions',
            ]);
    
            $signUpFormData = User::create($validatedData);
    
            if($signUpFormData) {
                return response()->json([
                    'status' => true,
                    'message' => 'Your account has been created successfully!'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong, Please try again later!'
                ]);
        }
    }

    public function handleCandidateSignIn() {
    //    
    }
    
}
