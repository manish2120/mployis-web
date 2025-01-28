<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fetch\FetchController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactFormController;
use App\Http\Controllers\Frontend\Account\AccountController;
use App\Http\Controllers\Frontend\Profile\PersonalInformationController;
use App\Http\Controllers\Frontend\Profile\CandidateInformationController;
use App\Http\Controllers\Frontend\Profile\EducationInformationController;
use App\Http\Controllers\Frontend\Profile\ExperienceInformationController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Begins::Pages
Route::get('/about-us/{candidate_id?}', [PageController::class, 'showAboutPage'])->name('about');
Route::get('/pricing/{candidate_id?}', [PageController::class, 'showPricingPage'])->name('pricing');
Route::get('/contact-us/{candidate_id?}', [PageController::class, 'showContactPage'])->name('contact');
Route::get('/services/{candidate_id?}', [PageController::class, 'showServicesPage'])->name('services');
// Ends::Pages

// ===== BEGINS::FRONTEND ROUTES =====

Route::post('/contact-us/submit', [ContactFormController::class, 'handleContactForm'])->name('contact.submit');

Route::prefix('account')->group(function () {

    Route::middleware('candidate_auth')->group(function() {
        Route::get('/create-account', [PageController::class, 'showCandidateSignUpPage'])->name('account.show-candidate-sign-up');

        Route::post('/create-account', [AccountController::class, 'handleCandidateSignUp'])->name('account.candidate-sign-up');

        Route::get('/sign-in', [PageController::class, 'showCandidateSignInPage'])->name('account.candidate-sign-in');

        Route::post('/sign-in/email', [AccountController::class, 'handleCandidateSignIn'])->name('account.candidate.sign-in-email');

        Route::get('/sign-in/password/{id?}', [PageController::class, 'showCandidatePasswordPage'])->name('account.candidate.password');

        Route::post('/sign-in/submit/{id}', [AccountController::class, 'handleCandidateSignInPassword'])->name('account.candidate.submit');
        
    });

    Route::get('/sign-out', [AccountController::class, 'handleCandidateSignOut'])->name('auth.candidate-sign-out');

    Route::middleware(['candidate_page_auth', 'candidate_id'])->group(function() {
        
        Route::get('/user-profile/{candidate_id?}', [PageController::class, 'showCandidateProfilePage'])->name('account.candidate.profile');
        
        Route::post('/user-profile/{candidate_id?}/update', [CandidateInformationController::class, 'handleCandidateProfilePage'])->name('account.candidate.profile.update');

        Route::post('/user-profile/{candidate_id?}/personal-info/update', [PersonalInformationController::class, 'handleCandidatePersonalInfo'])->name('personal-info.candidate');

        Route::post('/user-profile/{candidate_id?}/tenth-grade-info/update', [EducationInformationController::class, 'handleTenthGradeInfo'])->name('tenth-grade-info.candidate');
        Route::post('/user-profile/{candidate_id?}/twelfth-grade-info/update', [EducationInformationController::class, 'handleTwelfthGradeInfo'])->name('twelfth-grade-info.candidate');
        Route::post('/user-profile/{candidate_id?}/higher-education-info/update', [EducationInformationController::class, 'handleHigherEducationInfo'])->name('higher-education-info.candidate');
        Route::post('/user-profile/{candidate_id?}/masters-doctorate-info/update', [EducationInformationController::class, 'handlePostGraduateInfo'])->name('masters-doctorate-info.candidate');
        Route::post('/user-profile/{candidate_id?}/experience-info/update', [ExperienceInformationController::class, 'handleExperienceInfo'])->name('experience-info.candidate');

    });
    
});

// Begins::Pages
Route::get('/{id?}', [PageController::class, 'showHomePage'])->name('home');
// Ends::Pages

// Fetch dropdowns
Route::get('/countries', [FetchController::class, 'fetchCountries'])->name('countries');
Route::post('/states', [FetchController::class, 'fetchStates'])->name('states');
Route::post('/districts', [FetchController::class, 'fetchDistricts'])->name('districts');



// ===== ENDS::FRONTEND ROUTES =====