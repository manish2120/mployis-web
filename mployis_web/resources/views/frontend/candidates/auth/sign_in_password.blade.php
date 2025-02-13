
@extends('frontend.layouts.app')
@section('title', 'Sign In')
@section('content')
<!--begin::Main-->
<div class="d-flex flex-column flex-root" style="margin-top: 100px">
  <!--begin::Authentication - Sign-in -->
  <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
      <!--begin::Logo-->
      <a href="../../demo1/dist/index.html" class="mb-12">
        <img alt="Logo" src="{{ asset('frontend/assets/media/logos/Mployis.png') }}" class="h-85px" />
      </a>
      <!--end::Logo-->
      <!--begin::Wrapper-->
      @if (session('status'))
      <div class="alert-success position-absolute fw-bold fs-5 p-1 left-2/4 translate-x-[-50%] top-25 rounded-lg px-4 py-3">
        {{ session('status') }}
      </div>
      @endif
      <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="passwordForm" data-kt-redirect-url="../../demo1/dist/index.html">
          @csrf
          <!--begin::Input group-->
          <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
              <!-- Hidden Email Input -->
              <input type="hidden" value="{{ $user->id }}" />

              <input type="hidden" name="email" value="{{ $user->email }}" />
          
              <!--begin::Label-->
              <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
              <!--end::Label-->
              <!--begin::Link-->
              {{-- <a href="../../demo1/dist/authentication/layouts/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a> --}}
              <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" value="" autocomplete="off" />
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
            {{--<!--begin::Separator-->
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
            <img alt="Logo" src="{{ asset('frontend/assets/media/svg/brand-logos/apple-black.svg') }}" class="h-20px me-3" />Continue with Apple</a>
            <!--end::Google link--> --}}
            </div>
            <!--begin::Link-->
            <div>
            <a href="{{ route('account.candidate-sign-in') }}" class="link-primary fs-6 fw-bolder">← Back</a>
            </div>
            <!--end::Link-->
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
        <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
        <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
        <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
      </div>
      <!--end::Links-->
    </div>
    <!--end::Footer-->
  </div>
  <!--end::Authentication - Sign-in-->
</div>

@push('custom_scripts')
<script>
  $(document).ready(function() {
    $('#passwordForm').on('submit', function(event) {
      event.preventDefault();

      $.ajax({
        url: "{{ route('account.candidate.submit', ['id' => $user->id]) }}",
        type: 'POST',
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response) {
          if(response.status) {
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
                $(this).next('.invalid-feedback').html(errors[fieldName][0]);
              }
            });
          }
        }
      });
    });

  });
</script>
@endpush
@endsection
<!--end::Main-->
