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
}
