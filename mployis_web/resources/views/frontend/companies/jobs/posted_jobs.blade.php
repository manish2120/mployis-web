@extends('frontend.layouts.app')
@section('title', 'Posted Jobs')
@push('custom_styles')
    <style>
        .company-card {
            border: 1px solid #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            transition: box-shadow 0.3s;
            background-color: #fff;
        }

        .company-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .badge-status {
            float: right;
            background-color: #28a745;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .company-card .btn {
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            width: 100%;
        }

        .company-card .location,
        .company-card .designation {
            font-size: 14px;
            color: #666;
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
        .custom-control-input:checked ~ .custom-control-label:before,
        #preloader #status .spinner > div,
        .social-icon li a:hover,
        .back-to-top:hover,
        .back-to-home a,
        ::selection,
        #topnav .navbar-toggle.open span:hover,
        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots.clickable .owl-dot:hover span,
        .watch-video a .play-icon-circle,
        .sidebar .widget .tagcloud > a:hover,
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
        .company-card {
            border: 1px solid #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            transition: box-shadow 0.3s;
            background-color: #fff;
        }

        .company-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .badge-status {
            float: right;
            background-color: #28a745;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .company-card .btn {
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            width: 100%;
        }

        .company-card .location,
        .company-card .designation {
            font-size: 14px;
            color: #666;
        }

        /* laravel pagination styles */
        .w-5.h-5 {
            width: 20px;
        }

    </style>
@endpush

@section('content')
@if(Session::has('error'))
  <p class="alert alert-danger">{{ Session('error') }}</p>
@endif
      
<div class="d-flex flex-column flex-root">
    <!--begin::Header Section-->
    <div class="mb-0" id="home">
            <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
        
            <!--begin::Landing hero-->
            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
  
              <!--begin::Title-->
              <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Connecting Talent with Job Opportunities
                <br />with
                <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    <span id="kt_landing_hero_text">MPLOYIS</span>
                </span>
                </h1>
                <!--end::Title-->
                <!--begin::Action-->
                {{-- <a href="{{ route('sign-in') }}" class="btn btn-primary">Sign-up now</a> --}}
                <!--end::Action-->
            </div>
        </div>
  
    {{-- @if ($companyId != null) --}}
      <div class="container mt-5">
        
        <div class="form-group">
            {{-- <input type="text" name="search" id="search" class="form-control" placeholder="Search">
        </div>
        <div class="search_list" style="background: #fff; border: 1px solid #ccc; width: 100%;"></div> --}}

          <div class="row">
              <!-- Start Looping through companies -->
            @foreach($companyPostedJobs as $postedJob)
            <div class="col-md-4 mb-4">
                <div class="company-card">
                    <div class="logo-container d-flex align-items-center" style="width: 70px; height: 70px; overflow: hidden; border-radius: 70%; margin-right: 8px;">
                        @if($postedJob->logo) <!-- Check if the logo exists -->
                            <img src="{{ asset($postedJob->company->logo) }}" alt="Logo" class="company-logo" style="width: 70px; height: 70px;">
                        @else
                            <img src="{{ asset('frontend/assets/media/avatars/blank.png') }}" alt="Logo" class="company-logo" style="width: 70px; height: 70px;">
                        @endif

                    </div>
                        <h2 class="text-dark fw-bolder mb-5 mt-5">{{ $postedJob->company->company_name ?? '' }}</h2>
                        <h2 class="text-dark fw-bolder mb-5 mt-5">{{ $postedJob->job_title ?? 'N/A' }}</h5>
                    <div class="mt-3">
                    <div class="fs-5 text-muted fw-bold">
                    <i class="fa fa-map-marker-alt text-gray-800"></i>
                        {{ $postedJob->location ?? '' }}
                    </div>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="{{ route('auth.account.company.edit-posted-jobs', ['job_id' => $postedJob->id, 'company_id' => $postedJob->company_id]) }}" target="_self" class="btn btn-primary mt-3">Edit Job</a>

                        <a href="#" target="_blank" class="btn btn-primary mt-3">Applications</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
        <!-- End Loop -->
</div>

        {{-- {{ $companyPostedJob->links() }} --}}

          <div class="row" style="margin: 20px 0px 20px 0px;"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dataTables_paginate paging_simple_numbers" id="kt_file_manager_list_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_file_manager_list_previous"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="7" tabindex="0" class="page-link">7</a></li><li class="paginate_button page-item next" id="kt_file_manager_list_next"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="8" tabindex="0" class="page-link"><i class="next"></i></a></li></ul></div></div></div>

      </div>
    {{-- @endif --}}

</div>
 <!-- Including Footer -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection
