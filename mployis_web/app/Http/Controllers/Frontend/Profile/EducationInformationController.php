<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Profile\HigherEducation;
use App\Models\Frontend\Profile\TenthGradeEducation;
use App\Models\Frontend\Profile\PostGraduateEducation;
use App\Models\Frontend\Profile\TwelfthGradeEducation;

class EducationInformationController extends Controller
{
    public function handleTenthGradeInfo(Request $request) {
        $userData = User::find($request->candidate_id);
        $request->validate([
            'school_name' => 'required|string|max:255',
            'board_name' => 'required|string|max:255',
            'grade_percentage' => 'required|numeric|min:0|max:100',
            'year_of_passing' => 'required|integer',
            'passing_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // File validation
        ], [
            'school_name.required' => 'School name is required',
            'board_name.required' => 'Board name is required',
            'grade_percentage.required' => 'Percentage is required',
            'passing_certificate.required' => 'Passing certificate is required',
            'passing_certificate.mimes' => 'The passing certificate must be a file of type: pdf, jpg, or jpeg.',
            'passing_certificate.max' => 'The passing certificate may not be greater than 2MB.',
        ]);

        $tenthGradeInfo = TenthGradeEducation::where('candidates_id', $userData->id)->first();

        if($request->hasFile('passing_certificate')) {
            $file = $request->file('passing_certificate'); // get the file from request
            $filename = time() . '_' . $file->getClientOriginalName(); // creates a unique name
            $file->move(public_path('certificates/tenth'), $filename); // file path to move the file
            $passing_certificate = 'certificates/tenth/' . $filename; // file path with file name concatenation
        } else {
            $passing_certificate = $tenthGradeInfo->passing_certificate ?? null; // check is file exist
        }

        $tenthGradeData = [
        'candidates_id' => $userData->id,
        'school_name' => $request->school_name,
        'board_name' => $request->board_name,
        'grade_or_percentage' => $request->grade_percentage,
        'year_of_passing' => $request->year_of_passing,
        'passing_certificate' => $passing_certificate
        ];

        if($tenthGradeInfo) {
            $tenthGradeInfo->update($tenthGradeData);

            return response()->json([
                'status' => true,
                'message' => 'Information updated successfully!'
            ]);
        } else {
            TenthGradeEducation::create($tenthGradeData);

            return response()->json([
                'status' => true,
                'message' => 'Information saved successfully!'
            ]);
        }

    }

    public function handleTwelfthGradeInfo(Request $request) {
        $userData = User::find($request->candidate_id);
        $request->validate([
            'college_name' => 'required|string|max:255',
            'board_name' => 'required|string|max:255',
            'grade_percentage' => 'required|numeric|min:0|max:100',
            'year_of_passing' => 'required|integer',
            'passing_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // File validation
        ], [
            'college_name.required' => 'College name is required',
            'board_name.required' => 'Board name is required',
            'grade_percentage.required' => 'Percentage is required',
            'passing_certificate.required' => 'Passing certificate is required',
            'passing_certificate.mimes' => 'The passing certificate must be a file of type: pdf, jpg, or jpeg.',
            'passing_certificate.max' => 'The passing certificate may not be greater than 2MB.',
        ]);

        $twelfthGradeInfo = TwelfthGradeEducation::where('candidates_id', $userData->id)->first();

        $twelfthGradeData = [
        'candidates_id' => $userData->id,
        'college_name' => $request->college_name,
        'board_name' => $request->board_name,
        'grade_or_percentage' => $request->grade_percentage,
        'year_of_passing' => $request->year_of_passing,
        'passing_certificate' => $request->passing_certificate
        ];

        if($request->hasFile('passing_certificate')) {
            $file = $request->file('passing_certificate'); // get the file from request
            $filename = time() . '_' . $file->getClientOriginalName(); // creates a unique name
            $file->move(public_path('certificates/twelfth'), $filename); // file path to move the file
            $passing_certificate = 'certificates/twelfth/' . $filename; // file path with file name concatenation
        } else {
            $passing_certificate = $twelfthGradeData->passing_certificate ?? null; // check is file exist
        }

        if($twelfthGradeInfo) {
            $twelfthGradeInfo->update($twelfthGradeData);

            return response()->json([
                'status' => true,
                'message' => 'Information updated successfully!'
            ]);
        } else {
            TwelfthGradeEducation::create($twelfthGradeData);

            return response()->json([
                'status' => true,
                'message' => 'Information saved successfully!'
            ]);
        }

    }

