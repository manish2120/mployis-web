@extends('frontend.layouts.app')
@section('title', 'Sign Up')
@section('content')
    <!--begin::Main-->
<div class="status"></div>

    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/media/illustrations/sketchy-1/14.png">

            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="../../demo1/dist/index.html" class="mb-12">
                    <img alt="Logo" src="{{ asset('frontend/assets/media/logos/Mployis.png') }}" class="h-85px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                    <div class="alert fw-bold fs-5">
                    </div>
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="candidateSignUpForm">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Create an Account</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                <a href="" class="link-primary fw-bolder">Sign in here</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Action-->
                        {{-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                        <img alt="Logo" src="{{url('frontend/assets/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3" />Sign in with Google</button> --}}
                        <!--end::Action-->

                        <!--begin::Separator-->
                        <div class="d-flex align-items-center mb-10">
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        </div>
                        <!--end::Separator-->

                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">

                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    placeholder="" name="fname" id="fname" value="" autocomplete="off" />
                                <div class="invalid-feedback"></div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    placeholder="" name="lname" id="lname" value="" autocomplete="off" />
                                <div class="invalid-feedback"></div>
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
                                name="email" id="email" value="" autocomplete="off" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-10 fv-row" data-kt-password-meter="true">

                            <!--begin::Wrapper-->
                            <div class="mb-1">

                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                <!--end::Label-->

                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        placeholder="" name="password" id="password" autocomplete="off" />
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!--end::Input wrapper-->

                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3"
                                    data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->

                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Hint-->
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
                                symbols.</div>
                            <!--end::Hint-->
                            
                        </div>
                        <!--end::Input group=-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-5">
                            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="" name="password_confirmation" id="password" value="" autocomplete="off" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" id="toc"
                                    value="1" />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                                <div>
                                </div>
                            </label>
                            <div class="invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                        
                        <div class="text-center mt-5">
                            <span class="text-gray-400 fw-bold">Already Register? Login (
                                <a href="">Student</a> / 
                                <a href="">Company</a>
                                )
                            </span>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

            <!--begin:Links-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="" class="text-muted text-hover-primary px-2">Home</a>
                    <a href="" class="text-muted text-hover-primary px-2">About</a>
                    <a href="" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
            </div>
            <!--end::Links-->
            
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Main-->
@endsection

<!--begin::Javascript-->
{{-- <script>var hostUrl = "assets/";</script> --}}
<!--begin::Global Javascript Bundle(used by all pages)-->

{{-- imp commented scripts --}}
{{-- <script src="{{ asset('frontend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.bundle.js') }}"></script> --}}
{{-- imp commented scripts --}}

<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
{{-- <script src="{{ asset('frontend/assets/js/custom/authentication/sign-up/general.js') }}"></script> --}}
<!--end::Page Custom Javascript-->
<!--end::Javascript-->

@push('custom_scripts')

{{-- Begins::jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- Ends::jQuery --}}

{{-- Begins::jQuery with AJAX --}}
<script>
    
    $(document).ready(function() {
        $('#candidateSignUpForm').on('submit', function(event) {
            event.preventDefault();

            let messageTimeout;
            $.ajax({
                url: "{{ route('account.candidate-sign-up') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
                },
                dataType: 'json',
                success: function(response) {
                    clearTimeout(messageTimeout);
                    if(response.status) {
                        clearErrors();
                        displayStatus(response.status);
                    }
                },
                error: function(xhr, response) {
                    if(response.status === false) {
                        clearErrors();
                        displayStatus(response.status);
                    } else if(xhr.status === 422) {
                        const errors = xhr.responseJSON?.errors;
                        if(errors) {
                            $('input, textarea').each(function() {
                                const fieldName = $(this).attr('name');
                                if(errors[fieldName]) {
                                    $(this).addClass('is-invalid');
                                    $(this).attr('name').next('.invalid-feedback').html(errors[fieldName][0]);
                                }
                            });
                        }
                    } else {
                        displayStatus();
                    }
                }
            });
        });

        // Function to clear previous error messages
        function clearErrors() {
            $('input, textarea').removeClass('is-invalid');
            $('.invalid-feedback').html('');
        }

        // Function to display status message
        function displayStatus(response) {
            if(response) {
                $('.status').removeClass('alert-danger').addClass('alert-success').text(response.message);
            } else {
                $('.status').removeClass('alert-success').addClass('alert-danger').text(response.message);
            }

            messageTimeout = setTimeout(function() {
                                $('.status').fadeOut();
                            }, 5000);
        }

    });

</script>
{{-- Ends::jQuery with AJAX --}}
@endpush

<!--end::Body-->

</html>