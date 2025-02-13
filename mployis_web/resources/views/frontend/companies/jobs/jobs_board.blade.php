@extends('frontend.layouts.app')
@section('title', 'Job Board')
<!--begin::Main-->

<!--begin::Wrapper-->
@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/svg/illustrations/landing.svg)">

                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">

                    <!--begin::Title-->
                    <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Connecting Talent with Job
                        Opportunities
                        <br />with
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                            <span id="kt_landing_hero_text">MPLOYIS</span>
                        </span>
                    </h1>
                    <!--end::Title-->
                    <!--begin::Action-->
                    {{-- <a href="{{ route('sign-in') }}" class="btn btn-primary">Sign-up now</a> --}}
                    <!--end::Action-->
                </div>
                <!--end::Heading-->
                <!--begin::Clients-->
                {{-- <div class="d-flex flex-center flex-wrap position-relative px-5">
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/fujifilm.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/vodafone.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/kpmg.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/nasa.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/aspnetzero.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/aon.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/hp-3.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    <!--begin::Client-->
                    <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
                        <img src="{{url('frontend/assets/media/svg/brand-logos/truman.svg')}}" class="mh-30px mh-lg-40px" alt="" />
                    </div>
                    <!--end::Client-->
                    </div> --}}
                <!--end::Clients-->

            </div>


            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <style>
                body {
                    /* margin-top:100px; */
                }

                h1 {
                    font-size: 50px;
                }

                .shadow {
                    box-shadow: 0 0 3px rgb(53 64 78 / 20%) !important;
                }

                .rounded {
                    border-radius: 5px !important;
                }

                .bg-light {
                    background-color: #f7f8fa !important;
                }

                .bg-primary,
                .btn-primary,
                .btn-outline-primary:hover,
                .btn-outline-primary:focus,
                .btn-outline-primary:active,
                .btn-outline-primary.active,
                .btn-outline-primary.focus,
                .btn-outline-primary:not(:disabled):not(.disabled):active,
                .badge-primary,
                .nav-pills .nav-link.active,
                .pagination .active a,
                .custom-control-input:checked~.custom-control-label:before,
                #preloader #status .spinner>div,
                .social-icon li a:hover,
                .back-to-top:hover,
                .back-to-home a,
                ::selection,
                #topnav .navbar-toggle.open span:hover,
                .owl-theme .owl-dots .owl-dot.active span,
                .owl-theme .owl-dots.clickable .owl-dot:hover span,
                .watch-video a .play-icon-circle,
                .sidebar .widget .tagcloud>a:hover,
                .flatpickr-day.selected,
                .flatpickr-day.selected:hover,
                .tns-nav button.tns-nav-active,
                .form-check-input.form-check-input:checked {
                    background-color: #6dc77a !important;
                }

                .badge {
                    padding: 5px 8px;
                    border-radius: 3px;
                    letter-spacing: 0.5px;
                    font-size: 12px;
                }

                .btn {
                    padding: 8px 20px;
                    outline: none;
                    text-decoration: none;
                    font-size: 16px;
                    letter-spacing: 0.5px;
                    transition: all 0.3s;
                    font-weight: 600;
                    border-radius: 5px;
                }

                .btn-primary {
                    background-color: #6dc77a !important;
                    border: 1px solid #6dc77a !important;
                    color: #fff !important;
                    box-shadow: 0 3px 7px rgb(109 199 122 / 50%);
                }

                a {
                    text-decoration: none;
                }

                .btn-check:active+.btn.btn-primary,
                .btn-check:checked+.btn.btn-primary,
                .btn.btn-primary.active,
                .btn.btn-primary.show,
                .btn.btn-primary:active:not(.btn-active),
                .btn.btn-primary:focus:not(.btn-active),
                .btn.btn-primary:hover:not(.btn-active),
                .show>.btn.btn-primary {
                    color: #fff;
                    border: 1px solid #6dc77a !important;
                    border-color: #;
                    background-color: #095e8 !important;
                }

                /* laravel pagination styles */
                .w-5.h-5 {
                    width: 20px;
                }
            </style>

            <div class="container mt-5 pt-4">
                <div class="row align-items-end mb-4 pb-2">
                    <div class="col-md-8">
                        <div class="section-title text-center text-md-start">
                            <h1 class="title mb-4">Find the perfect jobs</h1>

                            <div class="fs-5 text-muted fw-bold">"Explore a wide range of job listings across various
                                industries on Mployis JobBoards. Our platform connects you with the latest opportunities
                                from top companies, making it easy to find and apply for positions that match your
                                skills and interests. Whether you're looking for full-time, part-time, or freelance
                                roles, Mployis JobBoards has something for everyone."</div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 mt-sm-0 d-none d-md-block">
                        <div class="text-center text-md-end">
                            <button type="button" class="btn btn-primary">View more Jobs <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg></button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">

                    {{-- <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                    </div>
                    <div class="search_list" style="background: #fff; border: 1px solid #ccc; width: 100%;"></div>
                    <select name="" id="" class="">
                        <option value="">Select</option>
                        <option value="">Part-Time</option>
                        <option value="">Full-Time</option>
                    </select>
                    <div class="job_data row mt-4"></div> --}}
                    
                    

                    @foreach ($jobs as $job)
                        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                            <div class="card border-0 bg-light rounded shadow">
                                <div class="card-body p-4">
                                    <span
                                        class="badge rounded-pill bg-primary float-md-end mb-5 mt-5">{{ $job->location_type ?? '' }}</span>
                                    <h2 class="text-dark fw-bolder mb-5 mt-5">{{ $job->job_title }}</h2>

                                    <div class="mt-3">
                                        <div class="fs-5 text-muted fw-bold"><i class="fa fa-home text-gray-800"
                                                aria-hidden="true"></i> {{ $job->company->company_name ?? '' }}</div>
                                        <div class="fs-5 text-muted fw-bold"><i class="fa fa-map-marker text-gray-800"
                                                aria-hidden="true"></i> {{ $job->location }}</div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-primary">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
                {{-- {{ $jobs->links() }} --}}

                <div class="row" style="margin: 20px 0px 20px 0px;">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_file_manager_list_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="kt_file_manager_list_previous">
                                    <a href="#" aria-controls="kt_file_manager_list" data-dt-idx="0" tabindex="0"
                                        class="page-link"><i class="previous"></i></a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="2" tabindex="0"
                                        class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="3" tabindex="0"
                                        class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="4" tabindex="0"
                                        class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="5" tabindex="0"
                                        class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="6" tabindex="0"
                                        class="page-link">6</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_file_manager_list" data-dt-idx="7" tabindex="0"
                                        class="page-link">7</a></li>
                                <li class="paginate_button page-item next" id="kt_file_manager_list_next"><a
                                        href="#" aria-controls="kt_file_manager_list" data-dt-idx="8"
                                        tabindex="0" class="page-link"><i class="next"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--end container-->

            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                            transform="rotate(90 13 6)" fill="currentColor" />
                        <path
                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Scrolltop-->
        </div>
        @push('custom_scripts')
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#search').on('keyup', function () {
                    const value = $(this).val();

                    if (value) {
                        // Show the suggestion list and fetch suggestions
                        $('.search_list').show();
                        $.ajax({
                            url: "{{ url('/posted-jobs') }}",
                            type: "GET",
                            data: {
                                'search': value,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                            },
                            success: function (data) {
                                // Display suggestions
                                let suggestions = '';
                                if (data.suggestions.length > 0) {
                                    data.suggestions.forEach(job => {
                                        suggestions += `
                                            <div class="suggestion-item" style="cursor: pointer;" data-title="${job}">
                                                ${job}
                                            </div>`;
                                    });
                                } else {
                                    suggestions = '<div class="suggestion-item">No suggestions found</div>';
                                }
                                $('.search_list').html(suggestions);
                                $('.search_list').show();

                                // Display detailed job data
                                $('.job_data').html(data.html);
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                            } else {
                                $('.search_list').html(''); // Clear suggestions if search box is empty
                                $('.search_list').hide();// Clear detailed data
                            }
                }
            );

            });
            
            // Handle click on a suggestion
            $(document).on('click', '.suggestion-item', function () {
                const selectedTitle = $(this).data('title'); // Get the selected suggestion text
                $('#search').val(selectedTitle); // Set the selected title in the search input

                // Clear and hide suggestions
                $('.search_list').html(''); // Clear the suggestion list content
                $('.search_list').hide(); // Hide the suggestion list
            });

        </script>
                        
                        
@endpush
@endsection