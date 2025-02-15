<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Public\Fetch\States;
use App\Http\Controllers\Controller;
use App\Models\Public\Fetch\Countries;
use App\Models\Public\Fetch\Districts;
use App\Models\Frontend\Company\Jobs\JobPosts;
use App\Models\Frontend\Profile\HigherEducation;
use App\Models\Frontend\Profile\CandidateEducation;
use App\Models\Frontend\Profile\PersonalInformation;
use App\Models\Frontend\Profile\TenthGradeEducation;
use App\Models\Frontend\Profile\CandidateInformation;
use App\Models\Frontend\Profile\ExperienceInformation;
use App\Models\Frontend\Profile\PostGraduateEducation;
use App\Models\Frontend\Profile\TwelfthGradeEducation;
use App\Models\Frontend\Company\Profile\CompanyProfile;

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

    public function showCompanySignUpPage() {
        return view('frontend.companies.auth.company_sign_up', ['hideHeader' => true, 'hideFooter' => true]);
    }

    public function showCompanySignInPage() {
        return view('frontend.companies.auth.sign_in', ['hideHeader' => true, 'hideFooter' => true]);
    }

    public function showCompanyPasswordPage($id) {
        $user = User::where('id', $id)->first();

        return view('frontend.companies.auth.sign_in_password', ['hideHeader' => true, 'hideFooter' => true, 'user' => $user]);
    }

    public function showPostAJobForm($company_id = null) {
        $user = $this->getUserId($company_id);

        $postedJob = User::where('id', $user->id)->first();
        $companyProfile = CompanyProfile::where('company_id', $company_id)->first();

        if(!$companyProfile) {
            return redirect()->route('auth.account.company.profile', ['company_id' => $user->id]);
        }
        

        return view('frontend.companies.jobs.post_job', compact('user', 'postedJob'));
    }
    // --------- ENDS::AUTH FORMS -----------

    // ------------ BEGINS::PROFILE ------------
    public function showCandidateProfilePage($candidate_id = null) {
        $user = $this->getUserId($candidate_id);

        $countries = Countries::pluck('country_name', 'country_id'); // get the countries
        $states = States::pluck('state_name', 'state_id'); // get the states
        $districts = Districts::pluck('district_name', 'district_id'); // get the districts

        $candidate = CandidateInformation::where('candidates_id', $user->id)->first();
        $candidatePersonalInfo = PersonalInformation::where('candidates_id', $user->id)->first();
        $candidateEducationInfo = CandidateEducation::where('candidates_id', $user->id)->first();
        $tenthGradeEducationRecord = CandidateEducation::where(['candidates_id' => $user->id,'education_level_id' => 1])->first();
        $twelfthGradeEducationRecord = CandidateEducation::where(['candidates_id' => $user->id,'education_level_id' => 2])->first();
        $higherEducationRecord = CandidateEducation::where(['candidates_id' => $user->id,'education_level_id' => 3])->first();
        $postgraduateEducationRecord = CandidateEducation::where(['candidates_id' => $user->id,'education_level_id' => 4])->first();
        $candidateExperienceInfo = ExperienceInformation::where('candidates_id', $user->id)->first();

        $tenthGradeEducationId = DB::table('education_levels')->where('id', 1)->first();
        $twelfthGradeEducationId = DB::table('education_levels')->where('id', 2)->first();
        $higherEducationId = DB::table('education_levels')->where('id', 3)->first();
        $postGraduateEducationId = DB::table('education_levels')->where('id', 4)->first();

        return view('frontend.candidates.profile.candidate_profile', compact('user', 'countries', 'states', 'districts', 'candidate', 'candidatePersonalInfo', 'tenthGradeEducationRecord', 'twelfthGradeEducationRecord', 'higherEducationRecord', 'postgraduateEducationRecord', 'candidateExperienceInfo', 'tenthGradeEducationId', 'twelfthGradeEducationId', 'higherEducationId', 'postGraduateEducationId'));
    }

    public function getUserId($id = null) {
        if (!$id) {
            $id = request()->route('candidate_id') 
                ?? request()->route('company_id')
                ?? Auth::guard('company')->id() 
                ?? Auth::guard('candidate')->id();
        }
        return User::where('id', $id)->first();
    }

    public function showCompanyProfilePage($id = null) {
        $user = $this->getUserId($id);

        $countries = Countries::pluck('country_name', 'country_id'); // get the countries
        $states = States::pluck('state_name', 'state_id'); // get the states
        $districts = Districts::pluck('district_name', 'district_id'); // get the districts

        $companyProfile = CompanyProfile::where('company_id', $user->id)->first();

        return view('frontend.companies.profile.company_profile', compact('user', 'companyProfile', 'countries', 'states', 'districts'));
    }
    // ------------ ENDS::PROFILE ------------

    public function displayCompanyList() {
        $companies = CompanyProfile::paginate(1);
        $countryData = [];
        foreach ($companies as $company) {
            $country = Countries::where('country_id', $company->country)->first();
            $countryData = $country; 
        }

        return view('frontend.companies.company.company_list',  compact('companies', 'countryData'));
    }

    public function displayCompanyDetails($companyId) {
        $companyData = CompanyProfile::where('company_id', $companyId)->first();
        $jobs = JobPosts::where('company_id', $companyId)->get();

        return view('frontend.companies.company.company_details', compact('companyData', 'jobs'));
    }

    public function displayPostedJobs($id = null) {
        $user = $this->getUserId($id);
        $companyPostedJobs = JobPosts::where('company_id', $user->id)->get();

        if(empty($companyPostedJobs)) {
            return redirect()->route('auth.account.company.profile', ['company_id' => $user->id]);
        }

        return view('frontend.companies.jobs.posted_jobs', compact('companyPostedJobs'));
    }

    public function editPostedJobs($id, $job_id) {
        $user = $this->getUserId($id);
        $postedJob = JobPosts::where('id', $job_id)->where('company_id', $user->id)->first();

        return view('frontend.companies.jobs.edit_posted_jobs', compact('user', 'postedJob'));
    }

    public function displayErrorPage() {
        return view('frontend.public.error', ['hideHeader' => true, 'hideFooter' => true], compact());
    }
}
