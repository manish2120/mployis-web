<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\Profile\PersonalInformation;

class PersonalInformationController extends Controller
{
    public function handleCandidatePersonalInfo(Request $request) {
        $user = Auth::guard('candidate')->check();
    
        $userData = User::find($request->candidate_id);

        $request->validate([
            'religion' => 'nullable|string',
            'caste' => 'nullable|string',
            'pancard_no' => 'nullable|string|size:10|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/|unique:candidates_personal_info,pancard_no,' . $userData->id,
            'aadhar_card_no' => 'nullable|regex:/^\d{4} \d{4} \d{4}$/|unique:candidates_personal_info,aadhar_card_no,' . $userData->id,
            'passport' => 'nullable',
            'passport_no' => 'nullable|required_if:passport,Yes|alpha_num|between:6,9',
        ], [
            'pancard_no.regex' => 'Format is invalid!',
            'pancard_no.unique' => 'PAN card number is already taken',
            'aadhar_card_no.unique' => 'Aadhar Card number is already exist',
            'passport_no.alpha_num' => 'Passport number must be alphanumeric.',
            'passport_no.between' => 'Passport number must be between 6 to 9 characters long.', 
        ]);
    
        // Fetch Personal Information using foreign key
        $personalInfo = PersonalInformation::where('candidates_id', $userData->id)->first();

        if($personalInfo) {
            $personalInfo->update([
                'religion' => $request->religion,
                'caste' => $request->caste,
                'pancard_no' => $request->pancard_no,
                'aadhar_card_no' => $request->aadhar_card_no,
                'passport' => $request->passport,
                'passport_no' => $request->passport_no,
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'Personal Information Updated Successfully'
            ]);
        } else {
            $personalInfo = [
                'candidates_id' => $userData->id,
                'religion' => $request->religion,
                'caste' => $request->caste,
                'pancard_no' => $request->pancard_no,
                'aadhar_card_no' => $request->aadhar_card_no,
                'passport' => $request->passport,
                'passport_no' => $request->passport_no,
            ]; 
    
            PersonalInformation::create($personalInfo);
            
            return response()->json([
                'status' => true,
                'message' => 'Personal Information Saved Successfully!',
            ]);
        }
    }
    
}
