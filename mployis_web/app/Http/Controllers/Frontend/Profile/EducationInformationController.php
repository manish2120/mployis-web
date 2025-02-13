<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Profile\HigherEducation;
use App\Models\Frontend\Profile\CandidateEducation;
use App\Models\Frontend\Profile\TenthGradeEducation;
use App\Models\Frontend\Profile\PostGraduateEducation;
use App\Models\Frontend\Profile\TwelfthGradeEducation;

class EducationInformationController extends Controller
{
    public function handleEducationInfo(Request $request) {
        $userData = User::find($request->candidate_id);
    
        // Validation rules
        $request->validate([
            'school_or_college' => 'required|string|max:255',
            'board_name' => 'required|string|max:255',
            'grade_percentage' => 'required|numeric|min:0|max:100',
            'year_of_passing' => 'required|integer',
            'passing_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Make certificate optional
        ], [
            'school_or_college.required' => 'School name is required',
            'board_name.required' => 'Board name is required',
            'grade_percentage.required' => 'Percentage is required',
            'passing_certificate.mimes' => 'The passing certificate must be a file of type: pdf, jpg, or jpeg.',
            'passing_certificate.max' => 'The passing certificate may not be greater than 2MB.',
        ]);
    
        // Fetch education level info
        $educationLevelInfo = DB::table('education_levels')->where('id', $request->education_id)->first();
    
        // Fetch the specific education record (filtered by candidate_id and education_level_id)
        $educationInfo = CandidateEducation::where([
            'candidates_id' => $userData->id,
            'education_level_id' => $educationLevelInfo->id
        ])->first();
    
        // File upload
        $passing_certificate = $educationInfo->passing_certificate ?? null; // Default to existing file
        if ($request->hasFile('passing_certificate')) {
            $file = $request->file('passing_certificate');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // Array of paths for storing certificates
            $folders = [
                1 => 'certificates/tenth',
                2 => 'certificates/twelfth',
                3 => 'certificates/higher-education',
                4 => 'certificates/post-graduate'
            ];
            
            if (isset($folders[$request->education_id])) {
                $file->move(public_path($folders[$request->education_id]), $filename);
                $passing_certificate = $folders[$request->education_id] . '/' . $filename;
            }
        }
    
        // Array for insert or update data
        $educationData = [
            'candidates_id' => $userData->id,
            'education_level_id' => $educationLevelInfo->id,
            'school_or_college' => $request->school_or_college,
            'board_name' => $request->board_name,
            'grade_or_percentage' => $request->grade_percentage,
            'year_of_passing' => $request->year_of_passing,
            'passing_certificate' => $passing_certificate
        ];
    
        // If the record exists, update or else create a new record
        if ($educationInfo) {
            $educationInfo->update($educationData);
            return response()->json(['status' => true, 'message' => 'Information updated successfully!']);
        } else {
            CandidateEducation::create($educationData);
            return response()->json(['status' => true, 'message' => 'Information saved successfully!']);
        }
    }
}