    public function handleHigherEducationInfo(Request $request) {
        $userData = User::find($request->candidate_id);
        $request->validate([
            'college_institute_name' => 'required|string|max:255',
            'board_name' => 'required|string|max:255',
            'grade_percentage' => 'required|numeric|min:0|max:100',
            'year_of_passing' => 'required|integer',
            'passing_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // File validation
        ], [
            'college_institute_name.required' => 'College name is required',
            'board_name.required' => 'Board name is required',
            'grade_percentage.required' => 'Percentage is required',
            'passing_certificate.required' => 'Passing certificate is required',
            'passing_certificate.mimes' => 'The passing certificate must be a file of type: pdf, jpg, or jpeg.',
            'passing_certificate.max' => 'The passing certificate may not be greater than 2MB.',
        ]);

        $higherEducationInfo = HigherEducation::where('candidates_id', $userData->id)->first();

        $higherEducationData = [
        'candidates_id' => $userData->id,
        'institute_or_college_name' => $request->college_institute_name,
        'board_name' => $request->board_name,
        'grade_or_percentage' => $request->grade_percentage,
        'year_of_passing' => $request->year_of_passing,
        'passing_certificate' => $request->passing_certificate
        ];

        if($request->hasFile('passing_certificate')) {
            $file = $request->file('passing_certificate'); // get the file from request
            $filename = time() . '_' . $file->getClientOriginalName(); // creates a unique name
            $file->move(public_path('certificates/higher-education'), $filename); // file path to move the file
            $passing_certificate = 'certificates/higher-education/' . $filename; // file path with file name concatenation
        } else {
            $passing_certificate = $higherEducationData->passing_certificate ?? null; // check is file exist
        }


        if($higherEducationInfo) {
            $higherEducationInfo->update($higherEducationData);

            return response()->json([
                'status' => true,
                'message' => 'Information updated successfully!'
            ]);
        } else {
            HigherEducation::create($higherEducationData);

            return response()->json([
                'status' => true,
                'message' => 'Information saved successfully!'
            ]);
        }

    }

    public function handlePostGraduateInfo(Request $request) {
        $userData = User::find($request->candidate_id);
        $request->validate([
            'college_institute_name' => 'required|string|max:255',
            'board_name' => 'required|string|max:255',
            'grade_percentage' => 'required|numeric|min:0|max:100',
            'year_of_passing' => 'required|integer',
            'passing_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // File validation
        ], [
            'college_institute_name.required' => 'Institute or college name is required',
            'board_name.required' => 'Board name is required',
            'grade_percentage.required' => 'Percentage is required',
            'passing_certificate.required' => 'Passing certificate is required',
            'passing_certificate.mimes' => 'The passing certificate must be a file of type: pdf, jpg, or jpeg.',
            'passing_certificate.max' => 'The passing certificate may not be greater than 2MB.',
        ]);

        $postGraduateInfo = PostGraduateEducation::where('candidates_id', $userData->id)->first();

        $postGraduateData = [
        'candidates_id' => $userData->id,
        'institute_or_college_name' => $request->college_institute_name,
        'board_name' => $request->board_name,
        'grade_or_percentage' => $request->grade_percentage,
        'year_of_passing' => $request->year_of_passing,
        'passing_certificate' => $request->passing_certificate
        ];

        if($request->hasFile('passing_certificate')) {
            $file = $request->file('passing_certificate'); // get the file from request
            $filename = time() . '_' . $file->getClientOriginalName(); // creates a unique name
            $file->move(public_path('certificates/post-graduate'), $filename); // file path to move the file
            $passing_certificate = 'certificates/post-graduate/' . $filename; // file path with file name concatenation
        } else {
            $passing_certificate = $postGraduateData->passing_certificate ?? null; // check is file exist
        }


        if($postGraduateInfo) {
            $postGraduateInfo->update($postGraduateData);

            return response()->json([
                'status' => true,
                'message' => 'Information updated successfully!'
            ]);
        } else {
            PostGraduateEducation::create($postGraduateData);

            return response()->json([
                'status' => true,
                'message' => 'Information saved successfully!'
            ]);
        }

    }
}
