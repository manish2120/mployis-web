<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Company\Jobs\JobsController;
use App\Http\Controllers\Fetch\FetchController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactFormController;
use App\Http\Controllers\Frontend\Profile\PersonalInformationController;
use App\Http\Controllers\Frontend\Profile\CandidateInformationController;
use App\Http\Controllers\Frontend\Profile\EducationInformationController;
use App\Http\Controllers\Frontend\Profile\ExperienceInformationController;
use App\Http\Controllers\Frontend\Company\Profile\CompanyProfileController;
use App\Http\Controllers\Frontend\Account\AccountController as UserAccountController;
use App\Http\Controllers\Frontend\Company\Account\AccountController as CompanyAccountController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Begins::Pages
Route::get('/about-us/{candidate_id?}', [PageController::class, 'showAboutPage'])->name('about');
Route::get('/pricing/{candidate_id?}', [PageController::class, 'showPricingPage'])->name('pricing');
Route::get('/contact-us/{candidate_id?}', [PageController::class, 'showContactPage'])->name('contact');
Route::get('/services/{candidate_id?}', [PageController::class, 'showServicesPage'])->name('services');
Route::get('/error', [PageController::class, 'displayErrorPage']);

// Ends::Pages

// ===== BEGINS::FRONTEND ROUTES =====

Route::post('/contact-us/submit', [ContactFormController::class, 'handleContactForm'])->name('contact.submit');

Route::prefix('account')->group(function () {

    Route::middleware('candidate_auth')->group(function() {
        Route::get('/create-account', [PageController::class, 'showCandidateSignUpPage'])->name('account.show-candidate-sign-up');

        Route::post('/create-account', [UserAccountController::class, 'handleCandidateSignUp'])->name('account.candidate-sign-up');

        Route::get('/sign-in', [PageController::class, 'showCandidateSignInPage'])->name('account.candidate-sign-in');

        Route::post('/sign-in/email', [UserAccountController::class, 'handleCandidateSignIn'])->name('account.candidate.sign-in-email');

        Route::get('/sign-in/password/{id?}', [PageController::class, 'showCandidatePasswordPage'])->name('account.candidate.password');

        Route::post('/sign-in/submit/{id}', [UserAccountController::class, 'handleCandidateSignInPassword'])->name('account.candidate.submit');
        
    });
    
    Route::middleware(['candidate_page_auth', 'candidate_id'])->group(function() {
        
        Route::get('/user-profile/{candidate_id?}', [PageController::class, 'showCandidateProfilePage'])->name('account.candidate.profile');
        
        Route::post('/user-profile/{candidate_id?}/update', [CandidateInformationController::class, 'handleCandidateProfilePage'])->name('account.candidate.profile.update');

        Route::post('/user-profile/{candidate_id?}/personal-info/update', [PersonalInformationController::class, 'handleCandidatePersonalInfo'])->name('personal-info.candidate');

        Route::post('/user-profile/{candidate_id?}/tenth-grade-info/update', [EducationInformationController::class, 'handleEducationInfo'])->name('tenth-grade-info.candidate');
        Route::post('/user-profile/{candidate_id?}/twelfth-grade-info/update', [EducationInformationController::class, 'handleEducationInfo'])->name('twelfth-grade-info.candidate');
        Route::post('/user-profile/{candidate_id?}/higher-education-info/update', [EducationInformationController::class, 'handleEducationInfo'])->name('higher-education-info.candidate');
        Route::post('/user-profile/{candidate_id?}/masters-doctorate-info/update', [EducationInformationController::class, 'handleEducationInfo'])->name('masters-doctorate-info.candidate');
        Route::post('/user-profile/{candidate_id?}/experience-info/update', [ExperienceInformationController::class, 'handleExperienceInfo'])->name('experience-info.candidate');

    });

    Route::get('/sign-out', [UserAccountController::class, 'handleCandidateSignOut'])->name('auth.candidate-sign-out');

    Route::middleware('company_auth')->group(function() {
        Route::get('/create-account-company', [PageController::class, 'showCompanySignUpPage'])->name('account.company.sign-up');

        Route::post('/create-account-company', [CompanyAccountController::class, 'handleCompanySignUp'])->name('account.company.company-sign-up');

        Route::get('/company/sign-in', [PageController::class, 'showCompanySignInPage'])->name('account.company.sign-in');

        Route::post('/company/sign-in/email', [CompanyAccountController::class, 'handleCompanySignIn'])->name('account.company.sign-in-email');

        Route::get('/company/sign-in/password/{id?}', [PageController::class, 'showCompanyPasswordPage'])->name('account.company.password');

        Route::post('company/sign-in/submit/{id}', [CompanyAccountController::class, 'handleCompanySignInPassword'])->name('account.company.submit');
    });

    Route::middleware(['company_page_auth', 'company_id'])->group(function() {
        Route::get('/company-profile/{company_id?}', [PageController::class, 'showCompanyProfilePage'])->name('auth.account.company.profile');
    
        Route::post('/company-profile/update/{company_id?}', [CompanyProfileController::class, 'handleCompanyProfile'])->name('auth.account.company.profile-update');

        Route::get('/post-job/{company_id?}', [PageController::class, 'showPostAJobForm'])->name('auth.account.company.post-job-form');
        Route::post('/post-job/{company_id?}/submit', [JobsController::class, 'handleJobPostForm'])->name('auth.account.company.post-job-form.submit');

        Route::get('/jobs/posted-jobs/{company_id?}', [PageController::class, 'displayPostedJobs'])->name('auth.account.company.posted-jobs');
        

        Route::get('/jobs/edit-posted-jobs/{company_id?}/{job_id?}', [PageController::class, 'editPostedJobs'])->name('auth.account.company.edit-posted-jobs');
        Route::post('/jobs/edit-posted-jobs/{company_id?}/{job_id?}/update', [JobsController::class, 'editJobPostForm'])->name('auth.account.company.edit-posted-jobs.update');


    });
    
    Route::get('/company-sign-out', [CompanyAccountController::class, 'handleCompanySignOut'])->name('auth.company-sign-out');
});

// Begins::Pages
Route::get('/{id?}', [PageController::class, 'showHomePage'])->name('home');
// Ends::Pages

// Fetch dropdowns
Route::get('/countries', [FetchController::class, 'fetchCountries'])->name('countries');
Route::post('/states', [FetchController::class, 'fetchStates'])->name('states');
Route::post('/districts', [FetchController::class, 'fetchDistricts'])->name('districts');

Route::get('/jobs/job-board/{company_id?}', [JobsController::class, 'displayJobsBoard'])->name('company.job-board');
Route::get('/jobs/job-board/search-results', [JobsController::class, 'handleJobSearch'])->name('company.job-board-search');

Route::get('/jobs/company-list/{company_id?}', [PageController::class, 'displayCompanyList'])->name('company.company-list');

Route::get('/jobs/company-details/{company_id?}/{job_id?}', [PageController::class, 'displayCompanyDetails'])->name('company.company-details');

// ===== ENDS::FRONTEND ROUTES =====