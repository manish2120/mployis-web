<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    // --------------------
    public function showCandidateSignUpPage() {
        return view('frontend.candidates.auth.sign_up', ['hideHeader' => true, 'hideFooter' => true]);
    }
    
    public function showCandidateSignInPage() {
        return view('frontend.candidates.auth.sign_in', ['hideHeader' => true, 'hideFooter' => true]);
       }
   
}
