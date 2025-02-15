@extends('frontend.layouts.app')
@section('title', 'Post a Job')

@push('custom_styles')
  <link rel="stylesheet" href="{{ asset('custom-assets/css/post-job.css') }}">
@endpush

@section('content')
<div id="kt_content_container">

  <!--begin::Contact-->
  <div class="card">
      <!--begin::Body-->
      <div class="card-body p-lg-17">
        {{-- Form submission status --}}
        <div class="status align-items-center fw-bold" role="alert">
            @if (session('status'))
                <div class="d-flex justify-content-center fade">{{ session('status') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
        </div>
        {{-- Form submission status --}}
        <!--begin::Row-->
        <div class="row mb-3">
            <!--begin::Col-->
            <div class="col-md-12 pe-lg-10">
                <!--begin::Form-->
                <form id="editJobPostForm" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" novalidate>
                    <h1 class="fw-bolder text-dark mb-9">Edit Posted Job</h1>
                    <!--begin::Input group-->
                    <input type="hidden" class="form-control" id="company_id" name="company_id" value="{{ $user->id }}" required>
                    <div class="row mb-5">
                    <input type="hidden" class="form-control" id="job_id" name="job_id" value="{{ $postedJob->id }}" required>
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Job Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="job_title" name="job_title" value="{{ $postedJob->job_title ?? '' }}">
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
                            @php
                            $selectedLocationType = old('location_type', $postedJob->location_type ?? '');
                        @endphp

                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="location_type">
                            <option value="" {{ $selectedLocationType === '' ? 'selected' : '' }}>Select user...</option>
                            <option value="remote" {{ $selectedLocationType === 'Remote' ? 'selected' : '' }}>Remote</option>
                            <option value="on-site" {{ $selectedLocationType === 'On-Site' ? 'selected' : '' }}>On-Site</option>
                            <option value="hybrid" {{ $selectedLocationType === 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
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
                            <input type="text" class="form-control form-control-solid" placeholder="" name="location" value="{{ old('location', isset($postedJob->location)) ? $postedJob->location : '' }}" required>
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
                            @php
                            $selectedEmploymentType = old('employment_type', $postedJob->employment_type ?? '' );
                          @endphp
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="employment_type" required>
                                <option value="" {{ $selectedEmploymentType === '' ? 'selected' : '' }}>Select user...</option>
                                <option value="full-time" {{ $selectedEmploymentType === 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                <option value="part-time" {{ $selectedEmploymentType === 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                <option value="contract" {{ $selectedEmploymentType === 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="internship" {{ $selectedEmploymentType === 'Internship' ? 'selected' : '' }}>Internship</option>
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
                            <input type="text" class="form-control form-control-solid" placeholder="" id="salary" name="salary" value="{{ old('salary', $postedJob->salary) ?? '' }}" required>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->

                        {{-- <label for="hr_id">HR ID</label> --}}
                        {{-- <input type="hidden" class="form-control" id="hr_id" name="hr_id" value="" required> --}}
                    
                        {{-- <label for="company_id">Company ID</label> --}}

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Pin Code</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="pincode" name="pincode" value="{{ old('pincode', $postedJob->pincode) ?? '' }}">
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
                            <textarea class="form-control form-control-solid" rows="3" id="required_skills" name="required_skills" placeholder="">{{ old('required_skills', $postedJob->required_skills ?? '') }}</textarea>
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
                            <textarea class="form-control form-control-solid" rows="3"  id="qualifications" placeholder="" name="qualifications" required>{{ old('qualifications', $postedJob->qualifications ?? '') }}</textarea>
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
                            <textarea id="responsibilities" class="form-control form-control-solid" rows="6" name="responsibilities" placeholder="">{{ old('responsibilities', $postedJob->responsibilities ?? '' ) }}</textarea>
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
                            <textarea id="description" class="form-control form-control-solid" rows="6" name="description" placeholder="">{{ old('description', $postedJob->description) ?? ''}}</textarea>
                            <!--end::Input-->
                            <div class="invalid-feedback"></div>

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    
                    <!--begin::Submit-->
                    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button" fdprocessedid="zwy35">
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

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function() {
        $('#editJobPostForm').on('submit', function(event) {
            event.preventDefault();
    
            const company_id = $('#company_id').val();
            const formData = new FormData(this);
            const form = $(this);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    
            const editJobPostURL = "{{ route('auth.account.company.edit-posted-jobs.update', ['company_id' => ':company_id', 'job_id' => ':job_id']) }}".replace(':company_id', company_id).replace(':job_id', job_id);
            $.ajax({
                url: editJobPostURL,
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
                    if(!response.status || xhr.status === 422) {
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
    });

    function displayStatus(response) {
        if (response) {
            $('.status')
                .removeClass('alert-danger d-none')
                .addClass('alert alert-success d-flex')
                .text(response)
                .fadeIn();
        } else {
            $('.status')
                .removeClass('alert alert-success d-flex')
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