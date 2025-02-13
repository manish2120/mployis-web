<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Profile\CandidateInformation;

class CandidateInformationController extends Controller
{
    public function handleCandidateProfilePage(Request $request) {
        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // allows specific image types and sets size limit
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required|date|before:'.now()->subYears(16)->toDateString(), // Check if the date of birth is at least 16 years ago
            'gender' => 'required',
            'phone_no' => 'required|string|regex:/^[\d\s\-\+\(\)]+$/|min:10|max:15|unique:candidates_information,phone_no,' . $request->candidate_id . ',candidates_id',
            'country' => 'required|string',
            'pincode' => 'required|regex:/^[1-9][0-9]{5}$/',
            'address' => 'nullable|string'
        ], [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'gender.required' => 'Please select gender.',
            'country.required' => 'Please select your country.',
            'phone_no.unique' => 'The phone number is already taken.',
            'phone_no.min' => 'The phone number must be at least 10 characters.',
            'phone_no.max' => 'The phone number may not be greater than 15 characters.',
            'phone_no.regex' => 'The phone number format is invalid.',
            'date_of_birth.required' => 'Please select your date of birth.',
            'date_of_birth.before' => 'You must be at least 16 years old to apply.',
            'pincode.regex' => 'The pincode must be a valid 6-digit number'
        ]);

        // Handle profile picture upload
        $profilePicturePath = null;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture'); // Get the file from the request
            $filename = time() . '_' . $file->getClientOriginalName(); // Create a unique file name
            $file->move(public_path('profile_pictures'), $filename); // Move the file to public/images/profile_pictures
            $profilePicturePath = 'profile_pictures/' . $filename; // Store the relative path
        } else {
            $profilePicturePath = $profileExists->profile_picture ?? null; // Use existing path if available
        }

        $profileExists = CandidateInformation::where('candidates_id', $request->candidate_id)->first();

        if ($profileExists) {
            $profileExists->update([
                'profile_picture' => $profilePicturePath ?? $profileExists->profile_picture, // Keep the old picture if no new one is uploaded
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'gender' => $request->gender,
                'country' => $request->country,
                'state' => $request->state,
                'district' => $request->district,
                'phone_no' => $request->phone_no,
                'pincode' => $request->pincode,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Profile Updated Successfully!'
            ]);
        } else {
            CandidateInformation::create([
                'candidates_id' => $request->candidate_id,
                'profile_picture' => $profilePicturePath,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'gender' => $request->gender,
                'country' => $request->country,
                'state' => $request->state,
                'district' => $request->district,
                'phone_no' => $request->phone_no,
                'pincode' => $request->pincode,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Profile saved successfully!'
            ]);
        }
    }
}
