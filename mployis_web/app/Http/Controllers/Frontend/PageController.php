<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function showHomePage() {
        return view('frontend.public.index');
    }
    
    public function showAboutPage() {
        return view('frontend.public.about');
    }

    public function showPricingPage() {
        return view('frontend.public.pricing');
    }

    public function showServicesPage() {
        return view('frontend.public.services');
    }

    public function showContactPage() {
        return view('frontend.public.contact');
    }

    // --------- BEGINS::AUTH FORMS -----------
    public function showCandidateSignUpPage() {
       
        return view('frontend.candidates.auth.sign_up', ['hideHeader' => true, 'hideFooter' => true]);
    }
    
    public function showCandidateSignInPage() {
        return view('frontend.candidates.auth.sign_in', ['hideHeader' => true, 'hideFooter' => true]);
       }
       
    public function showCandidatePasswordPage($id) {
        $user = User::where('id', $id)->first();
        return view('frontend.candidates.auth.sign_in_password', ['hideHeader' => true, 'hideFooter' => true, 'user' => $user]);
    }
    // --------- ENDS::AUTH FORMS -----------

    // ------------ BEGINS::PROFILE ------------
    public function showCandidateProfilePage($candidate_id = null) {
        if (is_null($candidate_id)) {
            $candidate_id = request()->candidate_id; // Retrieve from the request if not passed via the URL
        }
       
        $user = User::where('id', $candidate_id)->first();
        return view('frontend.candidates.profile.candidate_profile', ['user' => $user]);
    }
    // ------------ ENDS::PROFILE ------------
}
