@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('content')

<div class="status"></div>

<div class="d-flex flex-column flex-root">
<!--begin::How It Works Section-->
<!--start-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Contact-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::Row-->
                <div class="row mb-3">
                    <!--begin::Col-->
                    <div class="col-md-6 pe-lg-10">
                        <!--begin::Form-->
                        <form class="form mb-15" id="contactForm" enctype="multipart/form-data" novalidate>
                            @csrf
                            <h1 class="fw-bolder text-dark mb-9">Send Us Email</h1>
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2">Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" id="nameInput" class="form-control form-control-solid" placeholder=""
                                        name="name" maxlength="256" />
                                    <!--end::Input-->
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-bold mb-2">Email</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                    id="emailInput"  
                                    maxlength="256" placeholder=""
                                    name="email"/>
                                        <!--end::Input-->
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2">Subject</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="subject" maxlength="256" />
                                    <!--end::Input-->
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <label class="fs-6 fw-bold mb-2">Message</label>
                                    <textarea class="form-control form-control-solid" rows="6" maxlength="1001" name="message" placeholder=""></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Submit-->
                                <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Send Feedback</span>
                                    <span class="indicator-progress">Please wait...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator-->
                                </button>
                                <!--end::Submit-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 ps-lg-10">
                            <!--begin::Map-->
                            <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2"
                                style="height: 486px; overflow:hidden;">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.096100786928!2d73.12267001443203!3d19.234643086997075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be795cfde985239%3A0x1cfac43ad3c65bd6!2sSarvi+Solutions!5e0!3m2!1sen!2sin!4v1560403071572!5m2!1sen!2sin"
                                    style="width: 100%; height: 100%; border:0;" frameborder="0"
                                    allowfullscreen="" aria-hidden="false" tabindex="0">
                                </iframe>
                            </div>
                            <!--end::Map-->
                        </div>

                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-5 mb-5 mb-lg-15 justify-center">
                        <!--begin::Col-->
                        {{-- <div class="col-sm-6 pe-lg-10">
                                            <!--begin::Phone-->
                                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                                <!--begin::Icon-->
                                                <!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
                                                <!--end::Icon-->
                                                <!--begin::Subtitle-->
                                                <h1 class="text-dark fw-bolder my-5">Let’s Speak</h1>
                                                <!--end::Subtitle-->
                                                <!--begin::Number-->
                                                <div class="text-gray-700 fw-bold fs-2">1 (833) 597-7538</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Phone-->
                                        </div> --}}
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-6 ps-lg-10">
                            <!--begin::Address-->
                            <div
                                class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-3tx svg-icon-primary inline-flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                            fill="currentColor" />
                                        <path
                                            d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <h1 class="text-dark fw-bolder my-5">Our Head Office</h1>
                                <!--end::Subtitle-->
                                <!--begin::Description-->
                                <div class="text-gray-700 fs-3 fw-bold">Seventh Floor, B - Wing, Kalyan Nagari
                                    Rachana Co. Op. Hsg. Soc Sanglewadi, Kalyan West, Kalyan,</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Address-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Contact-->
    </div>
    <!--end::Container-->
</div>
<!--end-->
<!--end::Testimonials Section-->

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

@push('custom_scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        const nameInput = $('#nameInput');
        const emailInput = $('#emailInput');

        // Remove numbers from the name input
        nameInput.on('input', function() {
            this.value = this.value.replace(/[0-9]/g, ''); // Removes digits
        });

        // Trim spaces from the email input
        emailInput.on('input', function() {
            this.value = this.value.trim(); // Removes leading/trailing spaces
        });

        // Handle form submission via AJAX
        $('#contactForm').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let timeOut;

            // Sending data using AJAX
            $.ajax({
                url: "{{ route('contact.submit') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false, // Prevent jQuery from converting formData
                contentType: false, // Prevent jQuery from setting contentType automatically
                success: function(response) {
                    clearTimeout(timeOut);

                    if (response.status) {
                        clearErrors();
                        displayStatus(response); // Show success message
                    }
                },
                error: function(xhr) {
                    clearTimeout(timeOut);

                    if (xhr.status === 422) {
                        clearErrors();
                        const errors = xhr.responseJSON?.errors;
                        if (errors) {
                            $('input, textarea').each(function() {
                                const fieldName = $(this).attr('name');
                                if (errors[fieldName]) {
                                    $(this).addClass('is-invalid');
                                    $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                                }
                            });
                        }
                    } else {
                        alert('Something went wrong. Please try again later.');
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
            if (response.status) {
                $('.status').removeClass('alert-danger').addClass('alert-success').text(response.message);
            } else {
                $('.status').removeClass('alert-success').addClass('alert-danger').text(response.message);
            }

            // Hide the message after 5 seconds
            setTimeout(function() {
                $('.status').fadeOut();
            }, 5000);
        }
    });
</script>



@endpush
@endsection