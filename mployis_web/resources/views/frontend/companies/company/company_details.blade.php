@extends('frontend.layouts.app')
@section('title', 'Company Details')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center space-x-4 mb-6">
            @if (isset($companyData->logo))
                <img src="{{ asset($companyData->logo) }}" alt="Company Logo" class="w-16 h-16 object-cover rounded-full">
            @endif
            <h2 class="text-2xl font-bold text-gray-900">{{ $companyData->company_name ?? '' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-center">
                <i class="bi bi-person text-blue-500 text-2xl mr-4"></i>
                <div>
                    <h5 class="text-gray-700 font-semibold">Designated HR:</h5>
                    <p class="text-gray-600">{{ $companyData->designated_hr ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex items-center">
                <i class="bi bi-geo-alt text-blue-500 text-2xl mr-4"></i>
                <div>
                    <h5 class="text-gray-700 font-semibold">Location:</h5>
                    <p class="text-gray-600">{{ $companyData->location ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex items-center">
                <i class="bi bi-link-45deg text-blue-500 text-2xl mr-4"></i>
                <div>
                    <h5 class="text-gray-700 font-semibold">Website:</h5>
                    <p class="text-gray-600">
                        @if (isset($companyData->website))
                            <a href="{{ $companyData->website ?? '#'}}" class="text-blue-500 hover:underline">{{ $companyData->website ?? 'N/A' }}</a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>
            <div class="flex items-center">
                <i class="bi bi-envelope text-blue-500 text-2xl mr-4"></i>
                <div>
                    <h5 class="text-gray-700 font-semibold">Email:</h5>
                    <p class="text-gray-600">{{ $companyData->email ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="flex items-center">
                <i class="bi bi-card-text text-blue-500 text-2xl mr-4"></i>
                <div>
                    <h5 class="text-gray-700 font-semibold">About:</h5>
                    <p class="text-gray-600">{{ $companyData->description ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

<div class="flex flex-col min-h-screen mt-5">
    <h1 class="font-bold text-2xl relative">Jobs</h1>
    <div class="w-full h-0.5 bg-gray-300 mb-4"></div> <!-- Underline Ruler -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        @foreach ($jobs as $job)
            <div class="bg-white shadow-md rounded-lg p-6 relative">
                <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 text-sm rounded-full font-semibold">{{ $job->location_type ?? '' }}</span>
                <h2 class="text-xl font-bold text-gray-900 mt-4">{{ $job->job_title }}</h2>
                <div class="mt-3 text-gray-600">
                    <p><i class="fas fa-home text-gray-500"></i> {{ $job->company->company_name ?? '' }}</p>
                    <p><i class="fas fa-map-marker-alt text-gray-500"></i> {{ $job->location }}</p>
                </div>
                <div class="mt-4">
                    <a href="#" class="block w-full text-center bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection