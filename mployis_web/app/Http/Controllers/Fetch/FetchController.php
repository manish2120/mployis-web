<?php

namespace App\Http\Controllers\Fetch;

use App\Http\Controllers\Controller;
use App\Models\Public\Fetch\States;
use App\Models\Public\Fetch\Countries;
use App\Models\Public\Fetch\Districts;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function fetchCountries(Request $request) {
        $countries = Countries::all();
        // return view('frontend.candidates.profile.candidate_profile', compact('countries'));
    }

    public function fetchStates(Request $request) {
        $states = States::where('country_id', $request->country_id)->get();

        return response()->json([
            'states' => $states,
        ]);
    }

    public function fetchDistricts(Request $request) {
        $districts = Districts::where('state_id', $request->state_id)->get();

        return response()->json([
            'districts' => $districts,
        ]);
    }
}
