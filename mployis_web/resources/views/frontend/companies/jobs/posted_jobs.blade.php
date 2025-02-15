@extends('frontend.layouts.app')
@section('title', 'Posted Jobs')

@section('content')
@if(Session::has('error'))
    <p class="alert alert-danger">{{ Session('error') }}</p>
@endif

<div class="flex flex-col min-h-screen">
    <div class="container mx-auto mt-5">
        <h1 class="font-bold text-2xl mb-3 relative">Posted Jobs</h1>
        <div class="w-full h-0.5 bg-gray-300 mb-4"></div> <!-- Underline Ruler -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if ($companyPostedJobs->isEmpty())
                <div class="col-span-3 text-center mt-5">
                    <div class="p-4 bg-yellow-100 text-yellow-800 rounded-lg shadow-sm">
                        <i class="fas fa-exclamation-circle fa-2x mb-2"></i>
                        <h4 class="font-bold">No Jobs Available</h4>
                        <p>It looks like you haven't posted any jobs yet!</p>
                    </div>
                </div>
            @else
                @foreach($companyPostedJobs as $postedJob)
                    <div class="bg-white border border-gray-200 p-5 rounded-lg shadow-sm hover:shadow-md transition">
                        <span class="bg-green-500 text-white px-3 py-1 text-sm rounded-full float-right font-semibold">{{ $postedJob->location_type ?? '' }}</span>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-16 h-16 overflow-hidden rounded-full">
                                @if($postedJob->company->logo ?? false)
                                    <img src="{{ asset($postedJob->company->logo) }}" alt="Company Logo" class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('frontend/assets/media/avatars/blank.png') }}" alt="Default Logo" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">{{ $postedJob->company->company_name ?? 'N/A' }}</h2>
                                <p class="text-gray-600 text-sm">{{ $postedJob->job_title ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 text-sm flex items-center"><i class="fa fa-map-marker-alt text-gray-500 mr-2"></i> {{ $postedJob->location ?? 'N/A' }}</p>
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('auth.account.company.edit-posted-jobs', ['job_id' => $postedJob->id, 'company_id' => $postedJob->company_id]) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-4 rounded-lg text-base w-full text-center">Edit Job</a>
                            <a href="#" class="bg-[#009EF7] hover:bg-[#008EF7] text-white px-3 py-4 rounded-lg text-base w-full text-center">Applications</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="mt-6 flex justify-center">
            {{-- {{ $companyPostedJobs->links() }} --}}
        </div>
    </div>
</div>
@endsection