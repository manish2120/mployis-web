@extends('frontend.layouts.app')
@section('title', 'Sign In')
@section('content')
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
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
            @if (Session::has('status'))
                <div class="alert alert-success text-center fw-bold fs-5">
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" id="companySignInForm" novalidate="novalidate">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Sign In to Company</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">New Here?
                            <a href="{{ route('account.company.sign-up') }}" class="link-primary fw-bolder">Create an
                                Account</a>
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <input type="hidden" name="role" value="company">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                            value="{{ old('email', session('email')) }}" autocomplete="off" />
                        <!--end::Input-->
                        <div class="invalid-feedback"></div>

                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->
                        {{-- <!--begin::Separator-->
                        <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                        <!--end::Separator-->
                        <!--begin::Google link-->
                        <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                        <img alt="Logo" src="{{ asset('frontend/assets/media/svg/brand-logos/google-icon.svg') }}" class="h-20px me-3" />Continue with Google</a>
                        <!--end::Google link-->
                        <!--begin::Google link-->
                        <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                        <img alt="Logo" src="{{ asset('frontend/assets/media/svg/brand-logos/facebook-4.svg') }}" class="h-20px me-3" />Continue with Facebook</a>
                        <!--end::Google link-->
                        <!--begin::Google link-->
                        <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
                        <img alt="Logo" src="{{ asset('frontend/assets/media/svg/brand-logos/apple-black.svg') }}" class="h-20px me-3" />Continue with Apple</a> --}}
                        <!--end::Google link-->
                    </div>

                    <div class="text-center">
                        <span class="text-gray-400 fw-bold">New to MPLOYIS? Register (<a
                                href="{{ route('account.show-candidate-sign-up') }}">Student</a> / <a
                                href="{{ route('account.company.company-sign-up') }}">Company</a>)</span>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="{{ route('home') }}" class="text-muted text-hover-primary px-2">Home</a>
                <a href="{{ route('about') }}" class="text-muted text-hover-primary px-2">About</a>
                <a href="{{ route('contact') }}" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Main-->
@endsection

@push('custom_scripts')
<script>
    $(document).ready(function() {
        $('#companySignInForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('account.company.sign-in-email') }}",
                type: 'POST',
                headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
						window.location.href = response.redirectURL;
					} else {
						window.location.href = response.redirectURL;
					}
                },
                error: function(xhr, response) {
					if(xhr.status === 422) {
						const errors = xhr.responseJSON?.errors;
						$('input').each(function() {
							const fieldName = $(this).attr('name');
							if(errors[fieldName]) {
								$(this).addClass('is-invalid');
								$(this).next('.invalid-feedback').text(errors[fieldName][0]);
							}
						});
					}
				}
            });
        });
    })
</script>
@endpush