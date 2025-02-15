<?php

namespace App\Http\Controllers\Frontend\Company\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Company\Profile\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function handleCompanyProfile(Request $request) {
        // Validate the request
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_name' => 'required|string',
            'designated_hr' => 'required|string',
            'email' => 'required|string|email',
            'phone_no' => 'required|numeric|digits_between:7,15',
            'industry_type' => 'required|string',
            'country' => 'required|string',
            'pincode' => 'required|string',
            'website' => 'required|string',
            'description' => 'required|string',
        ], [
            'company_name.required' => 'Please enter the company name.',
            'designated_hr.required' => 'Please enter HR name.',

            'email.required' => 'Please enter your company email ID.',
            'email.email' => 'Please enter a valid email address.',

            'phone_no.required' => 'Please enter your company phone number.',
            'phone_no.numeric' => 'Phone number must contain only numbers.',
            'phone_no.digits_between' => 'Phone number must be between 7 and 15 digits.',

            'country.required' => 'Please select your country.',
            'pincode.required' => 'Please enter your pincode.',
            'website.required' => 'Please enter your website.',
            'industry_type.required' => 'Please select an industry type.',

            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be a file of type: jpeg, jpg, png.',
            'logo.max' => 'The logo size may not be greater than 2MB.',

            'description.required' => 'Please enter the company description.',
        ]);
    
        // Handle profile picture upload
        $profilePicturePath = null;
    
        if ($request->hasFile('logos')) {
            $file = $request->file('logos'); // Get the file from the request
            $filename = time() . '_' . $file->getClientOriginalName(); // Create a unique file name
            $file->move(public_path('company'), $filename); // Move the file to public/images/logo
            $profilePicturePath = 'company/logos/' . $filename; // Store the relative path
        }
    
        // Check if the profile already exists
        $profileExists = CompanyProfile::where('company_id', $request->company_id)->first();
    
        // Prepare data for saving
        $profileData = [
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'designated_hr' => $request->designated_hr,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'country' => $request->country,
            'state' => $request->state,
            'district' => $request->district,
            'pincode' => $request->pincode,
            'industry_type' => $request->industry_type,
            'address' => $request->address,
            'website' => $request->website,
            'description' => $request->description,
            'logo' => $profilePicturePath,
        ];
    
        if ($profileExists) {
            // Update the existing profile
            $profileExists->update($profileData);
            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully',
            ]);
        } else {
            // Create a new profile
            CompanyProfile::create($profileData);
            return response()->json([
                'status' => true,
                'message' => 'Profile created successfully',
            ]);
        }
    }
    

    // public function companyProfile() {

    //     $id = Auth::guard('company')->user()->id;

    //     // FETCH ALL COUNTRIES FROM THE DATABASE
    //     $data['countries'] = DB::table('tbl_countries')->get();
    //     $data['states'] = DB::table('tbl_states')->get();
        
    //     $data['companyProfile'] = CompanyProfile::where('company_parent_id', $id)->first();

    //     // dd($data['companyProfile']);
    //     return view('frontend.company-profile', $data);
    // }

    //  // FETCH STATES ON BASED OF SELECTED COUNTRY
    //  public function fetchStates(Request $request) {
    //     $id = $request->query('country_id');  // Fetch country_id from the query string
    //     $states = DB::table('tbl_states')
    //             ->where('country_id', $id) // Correct join
    //             ->get();
    //     return response()->json($states);
    //   }
  
    //   public function handleCompanyProfileForm(Request $request) {

    //     $id = Auth::guard('company')->user()->id;
    //     $company = Company::find($id);
    
    //     $request->validate([
    //         'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
    //         'name' => 'required|string',
    //         'designated_hr' => 'required|string',
    //         'email' => 'required|string',
    //         'phone' => 'required|numeric|digits_between:7,15',
    //         'industry_type' => 'required|string',
    //         'company_description' => 'required|string',
    //     ], [
    //         'name.required' => 'Please enter your name.',
    //         'designated_hr.required' => 'Please enter HR name',
    //         'email.required' => 'Please enter your company email ID.',
    //         'email.email' => 'Please enter a valid email address.',
    //         'phone.required' => 'Please enter your company phone number.',
    //         'phone.numeric' => 'Phone number must contain only numbers.',
    //         'phone.digits_between' => 'Phone number must be between 7 and 15 digits.',
    //         'industry_type.required' => 'Please select an industry type.',
    //         'logo.image' => 'The logo must be an image.',
    //         'logo.mimes' => 'The logo must be a file of type: jpeg, jpg, png.',
    //         'logo.max' => 'The logo size may not be greater than 2MB.',
    //         'company_description' => 'Please enter the company description',
    //     ]);
    
    //     // $logo = null; // Initialize logo as null
    
    //     if ($request->hasFile('logo')) {
    //         $file = $request->file('logo');
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('uploads/logo'), $fileName);
    //         $logo = 'uploads/logo/' . $fileName; // Save the logo path
    //     } else {
    //         // Use existing logo if no new file is uploaded
    //         $existingProfile = CompanyProfile::where('company_parent_id', $company->id)->first();
    //         $logo = $existingProfile->logo ?? ''; // Preserve existing logo if available
    //     }
    
    //     $companyProfileData = CompanyProfile::where('company_parent_id', $company->id)->first();
    
    //     if ($companyProfileData) {
    //         // Update existing company profile data
    //         $companyProfileData->update([
    //             'company_parent_id' => $company->id,
    //             'logo' => $logo, // Use the correct logo path
    //             'name' => $request->name,
    //             'designated_hr' => $request->designated_hr,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'industry_type' => $request->industry_type,
    //             'country' => $request->country,
    //             'state' => $request->state,
    //             'city' => $request->city,
    //             'pin_code' => $request->pin_code,
    //             'address' => $request->address,
    //             'company_website' => $request->company_website,
    //             'company_description' => $request->company_description,
    //         ]);
    
    //         return response()->json([
    //             'message' => 'Form updated successfully!',
    //         ]);
    //     } else {
    //         // Create new company profile data
    //         CompanyProfile::create([
    //             'company_parent_id' => $company->id,
    //             'logo' => $logo, // Use the correct logo path
    //             'name' => $request->name,
    //             'designated_hr' => $request->designated_hr,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'industry_type' => $request->industry_type,
    //             'country' => $request->country,
    //             'state' => $request->state,
    //             'city' => $request->city,
    //             'pin_code' => $request->pin_code,
    //             'address' => $request->address,
    //             'company_website' => $request->company_website,
    //             'company_description' => $request->company_description,
    //         ]);
    
    //         return response()->json([
    //             'message' => 'Form saved successfully!',
    //         ]);
    //     }
    // }
    
}
