@extends('frontend.layouts.app')
@section('title', 'Post a Job')

@push('custom_styles')
  <link rel="stylesheet" href="{{ asset('custom-assets/css/post-job.css') }}">
@endpush

@section('content')
  @if(Session::has('success'))
   <p class="alert alert-success">{{Session('success')}}</p>
  @endif

<div id="kt_content_container" class="container-xxl">
  <!--begin::Contact-->
  <div class="card">
    <!--begin::Body-->
    <div class="card-body p-lg-17">
        <!--begin::Row-->
        <div class="row mb-3">
            <!--begin::Col-->
            <div class="col-md-12 pe-lg-10">
                
                <div class="status align-items-center fw-bold" role="alert">
                    @if (session('status'))
                        <div class="d-flex justify-content-center fade">{{ session('status') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endif
                </div>

                <!--begin::Form-->
                <form id="jobPostForm" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" novalidate>
                    <h1 class="fw-bolder text-dark mb-9">Post a Job</h1>
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Job Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="job_title" name="job_title" value="{{ old('job_title') ?? '' }}">
                            <div class="invalid-feedback"></div>
                            <!--end::Input-->

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Location Type</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="location_type">
                                <option value="remote" {{ old('location_type') == 'remote' ? 'selected' : '' }}>Select user...</option>
                                <option value="remote" {{ old('location_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                                <option value="on-site" {{ old('location_type') == 'on-site' ? 'selected' : '' }}>On-Site</option>
                                <option value="hybrid" {{ old('location_type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                
                            </select>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Location</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="location" value="{{ old('location') ?? '' }}" required>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Employee Type</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="employment_type" required>
                                <option value="">Select user...</option>
                                <option value="full-time" {{ old('employment') == 'full-time' ? 'selected' : '' }}>Full-Time</option>
                                <option value="part-time" {{ old('employment') == 'part-time' ? 'selected' : '' }}>Part-Time</option>
                                <option value="contract" {{ old('employment') == 'contract' ? 'selected' : '' }}>Contract</option>
                                <option value="internship" {{ old('employment') == 'internship' ? 'selected' : '' }}>Internship</option>
                                
                            </select>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Salary</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="salary" name="salary" value="{{ old('salary') ?? '' }}" required>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->

                        {{-- <label for="hr_id">HR ID</label> --}}
                        {{-- <input type="hidden" class="form-control" id="hr_id" name="hr_id" value="" required> --}}
                    
                        {{-- <label for="company_id">Company ID</label> --}}
                        <input type="hidden" class="form-control" id="company_id" name="company_id" value="{{ $user->id }}" required>

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Pin Code</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="pincode" name="pincode" value="{{ old('pincode') ?? ''}}">
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                        <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Required Skills</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" rows="3" id="required_skills" name="required_skills" placeholder="">{{ old('required_skills') ?? '' }}</textarea>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Job Qualifications</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <textarea class="form-control form-control-solid" rows="3"  id="qualifications" placeholder="" name="qualifications" required>{{ old('qualifications') ?? ''}}</textarea>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Job Responsibilities</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea id="responsibilities" class="form-control form-control-solid" rows="6" name="responsibilities" placeholder="">{{ old('responsibilities') ?? ''}}</textarea>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Job Description</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <textarea id="description" class="form-control form-control-solid" rows="6" name="description" placeholder="">{{ old('description') ?? ''}}</textarea>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    
                    <!--begin::Submit-->
                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                        <!--begin::Indicator-->
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator-->
                    </button>
                    <!--end::Submit-->
                <div></div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
        <!--<div class="col-md-6 ps-lg-10">
                
            </div>-->
            <!--end::Col-->
        </div>
        <!--end::Row-->
        
        
    </div>
    <!--end::Body-->
  </div>
  <!--end::Contact-->
</div>

 <!-- Including Footer -->

 
</body>
<!--end::Body-->
@push('custom_scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function() {
        // JOB POST FORM
        $('#jobPostForm').on('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        const form = $(this);
        const company_id = $('#company_id').val();

        const postJobUrl = "{{ route('auth.account.company.post-job-form.submit', ['company_id' => ':company_id']) }}".replace(':company_id', company_id);
        // const postJobUrl = `/post-job/${company_id}/submit`;

        $.ajax({
            url: postJobUrl,
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

@endpush

@endsection

 {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}


{{-- <script src="{{ asset('frontend/assets/custom/ajax/form-handle.js') }}"></script> --}}
