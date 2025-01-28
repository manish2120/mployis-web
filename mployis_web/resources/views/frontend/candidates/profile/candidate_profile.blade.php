@extends('frontend.layouts.app')
@section('title', 'User Profile')
@push('custom_styles')
<style>
    body{
        margin-top:100px;
    }
    .image-container {
        width: 100%;
        height: 100%;
        margin: 20px 0;
        overflow: hidden;
    }
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

    /* .cropper-container.cropper-bg {
        min-height: 50vh;
        min-width: 100vh;
    } */

    /* Hide the arrows in WebKit browsers (Chrome, Safari, Edge) */
    input[type="text"]::-webkit-outer-spin-button,
    input[type="text"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .status {
    z-index: 5;
    position: fixed;
    left: 50%;
    top: 15%;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.css" integrity="sha512-087vysR/jM0N5cp13Vlp+ZF9wx6tKbvJLwPO8Iit6J7R+n7uIMMjg37dEgexOshDmDITHYY5useeSmfD1MYiQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.js" integrity="sha512-lR8d1BXfYQuiqoM/LeGFVtxFyspzWFTZNyYIiE5O2CcAGtTCRRUMLloxATRuLz8EmR2fYqdXYlrGh+D6TVGp3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
            <div class="status alert alert-dismissible align-items-center position-absolute" role="alert">
                @if (session('status'))
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill"></use>
                    </svg>
                    <div class="d-flex justify-content-center fw-bold">{{ session('status') }}</div>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    @endif
                </div>

            <!--begin::Wrapper-->

            {{-- <span id="successMessage" class="text-center alert alert-success fw-bold fs-5 position-absolute mt-5" style="display:none;"> --}}

            @if (session('user_name'))
                <div class="d-flex justify-content-center">
                    <span id="alert-message2" class="alert alert-info text-center fw-bold fs-5 position-absolute mt-5">
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
                                <div class="stepper-item current" data-kt-stepper-element="nav" id="candidateStep">
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
                                        <h3 class="stepper-title">Candidate Information</h3>
                                        <div class="stepper-desc fw-bold">Setup Your Personal Details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav" id="educationStep">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title"> Education Information</h3>
                                        <div class="stepper-desc fw-bold">Setup Your Education Information</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                {{-- <div class="stepper-item" data-kt-stepper-element="nav"> --}}
                                <!--begin::Line-->
                                {{-- <div class="stepper-line w-40px"></div> --}}
                                <!--end::Line-->
                                <!--begin::Icon-->
                                {{-- <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div> --}}
                                <!--end::Icon-->
                                <!--begin::Label-->
                                {{-- <div class="stepper-label">
                                    <h3 class="stepper-title">Family Background</h3>
                                    <div class="stepper-desc fw-bold">Your Family Background Info</div>
                                </div> --}}
                                <!--end::Label-->
                                {{-- </div> --}}
                                <!--end::Step 3-->

                                <!--begin::Step 5-->
                                <div class="stepper-item" data-kt-stepper-element="nav" id="experienceStep">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Work Experience</h3>
                                        <div class="stepper-desc fw-bold">Work Experience</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 5-->
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
                                                href="#kt_ecommerce_customer_overview">User
                                                Profile</a>
                                        </li>
                                        <!--end:::Tab item-->
                                        <!--begin:::Tab item-->
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                                href="#kt_ecommerce_customer_general">Personal Information</a>
                                        </li>
                                        <!--end:::Tab item-->
                                        <!--begin:::Tab item-->
                                        {{-- <li class="nav-item">
                                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_customer_advanced">Advanced Settings</a>
                                        </li> --}}
                                        <!--end:::Tab item-->
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
                                                                    height="24" viewBox="0 0 24 24"
                                                                    fill="none">
                                                                    <path
                                                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                        fill="currentColor" />
                                                                    <rect opacity="0.3" x="8" y="3" width="8"
                                                                        height="8" rx="4"
                                                                        fill="currentColor" />
                                                                </svg></span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <h2>User Profile</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-5">
                                                    <!--begin::Form-->
                                                    <form id="userForm" class="form fv-plugins-bootstrap5 fv-plugins-framework" name="userForm" action="" enctype="multipart/form-data" novalidate>
                                                        @csrf

                                                        <div class="container mt-5">
                                                            <!--begin::Input group-->
                                                            <div class="mb-7">
                                                                <input type="hidden" name="candidate_id" value="{{ $user->id }}" id="candidate_id">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-bold mb-3">
                                                                    <span>Update Avatar</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Upload your image"
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
                                                                            style="background-image: url('{{ isset($candidate->profile_picture) && $candidate->profile_picture ? asset($candidate->profile_picture) : asset('frontend/assets/media/avatars/blank.png') }}');">
                                                                        </div>
                                                                        <!--end::Preview existing avatar-->
                                                                        <!--begin::Edit-->
                                                                        <label
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="change"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Change avatar"
                                                                            id="uploadButton">
                                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" id="profile-picture"
                                                                                name="profile_picture"
                                                                                accept=".png, .jpg, .jpeg"
                                                                                style="display: none;">
                                                                            <input type="hidden"
                                                                                name="avatar_remove">
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
                                                            <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div>
                                                                        <h5 class="modal-title" id="cropModalLabel">Crop Your Image</h5>
                                                                        <h5 class="text-xs font-medium text-slate-500 dark:text-gray-400">Drag and zoom the image using the mouse as needed.</h5>
                                                                        </div>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="image-container">
                                                                            <img id="image" src="" alt="Image Preview" style="display:none;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" id="cropButton" class="btn btn-success">Crop Image</button>
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
                                                                        <span class="required">First Name</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the First Name"
                                                                            aria-label="Enter the First Name"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="fname"
                                                                        class="form-control form-control-solid"
                                                                        name="fname"
                                                                        value="{{ old('fname', $candidate->fname ?? '') }}">
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
                                                                        <span class="required">Last Name</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the Last Name"
                                                                            aria-label="Enter the Last Name"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" id="lname"
                                                                        class="form-control form-control-solid"
                                                                        name="lname"
                                                                        value="{{ old('lname', $candidate->lname ?? '') }}">
                                                                    <div class="invalid-feedback"></div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div
                                                            class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Date Of Birth</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter the DFB"
                                                                            aria-label="Enter the DFB"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="date" id="date_of_birth"
                                                                        class="form-control form-control-solid"
                                                                        name="date_of_birth"
                                                                        value="{{ old('date_of_birth', $candidate->date_of_birth ?? '') }}">
                                                                    <div class="invalid-feedback"></div>

                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 radio-btn-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Gender</span>

                                                                    </label>
                                                                    <br>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->

                                                                    <input class="form-check-input me-3 cursor-pointer"
                                                                        type="radio" id="Male" name="gender"
                                                                        value="Male" {{ old('gender', isset($candidate->gender) && $candidate->gender === 'male' ? 'checked' : '') }}>
                                                                    <label class="fs-6 fw-bold form-label">
                                                                        <span>Male</span>
                                                                    </label><br>
                                                                    <input class="form-check-input me-3 cursor-pointer"
                                                                        type="radio" id="Female" name="gender"
                                                                        value="Female" {{ old('gender', isset($candidate->gender) && $candidate->gender === 'female' ? 'checked' : '') }}>
                                                                    <label class="fs-6 fw-bold form-label">
                                                                        <span>Female</span>
                                                                    </label>
                                                                    <input
                                                                        class="form-check-input ms-5 me-3 cursor-pointer"
                                                                        type="radio" id="Other" name="gender"
                                                                        value="Other" {{ old('gender', isset($candidate->gender) && $candidate->gender === 'other' ? 'checked' : '') }}>
                                                                    <label class="fs-6 fw-bold form-label">
                                                                        <span>Other</span>
                                                                    </label>
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
                                                                        <span class="required">Phone</span>
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
                                                                        value="{{ old('phone_no', $candidate->phone_no ?? '') }}">
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>

                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Row-->
                                                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">

                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold form-label mt-3">
                                                                        <span class="required">Country</span>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <div class="w-100">
                                                                        <div class="form-floating border rounded">
                                                                            <!--begin::Select2-->
                                                                            <select id="country-dropdown"
                                                                                class="form-select form-select-solid py-3"
                                                                                name="country" {{-- data-kt-ecommerce-settings-type="select2_flags" --}}
                                                                                data-placeholder="Select a country"
                                                                                data-select2-id="select2-data-kt_ecommerce_select2_country"
                                                                                tabindex="-1">
                                                                                <option value="">Select Country
                                                                                    @foreach($countries as $country_id => $country_name)
                                                                                    <option value="{{ $country_id }}" {{ isset($candidate->country) && $country_id == $candidate->country ? 'selected' : '' }}>
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
                                                                            data-bs-original-title="Enter the contact's city of residence (optional)."
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
                                                                                class="form-select form-select-solid py-3"
                                                                                name="state" {{-- data-kt-ecommerce-settings-type="select2_flags"
                                                                        data-placeholder="Select a state" --}}
                                                                                {{-- data-select2-id="select2-data-kt_ecommerce_select2_country" --}} tabindex="-1">
                                                                                <option value="">Select State</option>
                                                                                @foreach($states as $state_id => $state_name)
                                                                                <option value="{{ $state_id }}" {{ isset($candidate->state) && $state_id == $candidate->state ? 'selected' : '' }}>
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
                                                                            aria-label="Enter the City."></i>
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
                                                                                class="form-select form-select-solid py-3"
                                                                                name="district" {{-- data-kt-ecommerce-settings-type="select2_flags"
                                                                            data-placeholder="Select a country"
                                                                            data-select2-id="select2-data-kt_ecommerce_select2_country" --}}
                                                                                tabindex="-1">
                                                                                <option selected>Select District
                                                                                </option>
                                                                                @foreach ($districts as $district_id => $district_name)
                                                                                <option value="{{ $district_id }}" {{ isset($candidate->district) && $district_id == $candidate->district ? 'selected' : '' }}>
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
                                                                        value="{{ old('pincode', $candidate->pincode ?? '') }}">
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>
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
                                                                <span>Address</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Enter Full Address"
                                                                    aria-label="Enter Full Address"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <textarea id="address" class="form-control form-control-solid" name="address">{{ old('address', $candidate->address ?? '') }}</textarea>
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
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade" id="kt_ecommerce_customer_general"
                                            role="tabpanel">
                                            <!--begin::Card-->
                                            <div class="card pt-4 mb-6 mb-xl-9">
                                                <!--begin::Card header-->
                                                <div class="card-header border-0">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>Personal Information</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0 pb-5">
                                                    <!--begin::Form-->
                                                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                        id="personalInfoForm" novalidate="novalidate">
                                                        @csrf
                                                        <!--begin::Row-->

                                                        <input type="hidden" id="candidate_id" name="candidate_id" value="{{ $user }}">

                                                        <div id="message-container-personal-info">
                                                            <div id="success-message-personal-info"
                                                                class="alert alert-success" style="display: none;">
                                                            </div>
                                                            <div id="error-message-personal-info"
                                                                class="alert alert-danger" style="display: none;">
                                                            </div>
                                                        </div>

                                                        <div class="row row-cols-1 row-cols-md-2">

                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold mb-2">
                                                                        <span>Religion</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Enter Your Religion"
                                                                            data-bs-original-title="Enter Religion"
                                                                            aria-label="Enter Religion"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="Ex.Hindu" name="religion"
                                                                        value="{{ old('religion', $candidatePersonalInfo->religion ?? '') }}">
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
                                                                    <label class="fs-6 fw-bold mb-2">
                                                                        <span>Caste</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Enter Your Caste"
                                                                            data-bs-original-title="Enter Caste"
                                                                            aria-label="Enter Caste"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="Ex. Open" name="caste"
                                                                        value="{{ old('caste', $candidatePersonalInfo->caste ?? '') }}">
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->

                                                        </div>
                                                        <!--end::Row-->

                                                        <!--begin::Row-->
                                                        <div class="row row-cols-1 row-cols-md-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold mb-2">
                                                                        <span>Pan Card Number</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter Pan Card Number"
                                                                            aria-label="Enter Pan Card Number"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        id="pancard_no" name="pancard_no"
                                                                        placeholder="ABCDE1234P" maxlength="10"
                                                                        pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}"
                                                                        value="{{ old('pancard_no', $candidatePersonalInfo->pancard_no ?? '') }}">
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
                                                                    <label class="fs-6 fw-bold mb-2">
                                                                        <span>Aadhaar Card Number</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter Aadhaar Card Number"
                                                                            aria-label="Enter Aadhaar Card Number"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="1234 5678 1234"
                                                                        name="aadhar_card_no" id="aadhar_card_no"
                                                                        value="{{ old('aadhar_card_no', $candidatePersonalInfo->aadhar_card_no ?? '') }}"
                                                                        pattern="\d{4}\s\d{4}\s\d{4}" maxlength="14"
                                                                        required>
                                                                        <div class="invalid-feedback"></div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->

                                                        <!--begin::Row-->
                                                        <div class="row row-cols-1 row-cols-md-2">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7 fv-plugins-icon-container radio-btn-container">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-bold mb-2">
                                                                        <span>Passport</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Enter Passport Number"
                                                                            aria-label="Enter Passport Number"></i>
                                                                    </label>
                                                                    <br>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3"
                                                                        type="radio" value="Yes"
                                                                        onclick="yesnoCheck();" {{-- name="yesno" id="yesCheck"> --}}
                                                                        name="passport" id="yesCheck" {{ old('passport', isset($candidatePersonalInfo->passport) && $candidatePersonalInfo->passport === 'Yes' ? 'checked' : '') }}>
                                                                    <label class="fs-6 fw-bold form-label">
                                                                        <span>Yes</span>
                                                                    </label><br>
                                                                    <input class="form-check-input me-3"
                                                                        type="radio" value="No"
                                                                        onclick="yesnoCheck();" {{-- name="yesno" id="noCheck" --}}
                                                                        name="passport" id="noCheck" {{ old('passport', isset($candidatePersonalInfo->passport) && $candidatePersonalInfo->passport === 'No' ? 'checked' : '') }}>
                                                                    <label class="fs-6 fw-bold form-label ">
                                                                        <span>No</span>
                                                                    </label>
                                                                    <!--end::Input-->
                                                                    {{-- <div class="invalid-feedback"></div> --}}
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->


                                                            <!--begin::Col-->
                                                            <div class="col {{ isset($candidatePersonalInfo->passport_no) && $candidatePersonalInfo->passport_no ? 'd-none' : '' }}" id="ifYes"
                                                                style="visibility:hidden">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label for="passport_no"
                                                                        class="fs-6 fw-bold mb-2">
                                                                        <span class="required">Passport
                                                                            Number</span>
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Enter Your Passport Number (6-9 characters, alphanumeric)"
                                                                            data-bs-original-title="Enter Your Passport Number (6-9 characters, alphanumeric)"
                                                                            aria-label="Enter Your Passport Number (6-9 characters, alphanumeric)"></i>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        placeholder="A1234567" id="passport_no"
                                                                        name="passport_no"
                                                                        value="{{ old('passport_no', $candidatePersonalInfo->passport_no ?? '') }}" {{ isset($candidatePersonalInfo->passport_no) && $candidatePersonalInfo->passport_no ? '' : 'd-none'}}>
                                                                    <!--end::Input-->
                                                                    <div class="invalid-feedback"></div>
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->

                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::Button-->
                                                            <button type="submit" id="saveBtn"
                                                                {{-- id="kt_ecommerce_customer_profile_submit" --}} class="btn btn-light-primary"
                                                                disabled>
                                                                <span class="indicator-label">Save</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
                                                        <div></div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Card body-->
                                            </div>


                                        </div>
                                        <!--end:::Tab pane-->
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade" id="kt_ecommerce_customer_advanced"
                                            role="tabpanel">
                                            <!--begin::Card-->
                                            <div class="card pt-4 mb-6 mb-xl-9">
                                                <!--begin::Card header-->
                                                <div class="card-header border-0">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>Security Details</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0 pb-5">
                                                    <!--begin::Table wrapper-->
                                                    <form method="POST" action="">
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table class="table align-middle table-row-dashed gy-5"
                                                                id="kt_table_users_login_session">
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6 fw-bold text-gray-600">
                                                                    {{-- <tr>
                                                                <td>Phone</td>
                                                                <td>+6141 234 567</td>
                                                                <td class="text-end">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#kt_modal_update_phone">
                                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24"
                                                                                height="24"
                                                                                viewBox="0 0 24 24"
                                                                                fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                    fill="currentColor">
                                                                                </path>
                                                                                <path
                                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                    fill="currentColor">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </td>
                                                            </tr> --}}
                                                                    <tr>
                                                                        <td>Current Password</td>
                                                                        <td>******</td>
                                                                        <td class="text-end">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#kt_modal_current_password">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none">
                                                                                        <path opacity="0.3"
                                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                            fill="currentColor">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                            fill="currentColor">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>New Password</td>
                                                                        <td>******</td>
                                                                        <td class="text-end">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#kt_modal_new_password">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none">
                                                                                        <path opacity="0.3"
                                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                            fill="currentColor">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                            fill="currentColor">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Confirm New Password</td>
                                                                        <td>******</td>
                                                                        <td class="text-end">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#kt_modal_confirm_new_password">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none">
                                                                                        <path opacity="0.3"
                                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                            fill="currentColor">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                            fill="currentColor">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table wrapper-->
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::Button-->
                                                            <button type="submit" {{-- id="kt_ecommerce_customer_profile_submit" --}}
                                                                class="btn btn-light-primary">
                                                                <span class="indicator-label">Save</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
                                                        <div></div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Card body-->

                                            </div>
                                            <!--end::Card-->
                                        </div>
                                        <!--end:::Tab pane-->
                                    </div>
                                    <!--end:::Tab content-->
                                </div>
                                <!--new end 1-->
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="" id="educationForm" data-kt-stepper-element="content"
                                style="display:none;">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <!--<div class="pb-10 pb-lg-15">
                                            <h2 class="fw-bolder text-dark">Account Info</h2>
                                            <div class="text-muted fw-bold fs-6">If you need more info, please check out
                                            <a href="#" class="link-primary fw-bolder">Help Page</a>.</div>
                                        </div>-->
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <!--new start 2-->

                                    <div class="flex-lg-row-fluid ms-lg-15">
                                        <!--begin:::Tabs-->
                                        <ul
                                            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4 active"
                                                    data-bs-toggle="tab" href="#kt_ecommerce_customer_overview10th">
                                                    Grade 10
                                                    <sup>th</sup></a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                                    href="#kt_ecommerce_customer_general12th"> Grade 12
                                                    <sup>th</sup></a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                                    href="#kt_ecommerce_customer_advancedhigh"> Higher
                                                    Education</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                                    href="#kt_ecommerce_customer_advancedMD"> Masters and
                                                    Doctorate</a>
                                            </li>
                                            <!--end:::Tab item-->
                                        </ul>
                                        <!--end:::Tabs-->
                                        <!--begin:::Tab content-->
                                        <div class="tab-content" id="myTabContent">
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade active show"
                                                id="kt_ecommerce_customer_overview10th" role="tabpanel">
                                                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                                                    <!--begin::Card header-->
                                                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                            <span class="svg-icon svg-icon-1 me-2">
                                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                            fill="currentColor" />
                                                                        <rect opacity="0.3" x="8" y="3"
                                                                            width="8" height="8"
                                                                            rx="4" fill="currentColor" />
                                                                    </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <h2> Grade 10 <sup>th</sup> Information</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-5">

                                                        <!--begin::Form-->
                                                        <form id="grade_tenth_form"
                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <div id="message-container-10th">
                                                                <div id="success-message-10th"
                                                                    class="alert alert-success"
                                                                    style="display: none;"></div>
                                                                <div id="error-message-10th"
                                                                    class="alert alert-danger" style="display: none;">
                                                                </div>
                                                            </div>

                                                            <!--begin::Input group-->
                                                            <div class="mb-7">

                                                                {{-- <label class="fs-6 fw-bold mb-3">
                                                            <span>Update Avatar</span>
                                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Allowed file types: png, jpg, jpeg." aria-label="Allowed file types: png, jpg, jpeg."></i>
                                                            </label> --}}

                                                                {{-- <div class="mt-1"> --}}

                                                                {{-- <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                                
                                                                <div class="image-input-wrapper w-100px h-100px" style="background-image: url('assets/media/svg/avatars/blank.svg')"></div>
                                                                
                                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                
                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                                <input type="hidden" name="avatar_remove">
                                                                
                                                                </label>
                                                                
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                                
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                                
                                                            </div> --}}

                                                                {{-- </div> --}}

                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                <input type="hidden" name="candidate_id" value="{{ $user->id }}" id="candidate_id">

                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">School
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter School Name"
                                                                                aria-label="Enter the School Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="school_name"
                                                                            value="{{ old('school_name', $candidateTenthGradeInfo->school_name ?? '') }}">
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
                                                                            <span class="required">School Board
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title="Enter Your School Board Name"
                                                                                data-bs-original-title="School Board Name"
                                                                                aria-label="School Board Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <select name="board_name"
                                                                            class="form-select form-select-lg form-select-solid"
                                                                            data-control="select2"
                                                                            data-placeholder="Select..."
                                                                            data-allow-clear="true"
                                                                            data-hide-search="true">
                                                                            <option value="" {{ old('board_name', isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === '' ? 'selected' : '' }}>Select
                                                                                Board</option>
                                                                            <option value="CBSE" {{ old(isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === 'CBSE' ? 'selected' : '' }}>
                                                                                CBSE</option>
                                                                                <option value="ICSC" {{ old('board_name', isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === 'ICSC' ? 'selected' : '' }}>
                                                                                    ICSE
                                                                                </option>
                                                                                <option value="IB" {{ old('board_name', isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === 'IB' ? 'selected' : '' }}>
                                                                                    IGCSE
                                                                                </option>
                                                                                <option value="NIOS" {{ old('board_name', isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === 'NIOS' ? 'selected' : '' }}>
                                                                                    NIOS
                                                                                </option>
                                                                                <option value="State Board" {{ old('board_name', isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === 'State Board' ? 'selected' : '' }}>
                                                                                    State Board
                                                                                </option>
                                                                                <option value="Other" {{ old('board_name', isset($candidateTenthGradeInfo) ? $candidateTenthGradeInfo->board_name : '') === 'Other' ? 'selected' : '' }}>
                                                                                    Other
                                                                                </option>
                                                                        </select>
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->

                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">10<sup>th</sup>
                                                                                Grade Percentage</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter 10th Grade Percentage"
                                                                                aria-label="Enter 10th Grade Percentage"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            placeholder="00.00" min="0"
                                                                            max="100" step="0.01"
                                                                            name="grade_percentage"
                                                                            placeholder="00.00" min="0"
                                                                            max="100" step="0.01"
                                                                            value="{{ isset($candidateTenthGradeInfo) && $candidateTenthGradeInfo->grade_or_percentage ?? '' }}">
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required"> Passing
                                                                                Certificate</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter 10th Grade Passing Certificate"
                                                                                aria-label="Enter 10<sup>th</sup> Grade Passing Certificate"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="file"
                                                                            class="form-control form-control-solid"
                                                                            name="passing_certificate" value=""
                                                                            accept=".pdf,.jpg,.png,.jpeg">
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>

                                                                        <!-- File existence message -->
                                                                        <div class="mt-2">
                                                                            <span class="text-success fw-bold">
                                                                                @if (isset($candidateTenthGradeInfo) && $candidateTenthGradeInfo->passing_certificate)
                                                                            <div class="mt-2">
                                                                                <span class="text-success fw-bold">File
                                                                                    uploaded:
                                                                                    <a href="{{ asset($candidateTenthGradeInfo->passing_certificate) }}"
                                                                                        target="_blank">
                                                                                        {{ strlen(basename($candidateTenthGradeInfo->passing_certificate)) > 15 ? substr(basename($candidateTenthGradeInfo->passing_certificate), 0, 15) . '...' : basename($candidateTenthGradeInfo->passing_certificate) }}
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                        @else
                                                                            <div class="mt-2">
                                                                                <div class="invalid feedback"></div>
                                                                            </div>
                                                                        @endif
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">

                                                                <label class="fs-6 fw-bold form-label mt-3">
                                                                    <span>Year Of Passing</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Enter Year Of Passing"
                                                                        aria-label="Enter Year Of Passing"></i>
                                                                </label>

                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="year_of_passing"
                                                                    value="{{ isset($candidateTenthGradeInfo) && $candidateTenthGradeInfo->year_of_passing ?? '' }}">

                                                                <div class="invalid-feedback"></div>
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Row-->

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
                                                                    <span class="indicator-progress">Please
                                                                        wait...
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
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade" id="kt_ecommerce_customer_general12th"
                                                role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                            <span class="svg-icon svg-icon-1 me-2">
                                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                            fill="currentColor" />
                                                                        <rect opacity="0.3" x="8" y="3"
                                                                            width="8" height="8"
                                                                            rx="4" fill="currentColor" />
                                                                    </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <h2> Grade 12 <sup>th</sup> Information</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Form-->
                                                        <form id="grade_twelfth_form"
                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                            method="POST"
                                                            action=""
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <!--begin::Input group-->

                                                            {{-- begin::status message --}}
                                                            <div id="message-container-12th">
                                                                <div id="success-message-12th"
                                                                    class="alert alert-success"
                                                                    style="display: none;"></div>
                                                                <div id="error-12th-message-12th"
                                                                    class="alert alert-danger" style="display: none;">
                                                                </div>
                                                            </div>
                                                            {{-- end::status message --}}

                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                <input type="hidden" name="candidate_id" value="{{ $user->id }}" id="candidate_id">

                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">College
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter Collage Name"
                                                                                aria-label="Enter the Collage Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="college_name"
                                                                            value="{{ old('college_name', $candidateTwelfthGradeInfo->college_name ?? '') }}">
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
                                                                            <span class="required"> Board
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title=" Board Name"
                                                                                aria-label=" Board Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <select name="board_name"
                                                                            class="form-select form-select-lg form-select-solid"
                                                                            data-control="select2"
                                                                            data-placeholder="Select..."
                                                                            data-allow-clear="true"
                                                                            data-hide-search="true">
                                                                            <option value="" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === '' ? 'selected' : '' }}>
                                                                                Select Board
                                                                            </option>
                                                                            <option value="CBSE" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === 'CBSE' ? 'selected' : '' }}>
                                                                                CBSE
                                                                            </option>
                                                                            <option value="ICSC" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === 'ICSC' ? 'selected' : '' }}>
                                                                                ISC
                                                                            </option>
                                                                            <option value="IB" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === 'IB' ? 'selected' : '' }}>
                                                                                IB
                                                                            </option>
                                                                            <option value="NIOS" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === 'NIOS' ? 'selected' : '' }}>
                                                                                NIOS
                                                                            </option>
                                                                            <option value="State Board" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === 'State Board' ? 'selected' : '' }}>
                                                                                State Board
                                                                            </option>
                                                                            <option value="Other" {{ old('board_name', isset($candidateTwelfthGradeInfo) ? $candidateTwelfthGradeInfo->board_name : '') === 'Other' ? 'selected' : '' }}>
                                                                                Other
                                                                            </option>
                                                                            
                                                                        </select>
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">12<sup>th</sup>
                                                                                Grade Percentage</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter 12<sup>th</sup> Grade Percentage"
                                                                                aria-label="Enter 12<sup>th</sup> Grade Percentage"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="grade_percentage"
                                                                            placeholder="00.00" min="0"
                                                                            max="100" step="0.01"
                                                                            value="">
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required"> Passing
                                                                                Certificate</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter 12<sup>th</sup> Grade Passing Certificate"
                                                                                aria-label="Enter 12<sup>th</sup> Grade Passing Certificate"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="file"
                                                                            class="form-control form-control-solid"
                                                                            name="passing_certificate"
                                                                            accept=".pdf,.jpg,.png,.jpeg">
                                                                        <!--end::Input-->

                                                                        <!-- File existence message -->
                                                                            <div class="mt-2">
                                                                                <span class="text-success fw-bold">
                                                                                    File Uploaded :
                                                                                    @if (isset($candidateTwelfthGradeInfo) && $candidateTwelfthGradeInfo->passing_certificate)
                                                                                    <a href="{{ asset($candidateTwelfthGradeInfo->passing_certificate) }}">
                                                                                        {{ strlen($candidateTwelfthGradeInfo) > 15 ? substr(basename($candidateTwelfthGradeInfo->passing_certificate), 0, 15) . '...' : basename($candidateTwelfthGradeInfo)}}
                                                                                    </a>
                                                                                    @else
                                                                                    file not found
                                                                                    @endif
                                                                                  
                                                                                </span>
                                                                            </div>

                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <label class="fs-6 fw-bold form-label mt-3">
                                                                    <span>Year Of Passing</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Enter Year Of Passing"
                                                                        aria-label="Enter Year Of Passing"></i>
                                                                </label>

                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="year_of_passing"
                                                                    value="{{ old('year_of_passing', $candidateTwelfthGradeInfo->year_of_passing ?? '') }}">

                                                                    <div class="invalid-feedback"></div>
                                                            </div>
                                                            <!--end::Input group-->

                                                            <div class="d-flex justify-content-end">
                                                                <!--begin::Button-->
                                                                <button type="submit"
                                                                    id="kt_ecommerce_customer_profile_submit"
                                                                    class="btn btn-light-primary">
                                                                    <span class="indicator-label">Save</span>
                                                                    <span class="indicator-progress">Please
                                                                        wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                                <!--end::Button-->
                                                            </div>
                                                            <div></div>
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                            </div>
                                            <!--end:::Tab pane-->

                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade" id="kt_ecommerce_customer_advancedhigh"
                                                role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                            <span class="svg-icon svg-icon-1 me-2">
                                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                            fill="currentColor" />
                                                                        <rect opacity="0.3" x="8" y="3"
                                                                            width="8" height="8"
                                                                            rx="4" fill="currentColor" />
                                                                    </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <h2> Higher Education</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Form-->
                                                        <form id="higher_education_form" method="POST"
                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                            action=""
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <!--begin::Input group-->

                                                            {{-- begin::status message --}}
                                                            <div id="message-container-higher-education">
                                                                <div id="success-message-higher-education"
                                                                    class="alert alert-success"
                                                                    style="display: none;"></div>
                                                                <div id="error-message-higher-education"
                                                                    class="alert alert-danger" style="display: none;">
                                                                </div>
                                                            </div>
                                                            {{-- end::status message --}}

                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                <input type="hidden" name="candidate_id" value="{{ $user->id }}" id="candidate_id">

                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">Institute/Collage
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter Institute Name"
                                                                                aria-label="Enter the Institute Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="college_institute_name"
                                                                            value="{{ old('college_institute_name', $candidateHigherEducationInfo->institute_or_college_name ?? '') }}">
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
                                                                            <span class="required"> Board
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title=" Board Name"
                                                                                aria-label=" Board Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <select name="board_name"
                                                                            class="form-select form-select-lg form-select-solid"
                                                                            data-control="select2"
                                                                            data-placeholder="Select..."
                                                                            data-allow-clear="true"
                                                                            data-hide-search="true">
                                                                            <option value="" {{ old('board_name', isset($candidateHigherEducationInfo) ? $candidateHigherEducationInfo->board_name : '') === '' ? 'selected' : '' }}>
                                                                                Select University
                                                                            </option>
                                                                            <option value="State University" {{ old('board_name', isset($candidateHigherEducationInfo) ? $candidateHigherEducationInfo->board_name : '') === 'State University' ? 'selected' : '' }}>
                                                                                State University
                                                                            </option>
                                                                            <option value="Central University" {{ old('board_name', isset($candidateHigherEducationInfo) ? $candidateHigherEducationInfo->board_name : '') === 'Central University' ? 'selected' : '' }}>
                                                                                Central University
                                                                            </option>
                                                                            <option value="Private University" {{ old('board_name', isset($candidateHigherEducationInfo) ? $candidateHigherEducationInfo->board_name : '') === 'Private University' ? 'selected' : '' }}>
                                                                                Private University
                                                                            </option>
                                                                            <option value="Deemed University" {{ old('board_name', isset($candidateHigherEducationInfo) ? $candidateHigherEducationInfo->board_name : '') === 'Deemed University' ? 'selected' : '' }}>
                                                                                Deemed University
                                                                            </option>
                                                                            <option value="Other" {{ old('board_name', isset($candidateHigherEducationInfo) ? $candidateHigherEducationInfo->board_name : '') === 'Other' ? 'selected' : '' }}>
                                                                                Other
                                                                            </option>
                                                                            
                                                                        </select>
                                                                        <!--end::Input-->
                                                                        <div id="error-higher-education-board_name"
                                                                            class="text-danger input-error"
                                                                            style="display: none;"></div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">
                                                                                Grade/Percentage</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter Grade /Percentage"
                                                                                aria-label=" Grade /Percentage"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="grade_percentage"
                                                                            placeholder="00.00" min="0"
                                                                            max="100" step="0.01"
                                                                            value="{{ old('grade_percentage', $candidateHigherEducationInfo->grade_or_percentage ?? '') }}">
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required"> Passing
                                                                                Certificate</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter 12<sup>th</sup> Grade Passing Certificate"
                                                                                aria-label="Enter 12<sup>th</sup> Grade Passing Certificate"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="file"
                                                                            class="form-control form-control-solid"
                                                                            name="passing_certificate" value=""
                                                                            accept=".pdf,.jpg,.png,.jpeg">
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>

                                                                        <!-- File existence message -->
                                                                        <div class="mt-2">
                                                                            <span class="text-success fw-bold">
                                                                                File Uploaded :
                                                                                @if (isset($candidateHigherEducationInfo) && $candidateHigherEducationInfo->passing_certificate)
                                                                                <a href="{{ asset($candidateHigherEducationInfo->passing_certificate) }}">
                                                                                    {{ strlen($candidateHigherEducationInfo) > 15 ? substr(basename($candidateHigherEducationInfo->passing_certificate), 0, 15) . '...' : basename($candidateHigherEducationInfo)}}
                                                                                </a>
                                                                                @else
                                                                                file not found
                                                                                @endif
                                                                              
                                                                            </span>
                                                                        </div>

                                                                    <div class="invalid-feedback"></div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">

                                                                <label class="fs-6 fw-bold form-label mt-3">
                                                                    <span>Year Of Passing</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Enter Year Of Passing"
                                                                        aria-label="Enter Year Of Passing"></i>
                                                                </label>

                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="year_of_passing"
                                                                    value="{{ old('year_of_passing', $candidateHigherEducationInfo->year_of_passing ?? '') }}">
                                                                <div class="invalid-feedback"></div>
                                                            </div>
                                                            <!--end::Input group-->

                                                            <div class="d-flex justify-content-end">
                                                                <!--begin::Button-->
                                                                <button type="submit"
                                                                    id="kt_ecommerce_customer_profile_submit"
                                                                    class="btn btn-light-primary">
                                                                    <span class="indicator-label">Save</span>
                                                                    <span class="indicator-progress">Please
                                                                        wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                                <!--end::Button-->
                                                            </div>
                                                            <div></div>
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end:::Tab pane-->

                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade" id="kt_ecommerce_customer_advancedMD"
                                                role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                            <span class="svg-icon svg-icon-1 me-2">
                                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                                                                <span
                                                                    class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                            fill="currentColor" />
                                                                        <rect opacity="0.3" x="8" y="3"
                                                                            width="8" height="8"
                                                                            rx="4" fill="currentColor" />
                                                                    </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <h2> Masters and Doctorate</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Form-->
                                                        <form id="masters_doctorate_form"
                                                            class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                            method="POST"
                                                            action=""
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <!--begin::Input group-->

                                                            {{-- begin::status message --}}
                                                            <div id="message-container-postgraduate">
                                                                <div id="success-message-postgraduate"
                                                                    class="alert alert-success"
                                                                    style="display: none;"></div>
                                                                <div id="error-postgraduate-message-postgraduate"
                                                                    class="alert alert-danger"
                                                                    style="display: none;"></div>
                                                            </div>
                                                            {{-- end::status message --}}

                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                <input type="hidden" name="candidate_id" value="{{ $user->id }}" id="candidate_id">

                                                                    <!--begin::Input group-->
                                                                    <div
                                                                        class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">Institute/College
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter Institute/College Name"
                                                                                aria-label="Enter the Institute/College Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="college_institute_name"
                                                                            value="{{ $candidatePostGraduateInfo->institute_or_college_name ?? '' }}">
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
                                                                            <span class="required"> Board
                                                                                Name</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title=" Board Name"
                                                                                aria-label=" Board Name"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <select name="board_name"
                                                                            class="form-select form-select-lg form-select-solid"
                                                                            data-control="select2"
                                                                            data-placeholder="Select..."
                                                                            data-allow-clear="true"
                                                                            data-hide-search="true">
                                                                            <option value="" {{ old('board_name', isset($candidatePostGraduateInfo) ? $candidatePostGraduateInfo->board_name : '') === '' ? 'selected' : '' }}>
                                                                                Select University
                                                                            </option>
                                                                            <option value="State University" {{ old('board_name', isset($candidatePostGraduateInfo) ? $candidatePostGraduateInfo->board_name : '') === 'State University' ? 'selected' : '' }}>
                                                                                State University
                                                                            </option>
                                                                            <option value="Central University" {{ old('board_name', isset($candidatePostGraduateInfo) ? $candidatePostGraduateInfo->board_name : '') === 'Central University' ? 'selected' : '' }}>
                                                                                Central University
                                                                            </option>
                                                                            <option value="Private University" {{ old('board_name', isset($candidatePostGraduateInfo) ? $candidatePostGraduateInfo->board_name : '') === 'Private University' ? 'selected' : '' }}>
                                                                                Private University
                                                                            </option>
                                                                            <option value="Deemed University" {{ old('board_name', isset($candidatePostGraduateInfo) ? $candidatePostGraduateInfo->board_name : '') === 'Deemed University' ? 'selected' : '' }}>
                                                                                Deemed University
                                                                            </option>
                                                                            <option value="Other" {{ old('board_name', isset($candidatePostGraduateInfo) ? $candidatePostGraduateInfo->board_name : '') === 'Other' ? 'selected' : '' }}>
                                                                                Other
                                                                            </option>
                                                                            
                                                                        </select>
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div
                                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div
                                                                        class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required">Grade/
                                                                                Percentage</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter Grade/Percentage"
                                                                                aria-label="Enter Grade/Percentage"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            name="grade_percentage"
                                                                            placeholder="00.00" min="0"
                                                                            max="100" step="0.01"
                                                                            value="{{ old('grade_percentage', $candidatePostGraduateInfo->grade_percentage ?? '') }}">
                                                                        <!--end::Input-->
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Input group-->
                                                                    <div
                                                                        class="fv-row mb-7 fv-plugins-icon-container">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                                            <span class="required"> Passing
                                                                                Certificate</span>
                                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title=""
                                                                                data-bs-original-title="Enter  Passing Certificate"
                                                                                aria-label="Enter Passing Certificate"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="file"
                                                                            class="form-control form-control-solid"
                                                                            name="passing_certificate"
                                                                            value=""
                                                                            accept=".pdf,.jpg,.png,.jpeg">
                                                                        <div class="invalid-feedback"></div>

                                                                        <!--end::Input-->
                                                                        <!-- File existence message -->
                                                                        <div class="mt-2">
                                                                            <span class="text-success fw-bold">
                                                                                File Uploaded :
                                                                                @if (isset($candidatePostGraduateInfo) && $candidatePostGraduateInfo->passing_certificate)
                                                                                <a href="{{ asset($candidatePostGraduateInfo->passing_certificate) }}">
                                                                                    {{ strlen($candidatePostGraduateInfo) > 15 ? substr(basename($candidatePostGraduateInfo->passing_certificate), 0, 15) . '...' : basename($candidatePostGraduateInfo)}}
                                                                                </a>
                                                                                @else
                                                                                file not found
                                                                                @endif
                                                                              
                                                                            </span>
                                                                        </div>

                                                                    <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <label class="fs-6 fw-bold form-label mt-3">
                                                                    <span>Year Of Passing</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Enter Year Of Passing"
                                                                        aria-label="Enter Year Of Passing"></i>
                                                                </label>

                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="year_of_passing"
                                                                    value="{{ old('year_of_passing', $candidatePostGraduateInfo->year_of_passing ?? '') }}">
                                                                    <div class="invalid-feedback"></div>
                                                            </div>
                                                            <!--end::Input group-->

                                                            <div class="d-flex justify-content-end">
                                                                <!--begin::Button-->
                                                                <button type="submit"
                                                                    id="kt_ecommerce_customer_profile_submit"
                                                                    class="btn btn-light-primary">
                                                                    <span class="indicator-label">Save</span>
                                                                    <span class="indicator-progress">Please wait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                    </span>
                                                                </button>
                                                                <!--end::Button-->
                                                            </div>
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

                                    <!--new end 2-->
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 2-->

                            <!--begin::Step 5-->
                            <div class="" data-kt-stepper-element="content" id="workExperienceForm">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <!--<div class="pb-8 pb-lg-10">
                                      <h2 class="fw-bolder text-dark">Your Are Done!</h2>
                                      <div class="text-muted fw-bold fs-6">If you need more info, please
                                      <a href="../../demo1/dist/authentication/sign-in/basic.html" class="link-primary fw-bolder">Sign In</a>.</div>
                                      </div>-->
                                    <!--end::Heading-->



                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0">
                                            <!--begin::Card title-->
                                            <div class="card-title flex-column">
                                                <h2 class="mb-1">Experience</h2>
                                                {{-- <div class="fs-6 fw-bold text-muted">Keep your account extra secure with a second authentication step.</div> --}}
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Card toolbar-->
                                            {{-- <div class="card-toolbar">
                                                        <!--begin::Add-->
                                                        <button type="button" class="btn btn-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="currentColor"></path>
                                                                <path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Add New</button>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-6 w-200px py-4" data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_auth_app">Add Position</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_one_time_password">Add Career Break</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                        <!--end::Add-->
                                                    </div> --}}
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pb-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    @if(isset($candidateExperienceInfo))
                                                    <span class="text-gray-900 fw-bolder">{{ $candidateExperienceInfo->job_title ?? '' }}</span>
                                                    <span class="text-muted fs-6">
                                                        {{ $candidateExperienceInfo->company_name ?? '' }} - 
                                                        {{ $candidateExperienceInfo->employee_type ?? '' }}
                                                    </span>
                                                    <span class="text-muted fs-6">
                                                        From
                                                        {{ \Carbon\Carbon::parse($candidateExperienceInfo->start_date)->format('d-m-Y') }},
                                                        Present {{ \Carbon\Carbon::now()->format('d-m-Y') }}
                                                    </span>
                                                    @else
                                                    <span class="text-muted fs-6">No work experience available</span>
                                                    @endif
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Action-->
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <!--begin::Button-->
                                                    <button type="button"
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-5"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_add_one_time_password">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    {{-- <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_users_delete">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button> --}}
                                                    <!--end::Button-->
                                                </div>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin:Separator-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--end:Separator-->
                                            <!-- <div class="text-gray-600">If you lose your mobile device or security key, you can
                                                <a href="#" class="me-1">generate a backup code</a>to sign in to your account.</div> -->
                                        </div>
                                        <!--end::Card body-->
                                    </div>

                                    <!--add new work start-->
                                    <!--begin::Modal - Add task-->
                                    <div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1"
                                        aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">
                                                <!--begin::Modal header-->
                                                <div class="modal-header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bolder">Add Authenticator App</h2>
                                                    <!--end::Modal title-->
                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                        data-kt-users-modal-action="close">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="6" y="17.3137"
                                                                    width="16" height="2" rx="1"
                                                                    transform="rotate(-45 6 17.3137)"
                                                                    fill="currentColor" />
                                                                <rect x="7.41422" y="6" width="16"
                                                                    height="2" rx="1"
                                                                    transform="rotate(45 7.41422 6)"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            {{-- <form class="form" id="kt_modal_add_one_time_password_form">
                                                <!--
                                                <div class="fw-bolder mb-9">Enter the new phone number to receive an SMS to when you log in.</div>
                                                -->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Job Title</span>
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Please Enter Your Job Title"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" name="" placeholder="Job Type / Profile" value="" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Employee Type</span>
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Please Select Your Employee Type"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                                                <option></option>
                                                                <option value="">Full Time </option>
                                                                <option value="">Part Time</option>
                                                                <option value="">Self Employee</option>
                                                                <option value="">Internship </option>
                                                                <option value="">Trainee</option>
                                                            </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Company Name</span>
                                                        
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Please Enter Your "></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" name="" placeholder="Company Name" value="" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Location Type</span>
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Please Select Your Location Type"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="location_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                                                <option></option>
                                                                <option value="1">Onsite </option>
                                                                <option value="2">Hybrid</option>
                                                                <option value="3">Remote</option>
                                                                
                                                            </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Start Date</span>
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Please Enter job start date"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="date" class="form-control form-control-solid" name="" placeholder="Enter job start date" value="" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <div class="mb-10">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">Still Working in present company</label>
                                            </div>
                                        </div>
                                                
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form> --}}
                                            <!--end::Form-->
                                        </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - Add task-->


                                    <!--begin::Modal - Add task-->
                                    <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1"
                                        aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">
                                                <!--begin::Modal header-->
                                                <div class="modal-header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bolder">Add experience</h2>
                                                    <!--end::Modal title-->
                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                        data-kt-users-modal-action="close">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="6" y="17.3137"
                                                                    width="16" height="2" rx="1"
                                                                    transform="rotate(-45 6 17.3137)"
                                                                    fill="currentColor" />
                                                                <rect x="7.41422" y="6" width="16"
                                                                    height="2" rx="1"
                                                                    transform="rotate(45 7.41422 6)"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                    <!--begin::Form-->
                                                    <form class="form" id="experience_form">
                                                        @csrf
                                                        <!-- <div class="fw-bolder mb-9">Enter the new phone number to receive an SMS to when you log in.</div> -->

                                                        {{-- begin::status message --}}
                                                        <div id="message-container-experience-form">
                                                            <div id="success-message-experience-form"
                                                                class="alert alert-success" style="display: none;">
                                                            </div>
                                                            <div id="error-experience-form-message-experience-form"
                                                                class="alert alert-danger" style="display: none;">
                                                            </div>
                                                        </div>
                                                        {{-- end::status message --}}

                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <input type="hidden" name="candidate_id" value="{{ $user->id }}" id="candidate_id">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mb-2">
                                                                <span class="required">Job Title</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Please Enter Your Job Title"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text"
                                                                class="form-control form-control-solid"
                                                                name="job_title" placeholder="Job Type / Profile"
                                                                value="{{ old('job_title', $candidateExperienceInfo->job_title ?? '') }}" />
                                                            <!--end::Input-->
                                                            <div class="invalid-feedback"></div>

                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">

                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mb-2">
                                                                <span class="required">Employee Type</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Please Select Your Employee Type"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="employee_type"
                                                                class="form-select form-select-lg form-select-solid"
                                                                data-control="select2" data-placeholder="Select..."
                                                                data-allow-clear="true" data-hide-search="true">
                                                                <option value="" {{ old('employee_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->employee_type : '') === '' ? 'selected' : '' }}>Select...</option>
                                                                <option value="Full Time" {{ old('employee_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->employee_type : '') === 'Full Time' ? 'selected' : '' }}>
                                                                    Full Time
                                                                </option>
                                                                <option value="Part Time" {{ old('employee_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->employee_type : '') === 'Part Time' ? 'selected' : '' }}>
                                                                    Part Time
                                                                </option>
                                                                <option value="Self Employee" {{ old('employee_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->employee_type : '') === 'Self Employee' ? 'selected' : '' }}>
                                                                    Self Employee
                                                                </option>
                                                                <option value="Internship" {{ old('employee_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->employee_type : '') === 'Internship' ? 'selected' : '' }}>
                                                                    Internship
                                                                </option>
                                                                <option value="Trainee" {{ old('employee_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->employee_type : '') === 'Trainee' ? 'selected' : '' }}>
                                                                    Trainee
                                                                </option>
                                                            </select>
                                                            <!--end::Input-->
                                                            <div class="invalid-feedback"></div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">

                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mb-2">
                                                                <span class="required">Company Name</span>

                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Please Enter Your "></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text"
                                                                class="form-control form-control-solid"
                                                                name="company_name" placeholder="Company Name"
                                                                value="{{ old('company_name', $candidateExperienceInfo->company_name ?? '') }}" />
                                                            <!--end::Input-->
                                                            <div class="invalid-feedback"></div>

                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">

                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mb-2">
                                                                <span class="required">Location Type</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Please Select Your Location Type"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="location_type"
                                                                class="form-select form-select-lg form-select-solid"
                                                                data-control="select2" data-placeholder="Select..."
                                                                data-allow-clear="true" data-hide-search="true">
                                                                <option value="" {{ old('location_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->location_type : '') === '' ? 'selected' : '' }}>Select...</option>
                                                                <option value="Onsite" {{ old('location_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->location_type : '') === 'Onsite' ? 'selected' : '' }}>
                                                                    Onsite
                                                                </option>
                                                                <option value="Hybrid" {{ old('location_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->location_type : '') === 'Hybrid' ? 'selected' : '' }}>
                                                                    Hybrid
                                                                </option>
                                                                <option value="Remote" {{ old('location_type', isset($candidateExperienceInfo) ? $candidateExperienceInfo->location_type : '') === 'Remote' ? 'selected' : '' }}>
                                                                    Remote
                                                                </option>
                                                                
                                                            </select>
                                                            <!--end::Input-->
                                                            <div class="invalid-feedback"></div>

                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">

                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold form-label mb-2">
                                                                <span class="required">Start Date</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Please Enter job start date"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="date"
                                                                class="form-control form-control-solid"
                                                                name="start_date" placeholder="Enter job start date"
                                                                value="{{ old('start_date', $candidateExperienceInfo->start_date ?? '') }}" />
                                                            <!--end::Input-->
                                                            <div class="invalid-feedback"></div>

                                                        </div>
                                                        <!--end::Input group-->

                                                        <div class="mb-10">
                                                            <div
                                                                class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="is_currently_working"
                                                                    value=""
                                                                    id="flexCheckDefault" {{ old('is_currently_working', isset($candidateExperienceInfo->is_currently_working) ? $candidateExperienceInfo->is_currently_working : '') === 'checked' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="flexCheckDefault">Still Working in present
                                                                    company</label>
                                                            </div>
                                                            <div class="invalid-feedback"></div>
                                                        </div>

                                                        <!--begin::Actions-->
                                                        <div class="text-center pt-15">
                                                            <button type="reset" class="btn btn-light me-3"
                                                                data-kt-users-modal-action="cancel">Cancel</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                data-kt-users-modal-action="submit">
                                                                <span class="indicator-label">Submit</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                        </div>
                                                        <!--end::Actions-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - Add task-->
                                    <!--end::Modals-->
                                    <!--add new work end-->



                                    <!--<div class="mb-0">
            
                                    <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great &amp; amazing audience.</div>
                                    
                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                    
                                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                        </svg>
                                    </span>
                                    
                                    <div class="d-flex flex-stack flex-grow-1">
                                        
                                        <div class="fw-bold">
                                        <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                                        <div class="fs-6 text-gray-700">To start using great tools, please, please
                                        <a href="#" class="fw-bolder">Create Team Platform</a></div>
                                        </div>
                                        
                                    </div>
                                    
                                    </div>
                                    
                                    </div>-->
                                    <!--end::Body-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 5-->

                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-15">
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3"
                                        data-kt-stepper-action="previous">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="11" width="13" height="2"
                                                    rx="1" fill="currentColor" />
                                                <path
                                                    d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Previous</button>
                                </div>
                                <div>
                                    <button {{-- id="submitAllForms" --}} type="button" class="btn btn-lg btn-primary"
                                        data-kt-stepper-action="submit">
                                        <span class="indicator-label">Submit
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-4 ms-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="18" y="13" width="13"
                                                        height="2" rx="1"
                                                        transform="rotate(-180 18 13)" fill="currentColor" />
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    {{-- <button type="button" class="btn btn-lg btn-primary"
                                        data-kt-stepper-action="next">Continue
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-4 ms-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13"
                                                    height="2" rx="1"
                                                    transform="rotate(-180 18 13)" fill="currentColor" />
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></button> --}}
                                </div>
                            </div>
                            <!--end::Actions-->
                            {{-- </form> --}}
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <!--<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
        
                        <div class="d-flex flex-center fw-bold fs-6">
                        <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                        <a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
                        <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
                        </div>
                    
                        </div>-->
                    <!--end::Footer-->
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

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>--}}

    {{-- <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript--> --}}

    <!--begin::Page Custom Javascript(used by this page)-->
    {{-- <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/transaction-history.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/add-auth-app.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/add-address.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/add-one-time-password.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/update-password.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/update-phone.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/update-address.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/ecommerce/customers/details/update-profile.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/utilities/modals/new-card.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/utilities/modals/users-search.js') }}"></script> --}}
    <!--end::Page Custom Javascript-->

   
   <!--end::Global Stylesheets Bundle-->

       <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
       
       <script>
        $(document).ready(function() {
            let cropper;
            const image = document.getElementById('image');
            const profilePictureInput = document.getElementById('profile-picture');
            const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));

            // Trigger when a new file is selected
            profilePictureInput.addEventListener('change', function (event) {
                const file = event.target.files[0];

                // checks the image type
                if (file && /^image\/(png|jpe?g)$/.test(file.type)) {
                    const reader = new FileReader(); // Reads the image and creates a base64 URL
                    reader.onload = function (e) {
                        image.src = e.target.result; // Set the image to the base64 encoded image content
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
            $('#cropButton').on('click', function () {
                const canvas = cropper.getCroppedCanvas({
                    width: 200, // Adjust width and height as needed
                    height: 200,
                });

                canvas.toBlob(function (blob) {
                    const croppedImage = new File([blob], 'cropped_image.jpg', { type: 'image/jpeg' });

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

// CANDIDATE INFORMATION
$('#userForm').on('submit', function(event) {
  event.preventDefault();

  const form = $(this);
  const formData = new FormData(this);
  formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

  const candidate_id = $('#candidate_id').val();

  $.ajax({
      url: `/account/user-profile/${candidate_id}/update`,
      type: 'POST',
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false,
      dataType: 'json',
      success: function(response) {
          if(response.status) {
              clearValidationErrors(form);
              displayStatus(response.message);
          }
      },
      error: function(response, xhr) {
          if(!response.error || xhr.status === 422) {
              clearValidationErrors(form);
              const errors = response.responseJSON?.errors;
              if(errors) {
                form.find('input, select, textarea').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });

                  if(errors['gender'] ) {
                      $('.radio-btn-container').find('.invalid-feedback').html(errors['gender'][0]).show();
                  }
                  if(errors['date_of_birth']) {
                      $('#date_of_birth').addClass('border border-danger is-invalid');
                      $('#date_of_birth').next('.invalid-feedback').html(errors['date_of_birth'][0]).show();
                  }
              }
          }
      }
  });
});

// FOR STATES DROPDOWN
$('#country-dropdown').on('change', function () {
  const country_id = $(this).val(); // Get the selected country ID

  // Clear and disable the state and district dropdowns
  $('#state-dropdown').html('<option value="">Select State</option>').prop('disabled', true);
  $('#district-dropdown').html('<option value="">Select District</option>').prop('disabled', true);

  $.ajax({
      url: "{{ route('states') }}",
      type: 'POST',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'), // CSRF token
          'country_id': country_id // Pass country_id
      },
      dataType: 'json',
      success: function (response) {
          // Check if states are returned
          let options = '<option value="">Select State</option>'; // Default option

          if (response.states && response.states.length > 0) {
              $.each(response.states, function (key, state) {
                  options += `<option value="${state.state_id}">${state.state_name}</option>`;
              });

              $('#state-dropdown').html(options).prop('disabled', false); // Enable state dropdown
              $('#district-dropdown').html('<option value="">Select District</option>').prop('disabled', false);
          } else {
              // If no states are returned
              options += '<option value="">No results found</option>'
              $('#state-dropdown').html(options).prop('disabled', false);
          }
      },
      error: function () {
          alert('Failed to fetch states. Please try again later.');
      },
  });
});

// FOR DISTRICTS DROPDOWN
$('#state-dropdown').on('change', function () {
  const state_id = $(this).val(); // Get the selected state ID

  $.ajax({
      url: "{{ route('districts') }}",
      type: 'POST',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'), // CSRF token
          'state_id': state_id  // Pass state_id
      },
      dataType: 'json',
      success: function (response) {
          // Check if states are returned
          let options = '<option value="">Select District</option>'; // Default option
      
          if (response.districts && response.districts.length > 0) {
              $.each(response.districts, function (key, district) {
                  options += `<option value="${district.district_id}">${district.district_name}</option>`;
              });

              $('#district-dropdown').html(options).prop('disabled', false); // Enable district dropdown
          } else {
              // If no districts are returned
              options += '<option value="">No results found</option>'
              $('#district-dropdown').html(options).prop('disabled', false);
          }
      },
      error: function () {
          alert('Failed to fetch states. Please try again later.');
      },
  });
});


// PERSONAL INFORMATION
const inputs = $('#personalInfoForm input');
const saveButton = $('#saveBtn');
saveButton.prop('disabled', true);

// Begins::Handles aadhar card spacing
$('#aadhar_card_no').on('input', function() {
    $inputVal = $(this).val().replace(/\D/g, ''); // Removes all non-digit characters.

    let formattedValue = '';
    for(let i = 0; i < $inputVal.length; i++) {
        if(i > 0 && (i % 4 === 0)) {
            formattedValue += ' ';
        }

        formattedValue += $inputVal[i];
    }

    $(this).val(formattedValue);
});
// Ends::Handles aadhar card spacing

// check all inputs
inputs.on('input', function() {
  checkInputs();
});

function checkInputs() {
  let filled = false;
  inputs.each((index, input) => {
      const $inputElem = $(input); // Converts the raw DOM element into jquery object.
      if($inputElem.val().trim() !== '') {
          filled = true;
          return false;
      }
  });

  saveButton.prop('disabled', !filled);
}

$('#personalInfoForm').on('submit', function(event) {
  event.preventDefault();

  const candidateId = $('#candidate_id').val();
  const url = "{{ route('personal-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId); // replace method to avoid laravel interpretation it as a string literal
    
  const form = $(this);
  let formData = new FormData(this); // Form data, including the CSRF token
  formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

  let messageTimeout;
  $.ajax({
      url: url,
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
          clearTimeout(messageTimeout);
          if(response.status) {
              clearValidationErrors(form);
              displayStatus(response.message);
          }
      },
      error: function(response, xhr) {
          if(!response.error || xhr.status === 442) {
              clearValidationErrors(form);
              const errors = response.responseJSON?.errors;
              if(errors) {
                  form.find('input').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });
                 
              }
          }
      }
  });
});

$('#grade_tenth_form').on('submit', function(event) {
    event.preventDefault();

    const candidateId = $('#candidate_id').val();
    const url = "{{ route('tenth-grade-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId);

    const form = $(this);
    let formData = new FormData(this);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    let messageTimeout;
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            clearTimeout(messageTimeout);
            if(response.status) {
                clearValidationErrors(form);
                displayStatus(response.message);
            }
        },
        error: function(response, xhr) {
            clearTimeout(messageTimeout);
           if(!response.error || xhr.status === 422) {
                clearValidationErrors(form);
                const errors = response.responseJSON?.errors;
                if(errors) {
                    form.find('input, select').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });
                }
            }
        }
    });
});

$('#grade_twelfth_form').on('submit', function(event) {
    event.preventDefault();

    const candidateId = $('#candidate_id').val();
    const url = "{{ route('twelfth-grade-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId);

    const form = $(this);
    let formData = new FormData(this);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    let messageTimeout;
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            clearTimeout(messageTimeout);
            if(response.status) {
                clearValidationErrors(form);
                displayStatus(response.message);
            }
        },
        error: function(response, xhr) {
            clearTimeout(messageTimeout);
           if(!response.error || xhr.status === 422) {
                clearValidationErrors(form);
                const errors = response.responseJSON?.errors;
                if(errors) {
                    form.find('input, select').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });
                }
            }
        }
    });
});
$('#higher_education_form').on('submit', function(event) {
    event.preventDefault();

    const candidateId = $('#candidate_id').val();
    const url = "{{ route('higher-education-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId);

    const form = $(this);
    let formData = new FormData(this);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    let messageTimeout;
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            clearTimeout(messageTimeout);
            if(response.status) {
                clearValidationErrors(form);
                displayStatus(response.message);
            }
        },
        error: function(response, xhr) {
            clearTimeout(messageTimeout);
            if(!response.error || xhr.status === 422) {
                clearValidationErrors(form);
                const errors = response.responseJSON?.errors;
                if(errors) {
                    form.find('input').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });
                }
            }
        }
    });
});

// BEGINS::MASTERS & DOCTORATE
$('#masters_doctorate_form').on('submit', function(event) {
    event.preventDefault();

    const candidateId = $('#candidate_id').val();
    const url = "{{ route('masters-doctorate-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId);

    const form = $(this);
    let formData = new FormData(this);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    let messageTimeout;
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            clearTimeout(messageTimeout);
            if(response.status) {
                clearValidationErrors(form);
                displayStatus(response.status);
            }
        },
        error: function(response, xhr) {
            clearTimeout(messageTimeout);
            if(!response.error || xhr.status === 422) {
                clearValidationErrors(form);
                const errors = response.responseJSON?.errors;
                if(errors) {
                    form.find('input, select').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });
                }
            }
        }
    });
});
// ENDS::MASTERS & DOCTORATE

// BEGINS::EXPERIENCE INFORMATION
$('#experience_form').on('submit', function(event) {
    event.preventDefault();

    const candidateId = $('#candidate_id').val();
    const url = "{{ route('experience-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId);

    const form = $(this);
    let formData = new FormData(this);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    let messageTimeout;
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            clearTimeout(messageTimeout);
            if(response.status) {
                clearValidationErrors(form);
                displayStatus(response.message);
            }
        },
        error: function(response, xhr) {
            clearTimeout(messageTimeout);
           if(!response.error || xhr.status === 422) {
                clearValidationErrors(form);
                const errors = response.responseJSON?.errors;
                if(errors) {
                    form.find('input').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });
                }
            }
        }
    });
});
// ENDS::EXPERIENCE INFORMATION

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
    setTimeout(function () {
        $('.status').fadeOut(function () {
            $(this).text('');
            $(this).removeClass('d-flex');
            $(this).addClass('d-none');
        });
    }, 5000);
}


function clearValidationErrors(form) {
  form.find('input, textarea, select').removeClass('is-invalid border border-danger');
  form.find('.invalid-feedback').html('');
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
    {{-- <script>
        $(document).ready(function() {

            // BEGIN::SETS A TIMEOUT TO HIDE THE ALERT MESSAGES AFTER 5 SECONDS
            setTimeout(function() {
                $('#alert-message1, #alert-message2').fadeOut(); // Fade out both alert messages
            }, 5000);
            // END::SETS A TIMEOUT TO HIDE THE ALERT MESSAGES AFTER 5 SECONDS

            // BEGIN::SHOW FORM SUBMISSION STATUS
            function showMessage(formType, type, message) {
                const formTypes = [
                    'personal-info', '10th', '12th', 'higher-education',
                    'postgraduate', 'personal-medical-history', 'family-medical-history', 'experience-form'
                ];

                if (formTypes.includes(formType)) {
                    const messageSelector = `#${type}-message-${formType}`;
                    $(messageSelector).text(message).fadeIn();

                    setTimeout(() => {
                        $(messageSelector).fadeOut();
                    }, 5000);
                }
            }
            // END::SHOW FORM SUBMISSION STATUS

            // BEGIN::AJAX FOR FETCHING DEPENDENT DROPDOWN DATA
            // Begin::States Dropdown Data Fetching
            $('#country-dropdown').on('change', function() {
                const countryId = $(this).val();

                $.ajax({
                    url: "{{ route('states') }}", // Fetch states route
                    type: 'GET',
                    data: {
                        country_id: countryId,
                        _token: "{{ csrf_token() }}" // CSRF token
                    },
                    dataType: "json",
                    success: function(states) {
                        let options = '<option selected>Select State</option>';
                        $.each(states, function(key, state) {
                            options +=
                                `<option value="${state.state_id}">${state.state_name}</option>`;
                        });
                        $('#state-dropdown').html(options);
                    },
                    error: function(error) {
                        console.error(error);
                        // alert('Error fetching states');
                    }
                });
            });
            // End::States Dropdown Data Fetching

            // Begin::Districts Dropdown Data Fetching
            $('#state-dropdown').on('change', function() {
                const stateId = $(this).val();

                $.ajax({
                    url: "{{ route('districts') }}", // Fetch districts route
                    type: 'POST',
                    data: {
                        state_id: stateId,
                        _token: "{{ csrf_token() }}" // CSRF token
                    },
                    success: function(districts) {
                        let options = '<option selected>Select District</option>';
                        $.each(districts, function(key, district) {
                            options +=
                                `<option value="${district.district_id}">${district.district_name}</option>`;
                        });
                        $('#district-dropdown').html(options);
                    },
                    error: function(error) {
                        alert('Error fetching districts');
                    }
                });
            });
            // End::Districts Dropdown Data Fetching
            // END::AJAX FOR FETCHING DEPENDENT DROPDOWN DATA

            // BEGIN::HANDLE CANDIDATE INFORMATION FORM SUBMISSION
            $('#userForm').on('submit', function(e) {
                e.preventDefault();
                console.log('Form submission prevented');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('update-profile') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response.status);
                        console.log('Success');

                        // Clear previous error messages
                        handleFormErrors();

                        if (response.status === true) {
                            // Success logic
                            $('#successMessage').text('Profile updated successfully!').show();
                            setTimeout(function() {
                                $('#successMessage').fadeOut('slow');
                            }, 3000);
                        } else if (response.errors) {
                            // Handle the case where validation failed
                            handleFormErrors(response.errors);
                        }
                    },
                    error: function(xhr) {
                        console.log('Error');

                        console.error('An error occurred:', xhr.statusText);
                        console.error('Check:', xhr.responseText);

                        // Handle specific status codes
                        switch (xhr.status) {
                            case 404:
                                alert('Requested resource not found.');
                                break;
                            case 422:
                                console.error('Validation errors:', xhr.responseJSON.errors);
                                handleFormErrors(xhr.responseJSON.errors);
                                break;
                            case 500:
                                console.error('Current error', xhr.responseText);
                                alert('Server error, please try again later.');
                                break;
                            default:
                                alert('An unexpected error occurred. Please try again.');
                        }
                    }
                });
            });
            // END::HANDLE CANDIDATE INFORMATION FORM SUBMISSION

            // BEGIN::HANDLE FORM SUBMISSION ERRORS FOR USER PROFILE FORM
            function handleFormErrors(errors) {
                const fields = ['fname', 'lname', 'date_of_birth', 'email', 'gender', 'country', 'phone_no'];

                fields.forEach(function(field) {
                    const $field = $("#" + field);
                    const errorMessage = errors ? errors[field] || '' : '';

                    if (errorMessage) {
                        $field.addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html(errorMessage);
                    } else {
                        $field.removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                    }
                });
            }
            // END::HANDLE FORM SUBMISSION ERRORS FOR USER PROFILE FORM




            // BEGIN::HANDLE PERSONAL INFO FORM SUBMISSION

            const $inputs = $('#personal_info_form input');
            console.log($inputs);
            const $saveButton = $('#saveBtn');

            $saveButton.prop('disabled', true);

            function checkInputs() {
                let filled = false;

                $inputs.each(function() {
                    if ($(this).val().trim() !== '') {
                        filled = true;
                        return false;
                    }
                });

                $saveButton.prop('disabled', !filled);
            }

            $inputs.on('input', function() {
                checkInputs();
            });



            $('#personal_info_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('personal-info') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.personal_info = true;
                        clearErrors();
                        // Handle success response for personal-info
                        showMessage('personal-info', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for personal-info form
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            displayFormValidationErrors('personal-info', errors);
                        } else {
                            showMessage('personal-info', 'error',
                                'Something went wrong. Please try again.');
                        }
                    }
                });
            });


            // END::HANDLE PERSONAL INFO FORM SUBMISSION

            // BEGIN::HANDLE EDUCATIONAL INFORMATION

            // Handle Grade 10 form submission
            $('#grade_tenth_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('education-info.tenth-grade') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.grade_tenth = true;
                        clearErrors();
                        // Handle success response for Grade 10
                        showMessage('10th', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error('check', xhr.responseText);
                        // console.error(errors);
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            displayFormValidationErrors('10th', errors);
                        } else {
                            showMessage('10th', 'error',
                                'Something went wrong. Please try again.');
                        }
                        // Handle error for Grade 10 form

                    }
                });
            });

            // Handle Grade 12 form submission
            $('#grade_twelfth_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('education-info.twelfth-grade') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.grade_twelfth = true;
                        clearErrors();
                        // Handle success response for Grade 12
                        showMessage('12th', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for Grade 12 form
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            displayFormValidationErrors('12th', errors);
                        } else {
                            showMessage('12th', 'error',
                                'Something went wrong. Please try again.');
                        }
                    }
                });
            });

            // Handle Higher Education form submission
            $('#higher_education_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('education-info.higher-education') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.higher_education = true;
                        clearErrors();
                        // Handle success response for higher education
                        showMessage('higher-education', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for higher education form
                        // console.error(xhr.responseText);
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            console.error(errors);
                            displayFormValidationErrors('higher-education', errors);
                        } else {
                            showMessage('higher-education', 'error',
                                'Something went wrong. Please try again.');
                        }

                    }
                });
            });

            // Handle masters and doctorate form submission
            $('#masters_doctorate_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('education-info.postgraduate-info') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.masters = true;
                        clearErrors();
                        // Handle success response for post graduate
                        showMessage('postgraduate', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for post graduate form
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            displayFormValidationErrors('postgraduate-info', errors);
                        } else {
                            showMessage('postgraduate-info', 'error',
                                'Something went wrong. Please try again.');
                        }
                    }
                });
            });

            // END::HANDLE EDUCATIONAL INFORMATION

            // BEGIN::HANDLE MEDICAL HISTORY FORMS

            // Handle personal medical history form submission
            $('#personal_medical_form').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('medical-history.personal-medical-info') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.personalMedicalInfo = true;
                        clearErrors();
                        // Handle success response for personal medical history
                        showMessage('personal-medical-history', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for personal medical history form
                        console.error(xhr.responseText);
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            // console.error(errors);
                            // console.error('check', errors);
                            displayFormValidationErrors('personal-medical-history', errors);
                        } else {
                            showMessage('personal-medical-history', 'error',
                                'Something went wrong. Please try again.');
                        }
                    }
                });
            });

            // Handle family medical history form submission
            $('#family_medical_form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('medical-history.family-medical-info') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.familyMedicalInfo = true;
                        clearErrors();
                        // Handle success response for family medical history
                        showMessage('family-medical-history', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for family medical history form
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            displayFormValidationErrors('family-medical-history', errors);
                        } else {
                            showMessage('family-medical-history', 'error',
                                'Something went wrong. Please try again.');
                        }
                    }
                });
            });

            // END::HANDLE MEDICAL HISTORY FORMS

            // BEGIN::HANDLE EXPERIENCE FORM
            // Handle experience form form submission
            $('#experience-form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('work-experience.update') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // formsSubmitted.familyMedicalInfo = true;
                        clearErrors();
                        // Handle success response for experience form
                        showMessage('experience-form', 'success', response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle error for experience form
                        console.error(xhr.responseText);
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            displayFormValidationErrors('experience-form', errors);
                        } else {
                            showMessage('experience-form', 'error',
                                'Something went wrong. Please try again.');
                        }
                    }
                });
            });
            // END::HANDLE EXPERIENCE FORM

            // document.getElementById('kt_users_delete').addEventListener('click', function () {
            //     // Delete action (AJAX request to delete data from the server)
            //     const confirmDelete = confirm('Are you sure you want to delete this work experience?');
            //     if (confirmDelete) {
            //         const formData = new FormData(document.getElementById('experience-form'));

            //         fetch("/account/delete-work-experience", { // Route for deletion
            //             method: 'DELETE',
            //             headers: {
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            //                 'Content-Type': 'application/json'

            //             },
            //             body: formData
            //         })
            //         .then(response => response.json())
            //         .then(data => {
            //             if (data.success) {
            //                 alert('Work experience deleted successfully');
            //                 document.getElementById('experience-form').reset(); // Reset form
            //             } else {
            //                 alert('An error occurred while deleting.');
            //             }
            //         })
            //         .catch(error => console.error('Error:', error));
            //     }
            // });


            // BEGIN - HANDLE FORM VALIDATIONS ERRORS

            function displayFormValidationErrors(formType, errors) {
                clearErrors();

                $.each(errors, function(inputName, errorMessage) {
                    let inputError = $(`#error-${formType}-${inputName}`);
                    if (inputError.length) {
                        inputError.text(errorMessage[0]).fadeIn();
                    }
                });
            }

            function clearErrors() {
                $('.input-error').fadeOut().text('');
            }

            // END - HANDLE FORM VALIDATIONS ERRORS


        })
    </script> --}}
    {{-- end: ajax & jquery --}}
    {{-- HANDLES AADHAR CARD FORMAT --}}
    {{-- <script>
        // Add the event listener when the DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            const aadharInput = document.getElementById('aadhar_card_no');

            aadharInput.addEventListener('input', function() {
                let value = aadharInput.value.replace(/\D/g, ''); // Remove all non-digit characters

                // If the length is greater than 12, truncate it
                if (value.length > 12) {
                    value = value.substring(0, 12);
                }

                // Format: "1234 5678 9012"
                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && (i % 4 === 0)) {
                        formattedValue += ' '; // Add space after every 4 digits
                    }
                    formattedValue += value[i];
                }

                aadharInput.value = formattedValue; // Set the formatted value back to the input field
            });
        });
    </script> --}}
    {{-- HANDLES AADHAR CARD FORMAT --}}

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    {{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
    <!--end::Page Vendors Javascript-->

    <script>
        document.getElementById('candidateStep').addEventListener('click', function() {
            document.getElementById('profileForm').style.display = 'block';
            document.getElementById('educationForm').style.display = 'none';
            document.getElementById('workExperienceForm').style.display = 'none';
        });

        document.getElementById('educationStep').addEventListener('click', function() {
            document.getElementById('educationForm').style.display = 'block';
            document.getElementById('profileForm').style.display = 'none';
            document.getElementById('workExperienceForm').style.display = 'none';
        });

        document.getElementById('experienceStep').addEventListener('click', function() {
            document.getElementById('workExperienceForm').style.display = 'block';
            document.getElementById('profileForm').style.display = 'none';
            document.getElementById('educationForm').style.display = 'none';
        });
    </script>

    <!--dropdown search box-->
    {{-- <script>
        $(document).ready(function () {
        //change selectboxes to selectize mode to be searchable
        $("select").select2();
        });
    </script> --}}
@endpush
@endsection
