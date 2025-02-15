<?php

namespace App\Http\Controllers\Frontend\Company\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\Company\Jobs\JobPosts;

class JobsController extends Controller
{
    public function handleJobPostForm(Request $request) {
        $request->validate([
            'job_title' => 'required',
            'location_type' => 'required',
            'location' => 'required',
            'employment_type' => 'required',
            'description' => 'required',
            'required_skills' => 'required',
        ]);

        $loggedInCompanyId = Auth::guard('company')->id();
        $job = JobPosts::where('company_id', $loggedInCompanyId)->first();

        $jobPostData = [
            'job_title' => $request->job_title,
            'location_type' => $request->location_type,
            'location' => $request->location,
            'employment_type' => $request->employment_type,
            'description' => $request->description,
            'required_skills' => $request->required_skills,
            'responsibilities' => $request->responsibilities,
            'salary' => $request->salary,
            'company_id' => $request->company_id
        ];

        JobPosts::create($jobPostData);
        return response()->json([
            'status' => true,
            'message' => 'New Job Created Successfully!'
        ]);
    }

    public function editJobPostForm(Request $request) {
        $request->validate([
            'job_title' => 'required',
            'location_type' => 'required',
            'location' => 'required',
            'employment_type' => 'required',
            'description' => 'required',
            'required_skills' => 'required',
        ]);

        $job_id = $request->job_id;

        $loggedInCompanyId = Auth::guard('company')->id();
        $job = JobPosts::where('id', $job_id)->where('company_id', $loggedInCompanyId)->first();

        $jobPostData = [
            'job_title' => $request->job_title,
            'location_type' => $request->location_type,
            'location' => $request->location,
            'pincode' => $request->pincode,
            'employment_type' => $request->employment_type,
            'description' => $request->description,
            'required_skills' => $request->required_skills,
            'qualifications' => $request->qualifications,
            'responsibilities' => $request->responsibilities,
            'salary' => $request->salary,
            'company_id' => $request->company_id
        ];

        
        if($job) {
            $job->update($jobPostData);
            return response()->json([
                'status' => true,
                'message' => 'Job Updated Successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    public function displayJobsBoard(Request $request) {
        $jobs = JobPosts::with('company')->paginate(1);
    
        return view('frontend.companies.jobs.jobs_board', compact('jobs'));
    }

    public function handleJobSearch(Request $request) {
        $searchQuery = $request->input('search_job');
    
        $jobs = JobPosts::where('job_title', 'like', "%{$searchQuery}%")
                    ->select('id', 'job_title') // Get only needed fields
                    ->take(5) // Limit to 5 results
                    ->get();
    
        return response()->json($jobs); // Return JSON response
    }
    
    
    
}
