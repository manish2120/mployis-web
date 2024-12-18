<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactFormController;
use App\Http\Controllers\Frontend\Account\AccountController;

Route::get('/', function () {
    return view('welcome');
});

// ===== BEGINS::FRONTEND ROUTES =====

// Begins::Pages
Route::get('/', [PageController::class, 'showHomePage'])->name('home');
Route::get('/about-us', [PageController::class, 'showAboutPage'])->name('about');
Route::get('/pricing', [PageController::class, 'showPricingPage'])->name('pricing');
Route::get('/contact-us', [PageController::class, 'showContactPage'])->name('contact');
Route::get('/services', [PageController::class, 'showServicesPage'])->name('services');
// Ends::Pages

Route::post('/contact-us/submit', [ContactFormController::class, 'handleContactForm'])->name('contact.submit');

Route::prefix('account')->group(function () {

    Route::middleware('guest')->group(function() {
        Route::get('/create-account', [PageController::class, 'showCandidateSignUpPage'])->name('account.show-candidate-sign-up');

        Route::post('/create-account', [AccountController::class, 'handleCandidateSignUp'])->name('account.candidate-sign-up');

        Route::get('/sign-in', [PageController::class, 'showCandidateSignInPage'])->name('account.candidate-sign-in');

    });

});




// ===== ENDS::FRONTEND ROUTES =====