@extends('frontend.layouts.app')
@section('title', 'Company Profile')
@push('custom_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.css"
        integrity="sha512-087vysR/jM0N5cp13Vlp+ZF9wx6tKbvJLwPO8Iit6J7R+n7uIMMjg37dEgexOshDmDITHYY5useeSmfD1MYiQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.js"
        integrity="sha512-lR8d1BXfYQuiqoM/LeGFVtxFyspzWFTZNyYIiE5O2CcAGtTCRRUMLloxATRuLz8EmR2fYqdXYlrGh+D6TVGp3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        body {
            margin-top: 100px;
        }

        /* .image-container {
            width: 100%;
            height: 100%;
            margin: 20px 0;
            overflow: hidden;
        } */

        .image-container img {
            max-width: 100%;
        }

        .image-input-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background-image: url('assets/media/svg/avatars/blank.svg');
            background-size: cover;
            background-position: center;
        }

        .image-input-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background-image: url('assets/media/svg/avatars/blank.svg');
            background-size: cover;
            background-position: center;
        }

        .image-container {
            height: 200px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cropper-container .cropper-bg {
            height: 100%;
            width: 100%;
        }

        /* .img-cropper {
      max-width: 600px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    } */


        /* .modal-body {
        min-height: 400px;
        max-height:400px;
    } */

        /* Hide the arrows in WebKit browsers (Chrome, Safari, Edge) */
        input[type="text"]::-webkit-outer-spin-button,
        input[type="text"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .status {
            position: fixed;
            left: 50%;
            z-index: 1000;
            top: 15%;
            transform: translateX(-50%);
        }
    </style>
@endpush

@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="status align-items-center fw-bold" role="alert">
            @if (session('status'))
                <div class="d-flex justify-content-center fade">{{ session('status') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
        </div>

        <!--begin::Wrapper-->

        {{-- <span id="successMessage" class="text-center alert alert-success fw-bold fs-5 position-absolute mt-5" style="display:none;"> --}}

        @if (session('user_name'))
            <div class="d-flex justify-content-center">
                <span id="alert-message2" class="alert alert-info text-center fw-bold fs-5 position-absolute mt-5 z-10">
                    {{ session('user_name') }}
                </span>
            </div>
        @endif
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
            style="background-image: url('{{ asset('frontend/assets/media/svg/illustrations/landing.svg') }}')">
        </div>
        <!--end::Wrapper-->
        <!--begin::How It Works Section-->

        <!--start-->

        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication - Multi-steps-->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column"
                id="kt_create_account_stepper">
                <!--begin::Aside-->
                <div class="d-flex flex-column flex-lg-row-auto w-xl-500px bg-lighten shadow-sm">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column  w-xl-500px scroll-y"><!--position-xl-fixed top-0 bottom-0-->
                        <!--begin::Header-->
                        <div class="d-flex flex-row-fluid flex-column flex-center p-10 pt-lg-20">
                            <!--begin::Logo-->
                            <!--<a href="../../demo1/dist/index.html" class="mb-10 mb-lg-20">
                                    <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
                                    </a>-->
                            <!--end::Logo-->
                            <!--begin::Nav-->
                            <div class="stepper-nav">
                                <!--begin::Step 1-->
                                <div class="stepper-item current cursor-pointer" data-kt-stepper-element="nav"
                                    id="candidateStep">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Company Profile</h3>
                                        <div class="stepper-desc fw-bold">Setup Your Company Details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Illustration-->

                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid py-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-column-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-700px "><!--p-10 p-lg-15  mx-auto-->
                            <!--begin::Form-->
                            {{-- <form class="my-auto pb-5" novalidate="novalidate" id="mainForm" method="" action="">
                            @csrf --}}
                            <!--begin::Step 1-->
                            <div id="profileForm" class="current" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <!--new start 1-->
                                <div class="flex-lg-row-fluid ms-lg-15">
                                    <!--begin:::Tabs-->
                                    <ul
                                        class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                                        <!--begin:::Tab item-->
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                                href="#kt_ecommerce_customer_overview">Company Profile</a>
                                        </li>
                                    </ul>
                                    <!--end:::Tabs-->
                                    <!--begin:::Tab content-->
                                    <div class="tab-content" id="myTabContent">
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade active show" id="kt_ecommerce_customer_overview"
                                            role="tabpanel">
                                            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                                                <!--begin::Card header-->
                                                <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                        <span class="svg-icon svg-icon-1 me-2">
                                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                        fill="currentColor" />
                                                                    <rect opacity="0.3" x="8" y="3" width="8"
                                                                        height="8" rx="4" fill="currentColor" />
                                                                </svg></span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <h2>Company Profile</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-5">
                                                    <!--begin::Form-->
                                                    <form id="companyProfileForm"
                                                        class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                        name="companyProfileForm" action=""
                                                        enctype="multipart/form-data" novalidate>
                                                        @csrf

                                                        <div class="container mt-5">
                                                            <!--begin::Input group-->
                                                            <div class="mb-7">
                                                                <input type="hidden" name="company_id"
                                                                    value="{{ $user->id }}" id="company_id">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-bold mb-3">
                                                                    <span>Update logo</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                        data-bs-toggle="tooltip" title="Upload your image"
                                                                        data-bs-original-title="Allowed file types: png, jpg, jpeg."
                                                                        aria-label="Allowed file types: png, jpg, jpeg."></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Image input wrapper-->
                                                                <div class="mt-1">
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-outline"
                                                                        data-kt-image-input="true">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-100px h-100px"
                                                                            style="background-image: url('{{ isset($companyProfile->logo) ? asset($companyProfile->logo) : asset("frontend/assets/media/avatars/blank.png") }}');">
                                                                        </div>
                                                                        <!--end::Preview existing avatar-->
                                                                        <!--begin::Edit-->
                                                                        <label
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="change"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Change logo"
                                                                            id="uploadButton">
                                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" id="logo"
                                                                                name="logo" accept=".png, .jpg, .jpeg"
                                                                                style="display: none;">
                                                                            <input type="hidden" name="avatar_remove">
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Edit-->
                                                                        <!--begin::Cancel-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="cancel"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Cancel avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Cancel-->
                                                                        <!--begin::Remove-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="remove"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Remove avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Remove-->
                                                                    </div>
                                                                    <!--end::Image input-->
                                                                </div>
                                                                <!--end::Image input wrapper-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!-- Cropper Modal -->
                                                            <div class="modal fade" id="cropModal" tabindex="-1"
                                                                aria-labelledby="cropModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div>
                                                                                <h5 class="modal-title"
                                                                                    id="cropModalLabel">Crop Your Image
                                                                                </h5>
                                                                                <h5
                                                                                    class="text-xs font-medium text-slate-500 dark:text-gray-400 inline">
                                                                                    Drag and zoom the image using the mouse
                                                                                    as needed.</h5>
                                                                            </div>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="p-5 overflow-auto">
                                                                            <div
                                                                                class="modal-body w-100 flex justify-center">
                                                                                <img id="image" src=""
                                                                                    alt="Image Preview"
                                                                                    style="display:none;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" id="cropButton"
                                                                                class="btn btn-success">Crop Image</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--begin::Input group-->
                                                        <div
                                                            class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Company Name</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the Company Name"
                                                                            aria-label="Enter the Company Name"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="company_name"
                                                                        class="form-control form-control-solid"
                                                                        name="company_name"
                                                                        value="{{ old('company_name', $companyProfile->company_name ?? '') }}">
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Designated HR</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the Designated HR"
                                                                            aria-label="Enter the Designated HR"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="designated_hr"
                                                                        class="form-control form-control-solid"
                                                                        name="designated_hr"
                                                                        value="{{ old('designated_hr', $companyProfile->designated_hr ?? '') }}">
                                                                    <div class="invalid-feedback"></div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <!--<div class="fv-row mb-7">
                    
                    
                                                                end::Input group-->
                                                        <!--begin::Row-->
                                                        <div
                                                            class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Email</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the contact's email."
                                                                            aria-label="Enter the contact's email."></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="email" id="email"
                                                                        class="form-control form-control-solid"
                                                                        style=" cursor: not-allowed;" name="email"
                                                                        value="{{ $user->email ?? '' }}" readonly>
                                                                    <!--end::Input-->


                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Phone no.</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the contact's phone number (optional)."
                                                                            aria-label="Enter the contact's phone number (optional)."></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="phone_no"
                                                                        class="form-control form-control-solid"
                                                                        name="phone_no"
                                                                        value="{{ old('phone_no', $companyProfile->phone_no ?? '') }}">
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>

                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Row-->
                                                        <div
                                                            class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">

                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label for="country"
                                                                        class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Country</span>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <div class="w-100">
                                                                        <div class="form-floating border rounded">
                                                                            <!--begin::Select2-->
                                                                            <select id="country-dropdown"
                                                                                class="form-select form-select-solid py-3 cursor-pointer"
                                                                                name="country" {{-- data-kt-ecommerce-settings-type="select2_flags" --}}
                                                                                data-control="select2"
                                                                                data-placeholder="Select a country"
                                                                                data-select2-id="select2-data-kt_ecommerce_select2_country"
                                                                                tabindex="-1">
                                                                                <option value="">Select Country
                                                                                    @foreach ($countries as $country_id => $country_name)
                                                                                <option value="{{ $country_id }}"
                                                                                    {{ isset($companyProfile->country) && $country_id == $companyProfile->country ? 'selected' : '' }}>
                                                                                    {{ $country_name }}
                                                                                </option>
                                                                                @endforeach

                                                                            </select>
                                                                            <!--end::Select2-->
                                                                            <div class="invalid-feedback"></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->

                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span>State</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the State (optional)."
                                                                            aria-label="Enter the contact's city of residence (optional)."></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    {{-- <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="state" value=""> --}}
                                                                    <!--end::Input-->
                                                                    <div class="w-100">
                                                                        <div class="form-floating border rounded">
                                                                            <!--begin::Select2-->
                                                                            <select id="state-dropdown"
                                                                                class="form-select form-select-solid py-3 cursor-pointer"
                                                                                name="state" data-bs-toggle="tooltip" title=""
                                                                                data-bs-original-title="Enter the State (optional)."tabindex="-1">
                                                                                <option value="">Select State
                                                                                </option>
                                                                                @foreach ($states as $state_id => $state_name)
                                                                                    <option value="{{ $state_id }}"
                                                                                        {{ isset($companyProfile->state) && $state_id == $companyProfile->state ? 'selected' : '' }}>
                                                                                        {{ $state_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback"></div>

                                                                            <!--end::Select2-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->

                                                        <!--begin::Row-->
                                                        <div
                                                            class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span>District</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            {{-- data-bs-toggle="tooltip"
                                                                            title=""
                                                                            data-bs-original-title="Enter the City." --}}
                                                                            aria-label="Select the District."></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    {{-- <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        name="City" value="">
                                                                    <!--end::Input--> --}}
                                                                    <div class="w-100">
                                                                        <div class="form-floating border rounded">
                                                                            <!--begin::Select2-->
                                                                            <select id="district-dropdown"
                                                                                class="form-select form-select-solid py-3 cursor-pointer"
                                                                                name="district" {{-- data-kt-ecommerce-settings-type="select2_flags"
                                                                            data-placeholder="Select a country"
                                                                            data-select2-id="select2-data-kt_ecommerce_select2_country" --}}
                                                                                tabindex="-1">
                                                                                <option selected>Select District
                                                                                </option>
                                                                                @foreach ($districts as $district_id => $district_name)
                                                                                    <option value="{{ $district_id }}"
                                                                                        {{ isset($companyProfile->district) && $district_id == $companyProfile->district ? 'selected' : '' }}>
                                                                                        {{ $district_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <!--end::Select2-->
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Pin Code</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the Pin Code"
                                                                            aria-label="Enter the Pin Code."></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="pincode"
                                                                        class="form-control form-control-solid required"
                                                                        name="pincode"
                                                                        value="{{ old('pincode', $companyProfile->pincode ?? '') }}">
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->

                                                        <!--begin::Row-->
                                                        <div
                                                            class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Website</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the Website."
                                                                            aria-label="Enter the Website."></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="email"
                                                                        class="form-control form-control-solid"
                                                                        name="website"
                                                                        value="{{ $companyProfile->website ?? '' }}">
                                                                        <div class="invalid-feedback"></div>
                                                                    <!--end::Input-->


                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Industry Type</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Select the Industry Type."
                                                                            aria-label="Select the Industry Type."></i>
                                                                    </label>
                                                                    <!--begin::Select2-->
                                                                    <select id="industry_type"
                                                                        class="form-select form-select-solid py-3 cursor-pointer"
                                                                        name="industry_type" {{-- data-kt-ecommerce-settings-type="select2_flags"
                                                               data-placeholder="Select a country"
                                                               data-select2-id="select2-data-kt_ecommerce_select2_country" --}}
                                                                        tabindex="-1">
                                                                        @php
                                                                            $selectedOpt = old(
                                                                                'industry_type',
                                                                                isset($companyProfile->industry_type)
                                                                                    ? $companyProfile->industry_type
                                                                                    : '',
                                                                            );
                                                                        @endphp
                                                                        <option {{ $selectedOpt ?? 'selected' }}>Select
                                                                            Industry</option>
                                                                        <option
                                                                            {{ $selectedOpt === 'Finance' ? 'selected' : '' }}>
                                                                            Finance</option>
                                                                        <option
                                                                            {{ $selectedOpt === 'Healthcare' ? 'selected' : '' }}>
                                                                            Healthcare</option>
                                                                        <option
                                                                            {{ $selectedOpt === 'IT' ? 'selected' : '' }}>
                                                                            IT</option>
                                                                        <option
                                                                            {{ $selectedOpt === 'Other' ? 'selected' : '' }}>
                                                                            Other</option>
                                                                    </select>
                                                                    <!--end::Select2-->

                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->

                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mt-3">
                                                                <span class="required">Description</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Enter Full Description"
                                                                    aria-label="Enter Full Description"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <textarea id="description" class="form-control form-control-solid" name="description">{{ old('description', $companyProfile->description ?? '') }}</textarea>
                                                            <div class="invalid-feedback"></div>

                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mt-3">
                                                                <span>Address</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Enter Full Address"
                                                                    aria-label="Enter Full Address"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <textarea id="address" class="form-control form-control-solid" name="address">{{ old('address', $companyProfile->address ?? '') }}</textarea>
                                                            <div class="invalid-feedback"></div>

                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Separator-->
                                                        <div class="separator mb-6"></div>
                                                        <!--end::Separator-->
                                                        <!--begin::Action buttons-->
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::Button-->
                                                            <button type="reset" data-kt-contacts-type="cancel"
                                                                class="btn btn-light me-3">Cancel</button>
                                                            <!--end::Button-->
                                                            <!--begin::Button-->
                                                            <button type="submit" data-kt-contacts-type="submit"
                                                                class="btn btn-primary">
                                                                <span class="indicator-label">Save</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
                                                        <!--end::Action buttons-->
                                                        <div></div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Card body-->
                                            </div>

                                        </div>
                                        <!--end:::Tab pane-->
                                    </div>
                                    <!--end:::Tab content-->
                                </div>
                                <!--new end 1-->
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Multi-steps-->
        </div>
        <!--end-->
        <!--end::Testimonials Section-->

    </div>
    <!--end::Root-->
    <!--end::Main-->

    {{-- Test --}}
    <!--end::Footer Section-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
    {{-- </div> --}}
    <!--end::Main-->

    @push('scripts')
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('frontend/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('frontend/assets/js/custom/utilities/modals/create-account.js') }}"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->

        <!--end::Global Javascript Bundle-->

        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('frontend/assets/js/custom/apps/contacts/edit-contact.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom/widgets.js') }}"></script>

        <!--end::Page Custom Javascript-->

        {{-- <script>
        card_number.addEventListener('keyup', function(e) {
            // console.log(e.keyCode);
            if (e.keyCode !== 8) {
                if (this.value.length === 4 || this.value.length === 9 || this.value.length === 14) {
                    this.value = this.value += ' ';
                }
            }
        });
    </script> --}}

        <!--For Passport-->
        <script id="rendered-js">
            function yesnoCheck() {
                if (document.getElementById('yesCheck').checked) {
                    document.getElementById('ifYes').style.visibility = 'visible';
                } else
                    document.getElementById('ifYes').style.visibility = 'hidden';

            }
        </script>

        <!--For Basic Medical History-->
        <script id="rendered-js">
            function yesnoCheckk() {
                if (document.getElementById('yesCheckk').checked) {
                    document.getElementById('ifYess').style.visibility = 'visible';
                } else
                    document.getElementById('ifYess').style.visibility = 'hidden';

            }
        </script>

        <!--For Specs-->
        <script id="rendered-js">
            function yesnoCheckkk() {
                if (document.getElementById('yesCheckkk').checked) {
                    document.getElementById('ifYesss').style.visibility = 'visible';
                } else
                    document.getElementById('ifYesss').style.visibility = 'hidden';

            }
        </script>

        <script>
            $('#kt_docs_repeater_advanced').repeater({
                initEmpty: false,
                defaultValues: {
                    'text-input': 'foo'
                },

                show: function() {
                    $(this).slideDown();

                    // Re-init select2
                    $(this).find('[data-kt-repeater="select2"]').select2();

                    // Re-init flatpickr
                    $(this).find('[data-kt-repeater="datepicker"]').flatpickr();

                    // Re-init tagify
                    new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                },

                ready: function() {
                    // Init select2
                    $('[data-kt-repeater="select2"]').select2();

                    // Init flatpickr
                    $('[data-kt-repeater="datepicker"]').flatpickr();

                    // Init Tagify
                    new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
                }
            });
        </script>

        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->


        <script src="{{ 'frontend/assets/plugins/global/plugins.bundle.js' }}"></script>
        <script src="{{ 'frontend/assets/js/scripts.bundle.js' }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ 'frontend/assets/plugins/custom/prismjs/prismjs.bundle.js' }}"></script>
        <script src="{{ 'frontend/assets/plugins/custom/formrepeater/formrepeater.bundle.js' }}"></script>
        <!--end::Page Vendors Javascript-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ 'frontend/assets/js/custom/documentation/documentation.js' }}"></script>
        <script src="{{ 'frontend/assets/js/custom/documentation/search.js' }}"></script>
        <script src="{{ 'frontend/assets/js/custom/documentation/forms/formrepeater/advanced.js' }}"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->

        {{-- begin: ajax & jquery --}}

        <script src="{{ 'frontend/assets/js/custom/documentation/search.js' }}"></script>
        <script src="{{ asset('frontend/assets/js/custom/utilities/modals/users-search.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

        <!--end::Global Stylesheets Bundle-->

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#state-dropdown').prop('disabled', true);
                $('#district-dropdown').prop('disabled', true);

                let cropper;
                const image = document.getElementById('image');
                const profilePictureInput = document.getElementById('logo');
                const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));

                // Trigger when a new file is selected
                profilePictureInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];

                    // checks the image type
                    if (file && /^image\/(png|jpe?g)$/.test(file.type)) {
                        const reader = new FileReader(); // Reads the image and creates a base64 URL
                        reader.onload = function(e) {
                            image.src = e.target
                            .result; // Set the image to the base64 encoded image content
                            image.style.display = 'block';

                            // Initialize the Cropper if it doesn't already exist
                            if (cropper) {
                                cropper.destroy();
                            }
                            cropper = new Cropper(image, {
                                aspectRatio: 1, // Adjust aspect ratio if needed
                                viewMode: 1,
                                scalable: true,
                                zoomable: true,
                                movable: true,
                                rotatable: false,
                            });

                            // Show the cropping modal
                            cropModal.show();
                        };
                        reader.readAsDataURL(file); // reads the image as a base64 URL
                    } else {
                        alert('Please upload a valid image (PNG, JPG, JPEG).');
                    }
                });

                // Handle crop button click
                $('#cropButton').on('click', function() {
                    const canvas = cropper.getCroppedCanvas({
                        width: 200, // Adjust width and height as needed
                        height: 200,
                    });

                    canvas.toBlob(function(blob) {
                        const croppedImage = new File([blob], 'cropped_image.jpg', {
                            type: 'image/jpeg'
                        });

                        // Replace the input's file with the cropped image
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(croppedImage);
                        profilePictureInput.files = dataTransfer.files;

                        // Hide the modal
                        cropModal.hide();

                        // Optional: Update the preview
                        $('.image-input-wrapper').css('background-image', `url(${canvas.toDataURL()})`);
                    });
                });

                // Company Profile
                $('#companyProfileForm').on('submit', function(event) {
                    event.preventDefault();

                    const form = $(this);
                    const formData = new FormData(this);
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    formData.append('company_id', $('#company_id').val());

                    const company_id = $('#company_id').val();

                    $.ajax({
                        url: `/account/company-profile/update/${company_id}`,
                        type: 'POST',
                        data: formData,
                        processData: false, // Prevent jQuery from processing the data
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status) {
                                clearValidationErrors(form);
                                displayStatus(response.message);
                            }
                        },
                        error: function(response) {
                            if (response.status === 422) { // Validation error
                                clearValidationErrors(form);
                                const errors = response.responseJSON?.errors;
                                
                                if (errors) {
                                    form.find('input, select, textarea').each(function() {
                                        const fieldName = $(this).attr('name');
                                        if (errors[fieldName]) {
                                            $(this).addClass('is-invalid border border-danger');
                                            $(this).next('.invalid-feedback').text(errors[fieldName][0]).show();
                                        }
                                    });

                                    if (errors['gender']) {
                                        $('.radio-btn-container').find('.invalid-feedback').text(errors['gender'][0]).show();
                                    }
                                    if (errors['date_of_birth']) {
                                        $('#date_of_birth').addClass('is-invalid');
                                        $('#date_of_birth').next('.invalid-feedback').text(errors['date_of_birth'][0]).show();
                                    }
                                }
                            }
                        }
                    });
                });

                // FOR STATES DROPDOWN
                $('#country-dropdown').on('change', function() {
                    const country_id = $(this).val(); // Get the selected country ID

                    // Clear and disable the state and district dropdowns
                    $('#state-dropdown').html('<option value="">Select State</option>').prop('disabled', true).trigger('change');
                    $('#district-dropdown').html('<option value="">Select District</option>').prop('disabled', true).trigger('change');

                    $.ajax({
                        url: "{{ route('states') }}",
                        type: 'POST',
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'), // CSRF token
                            'country_id': country_id // Pass country_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Check if states are returned
                            let options =
                            '<option value="">Select State</option>'; // Default option

                            if (response.states && response.states.length > 0) {
                                $.each(response.states, function(key, state) {
                                    options +=
                                        `<option value="${state.state_id}">${state.state_name}</option>`;
                                });

                                $('#state-dropdown').html(options).prop('disabled',
                                false); // Enable state dropdown
                                $('#district-dropdown').html(
                                    '<option value="">Select District</option>').prop(
                                    'disabled', false);
                            } else {
                                // If no states are returned
                                options += '<option value="">No results found</option>'
                                $('#state-dropdown').html(options).prop('disabled', false);
                            }
                        },
                        error: function() {
                            alert('Failed to fetch states. Please try again later.');
                        },
                    });
                });

                // FOR DISTRICTS DROPDOWN
                $('#state-dropdown').on('change', function() {
                    const state_id = $(this).val(); // Get the selected state ID

                    $.ajax({
                        url: "{{ route('districts') }}",
                        type: 'POST',
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'), // CSRF token
                            'state_id': state_id // Pass state_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Check if states are returned
                            let options =
                            '<option value="">Select District</option>'; // Default option

                            if (response.districts && response.districts.length > 0) {
                                $.each(response.districts, function(key, district) {
                                    options +=
                                        `<option value="${district.district_id}">${district.district_name}</option>`;
                                });

                                $('#district-dropdown').html(options).prop('disabled',
                                false); // Enable district dropdown
                            } else {
                                // If no districts are returned
                                options += '<option value="">No results found</option>'
                                $('#district-dropdown').html(options).prop('disabled', false);
                            }
                        },
                        error: function() {
                            alert('Failed to fetch states. Please try again later.');
                        },
                    });
                });

            });

            function displayStatus(response) {

                if (response) {
                    $('.status')
                        .removeClass('alert-danger d-flex')
                        .addClass('alert alert-success d-flex')
                        .text(response)
                        .fadeIn();
                } else {
                    $('.status')
                        .removeClass('alert-success d-flex')
                        .addClass('alert alert-danger d-flex')
                        .text('An error occurred. Please try again.')
                        .fadeIn();
                }

                // Automatically fade out after 5 seconds
                setTimeout(function() {
                    $('.status').fadeOut(function() {
                        $(this).text('');
                        $(this).removeClass('d-flex');
                        $(this).addClass('d-none');
                    });
                }, 5000);
            }


            function clearValidationErrors(form) {
                form.find('input, textarea, select').removeClass('is-invalid border border-danger');
                form.find('.invalid-feedback').text('').hide(); // Hide old errors
            }

        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get all stepper items
                var stepperItems = document.querySelectorAll('.stepper-item');

                // Add click event listener to each stepper item
                stepperItems.forEach(function(item) {
                    item.addEventListener('click', function() {
                        // Remove 'current' class from all stepper items
                        stepperItems.forEach(function(i) {
                            i.classList.remove('current');
                        });

                        // Add 'current' class to the clicked stepper item
                        item.classList.add('current');
                    });
                });
            });
        </script>

        <script>
            document.getElementById('candidateStep').addEventListener('click', function() {
                document.getElementById('profileForm').style.display = 'block';
                document.getElementById('educationForm').style.display = 'none';
                document.getElementById('workExperienceForm').style.display = 'none';
            });

            // document.getElementById('educationStep').addEventListener('click', function() {
            //     document.getElementById('educationForm').style.display = 'block';
            //     document.getElementById('profileForm').style.display = 'none';
            //     document.getElementById('workExperienceForm').style.display = 'none';
            // });

            // document.getElementById('experienceStep').addEventListener('click', function() {
            //     document.getElementById('workExperienceForm').style.display = 'block';
            //     document.getElementById('profileForm').style.display = 'none';
            //     document.getElementById('educationForm').style.display = 'none';
            // });
        </script>

        <!--dropdown search box-->
        <script>
            $(document).ready(function() {
                //change selectboxes to selectize mode to be searchable
                $("#country-dropdown").select2();
            });
        </script>
        <!--dropdown search box-->
    @endpush
@endsection
