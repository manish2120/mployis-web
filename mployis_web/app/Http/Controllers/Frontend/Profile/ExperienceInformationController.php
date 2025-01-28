<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\Profile\ExperienceInformation;

class ExperienceInformationController extends Controller
{
    public function handleExperienceInfo(Request $request) {

        $user = Auth::guard('candidate')->check();
        $userData = User::find($request->candidate_id);

        $request->validate([
            'job_title' => 'required',
            'employee_type' => 'required',
            'company_name' => 'required',
            'location_type' => 'required',
            'start_date' => 'required'
        ], 
        [
            'job_title.required' => 'Job title field is required',
            'employee_type.required' => 'Employee type field is required',
            'company_name.required' => 'Company name field is required',
            'location_type.required' => 'Location type field is required',
            'start_date.required' => 'Start date field is required',
        ]);

        $experienceCandidateData = ExperienceInformation::where('candidates_id', $userData->id)->first();

        $isCurrentlyWorking = $request->has('is_currently_working') ? 1 : 0;

        $experienceCandidateInfo = [
            'candidates_id' => $userData->id,
            'job_title' => $request->job_title,
            'employee_type' => $request->employee_type,
            'company_name' => $request->company_name,
            'location_type' => $request->location_type,
            'start_date' => $request->start_date,
            'is_currently_working' => $isCurrentlyWorking
        ];

        if($experienceCandidateData) {
            $experienceCandidateData->update($experienceCandidateInfo);

            return response()->json([
                'status' => true,
                'message' => 'Experience Updated Successfully!',
            ]);
        } else {
           ExperienceInformation::create($experienceCandidateInfo);

            return response()->json([
                'status' => true,
                'message' => 'Experience Saved Successfully!',
            ]);
        }
    }
}
