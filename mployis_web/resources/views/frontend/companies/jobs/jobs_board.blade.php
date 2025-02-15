@extends('frontend.layouts.app')
@section('title', 'Job Board')

@section('content')
<div class="flex flex-col min-h-screen">
    <div class="container mx-auto mt-5 pt-4">
        <div class="flex flex-wrap items-end mb-4 pb-2">
            <div class="w-full md:w-2/3 md:text-left">
                <h1 class="text-5xl font-bold mb-4">Find the perfect jobs</h1>
                <p class="text-lg text-gray-600">
                    "Explore a wide range of job listings across various industries on MPLOYIS. Our platform
                    connects you with the latest opportunities from top companies, making it easy to find and apply for
                    positions that match your skills and interests. Whether you're looking for full-time, part-time, or
                    freelance roles, MPLOYIS has something for everyone."
                </p>
            </div>
            <div class="hidden md:block w-full md:w-1/3 md:text-right mt-4 md:mt-0">
                <button class="px-6 py-3 bg-green-500 text-white font-semibold rounded shadow-md hover:bg-green-600">
                    View more Jobs
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- BEGINS::FORM --}}
        <form action="" id="jobSearchForm" class="flex items-center space-x-2">
            <input type="search" name="search_job" id="search_job" placeholder="Search Jobs..." autocomplete="off" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            <div class="mt-2" id="suggestions-box"></div>
            <button type="submit" class="px-4 py-3 bg-green-500 text-white rounded shadow hover:bg-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
        {{-- ENDS::FORM --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-8">
            @foreach ($jobs as $job)
                <div class="bg-gray-100 rounded-lg shadow p-6">
                    <span class="bg-green-500 text-white px-3 py-1 text-sm rounded-full float-right font-semibold">{{ $job->location_type ?? '' }}</span>
                    <h2 class="text-xl font-bold text-gray-900 mt-4">{{ $job->job_title }}</h2>
                    <div class="mt-3 text-gray-600">
                        <p><i class="fas fa-home text-gray-500"></i> {{ $job->company->company_name ?? '' }}</p>
                        <p><i class="fas fa-map-marker-alt text-gray-500"></i> {{ $job->location }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="block w-full text-center bg-green-500 text-white px-4 py-4 rounded shadow hover:bg-green-600">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $jobs->links() }}
    </div>
</div>

@push('custom_scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        let selectedJobId = null;

        // Fetch suggestions on typing
        $('#search_job').on('keyup', function () {
            let value = $(this).val().trim();

            if (value.length >= 3) {
                $.ajax({
                    url: "{{ route('company.job-board-search') }}",
                    type: "GET",
                    data: { search: value },
                    success: function (jobs) {
                        let suggestions = $('#suggestions-box');
                        suggestions.empty().show();

                        if (jobs.length === 0) {
                            suggestions.append('<div class="p-2 text-gray-500">No jobs found</div>');
                        } else {
                            $.each(jobs, function (index, job) {
                                suggestions.append(
                                    `<div class="p-2 cursor-pointer hover:bg-gray-200" data-id="${job.id}">
                                        ${job.job_title}
                                    </div>`
                                );
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching suggestions, Please try again later!", error);
                    }
                });
            } else {
                $('#suggestions-box').hide();
            }
        });

        // Handle click on suggestion
        $(document).on('click', '#suggestions-box div', function () {
            let jobTitle = $(this).text();
            selectedJobId = $(this).attr("data-id");

            $('#search_job').val(jobTitle);
            $('#suggestions-box').hide();
        });

        // Hide suggestions when clicking outside
        $(document).click(function (event) {
            if (!$(event.target).closest('#search_job, #suggestions-box').length) {
                $('#suggestions-box').hide();
            }
        });

        // Handle search form submission
        $('#jobSearchForm').on('submit', function (e) {
            e.preventDefault();

            let searchValue = $('#search_job').val();
            if (searchValue.length === 0) {
                alert("Please enter a job title.");
                return;
            }

            $.ajax({
                url: "{{ route('company.job-board-search') }}",
                type: "GET",
                data: { search: searchValue },
                success: function (data) {
                    let jobResults = $('.grid');
                    jobResults.empty();

                    if (data.length === 0) {
                        jobResults.append('<p class="text-gray-500 text-lg">No jobs found.</p>');
                    } else {
                        $.each(data, function (index, job) {
                            jobResults.append(
                                `<div class="bg-gray-100 rounded-lg shadow p-6">
                                    <h2 class="text-xl font-bold text-gray-900">${job.job_title}</h2>
                                    <p class="text-gray-600">${job.location || 'Location not provided'}</p>
                                    <div class="mt-4">
                                        <a href="/job/${job.id}" class="block w-full text-center bg-green-500 text-white px-4 py-4 rounded shadow hover:bg-green-600">View Details</a>
                                    </div>
                                </div>`
                            );
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching jobs:", error);
                }
            });
        });

    });
</script>

@endpush
@endsection
