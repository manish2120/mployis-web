<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Models\Public\Fetch\States;
use App\Http\Controllers\Controller;
use App\Models\Public\Fetch\Countries;
use App\Models\Public\Fetch\Districts;
use App\Models\Frontend\Profile\HigherEducation;
use App\Models\Frontend\Profile\PersonalInformation;
use App\Models\Frontend\Profile\TenthGradeEducation;
use App\Models\Frontend\Profile\CandidateInformation;
use App\Models\Frontend\Profile\ExperienceInformation;
use App\Models\Frontend\Profile\PostGraduateEducation;
use App\Models\Frontend\Profile\TwelfthGradeEducation;

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
        $user = $this->getCandidateId($candidate_id);

        $countries = Countries::pluck('country_name', 'country_id'); // get the countries
        $states = States::pluck('state_name', 'state_id'); // get the states
        $districts = Districts::pluck('district_name', 'district_id'); // get the districts

        $candidate = CandidateInformation::where('candidates_id', $user->id)->first();
        $candidatePersonalInfo = PersonalInformation::where('candidates_id', $user->id)->first();
        $candidateTenthGradeInfo = TenthGradeEducation::where('candidates_id', $user->id)->first();
        $candidateTwelfthGradeInfo = TwelfthGradeEducation::where('candidates_id', $user->id)->first();
        $candidateHigherEducationInfo = HigherEducation::where('candidates_id', $user->id)->first();
        $candidatePostGraduateInfo = PostGraduateEducation::where('candidates_id', $user->id)->first();
        $candidateExperienceInfo = ExperienceInformation::where('candidates_id', $user->id)->first();

        return view('frontend.candidates.profile.candidate_profile', compact('user', 'countries', 'states', 'districts', 'candidate', 'candidatePersonalInfo', 'candidateTenthGradeInfo', 'candidateTwelfthGradeInfo', 'candidateHigherEducationInfo', 'candidatePostGraduateInfo', 'candidateExperienceInfo'));
    }

    public function getCandidateId($candidate_id) {
        if (is_null($candidate_id)) {
            $candidate_id = request()->candidate_id; // Retrieve from the request if not passed via the URL
        }
       
        $user = User::where('id', $candidate_id)->first();
        return $user;
    }
    // ------------ ENDS::PROFILE ------------
}
