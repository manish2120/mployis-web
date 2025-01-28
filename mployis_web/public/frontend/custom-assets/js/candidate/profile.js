$(document).ready(function() {
// CANDIDATE INFORMATION
$('#userForm').on('submit', function(event) {
  event.preventDefault();

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
              clearValidationErrors();
              displayStatus(response.status);
          }
      },
      error: function(response, xhr) {
          if(!response.error) {
              clearValidationErrors();
              const errors = response.responseJSON?.errors;
              if(errors) {
                  $('input, select, textarea').each(function() {
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
  const url = "{{ route('personal-info.candidate', ['candidate_id' => ':candidate_id']) }}".replace(':candidate_id', candidateId);


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
              clearValidationErrors();
              displayStatus(response.status);
          }
      },
      error: function(response, xhr) {
          if(!response.status) {
              displayStatus(response.status);
          } else if(xhr.status === 422) {
              clearValidationErrors();
              const errors = xhr.responseJSON?.errors;
              if(errors) {
                  $('input').each(function() {
                      const fieldName = $(this).attr('name');
                      if(errors[fieldName]) {
                          $(this).addClass('border border-danger is-invalid');
                          $(this).next('.invalid-feedback').html(errors[fieldName][0]);
                      }
                  });

                  if(errors['passport']) {
                      $('.radio-btn-container').find('invalid-feedback').html(errors['passport'][0]).show();
                  }
              }
          }
      }
  });
});

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

function clearValidationErrors() {
  $('input, textarea, select').removeClass('is-invalid border border-danger');
  $('.invalid-feedback').html('');
}

});
