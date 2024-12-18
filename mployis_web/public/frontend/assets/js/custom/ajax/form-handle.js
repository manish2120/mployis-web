// candidate application
$(document).ready(function() {
// Handle Accept button click
$('#acceptButton').on('click', function(e) {
  e.preventDefault();
  submitApplication('Approved');
});

// Handle Reject button click
$('#rejectButton').on('click', function(e) {
  e.preventDefault();
  submitApplication('Rejected');
});

// Handle form submission
$('#candidateApplication').on('submit', function(e) {
  e.preventDefault();
  var status = $('button[type="submit"]:focus').attr('id') === 'acceptButton' ? 'Approved' :
      'Rejected';
  submitApplication(status);
});

// Submit the application with the selected status
function submitApplication(status) {
  // var message = $('textarea[name="message"]').val();
  var job_id = $('input[name="job_id"]').val();

  $.ajax({
      url: `/application-approval/${job_id}`,
      type: 'PUT',
      dataType: 'json',
      data: {
          _token: '{{ csrf_token() }}',
          // message: message,
          status: status,
          job_id: job_id
      },
      success: function(response) {
          if (response.success) {
              // Display the success message
              $('#alert-message').removeClass('alert-error').addClass(response
                  .alert_class).show();
              $('#alert-text').text(response.accepted_message);

              // Change button text based on the status
              $('#acceptButton').text(response.status === 'Approved' ? 'Approved' :
                  'Accept');
              $('#rejectButton').text(response.status === 'Rejected' ? 'Rejected' :
                  'Reject');
          } else {
              // Display the error message
              $('#alert-message').removeClass('alert-success').addClass(response
                  .alert_class).show();
              $('#alert-text').text(response.accepted_message);
          }
      },
      error: function(xhr, status, error) {
          console.error(xhr.responseText, 'Error');
          console.error('AJAX request failed:', error);
          $('#alert-message').removeClass('alert-success').addClass('alert-error').show();
          $('#alert-text').text('An error occurred while submitting the application.');
      }
  });
}

$('#post-comment').on('click', function(e) {
  e.preventDefault();

  var message = $('textarea[name="message"]').val();
  var job_id = $('input[name="job_id"]').val();

  $.ajax({
      url: `/application-approval/${job_id}/comment`,
      type: 'PUT',
      dataType: 'json',
      data: {
          _token: '{{ csrf_token() }}',
          message: message
      },
      success: function(response) {
          if (response.status) {
              $('#alert-message').removeClass('alert-error').addClass(
                  'alert-success').show();
              $('#alert-text').text(response.message);
          }
      },
      error: function(response, xhr) {
          console.log('Error :', xhr.responseText);
          if (response.status) {
              $('#alert-message').removeClass('alert-success').addClass(
                  'alert-error').show();
              $('#alert-text').text(response.message);
          } else {
              $('#alert-message').removeClass('alert-success').addClass(
                  'alert-error').show();
              $('#alert-text').text(
                  'Something went wrong, Please try again later!');
          }
      }
  })
});

// company profile
    // Set the CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle company profile form submission
    $('#companyProfile').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('company-profile.update') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                clearErrors();
                showMessage('profile', 'success', response.message);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    displayFormValidationErrors('profile', errors);
                } else {
                    showMessage('profile', 'error',
                        'Something went wrong. Please try again.');
                }
            }
        });
    });

    // Show form status message
    function showMessage(formType, type, message) {
        const formTypes = ['profile'];

        if (formTypes.includes(formType)) {
            const messageSelector = `#${type}-message-${formType}`;
            $(messageSelector).text(message).fadeIn();
            setTimeout(() => {
                $(messageSelector).fadeOut();
            }, 5000);
        }
    }

    // Handle form validation errors
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

    // Fetching dependent dropdown data (states)
    $('#country-dropdown').on('change', function() {
        var countryId = $(this).val();

        $.ajax({
            url: "{{ route('states.company') }}",
            type: 'GET',
            data: {
                country_id: countryId,
            },
            dataType: "json",
            success: function(states) {
                let options = '<option selected>Select State</option>';
                $.each(states, function(key, state) {
                    options += '<option value="' + state.state_id + '">' + state
                        .state_name + '</option>';
                });
                $('#state-dropdown').html(options);
            },
            error: function(xhr) {

                console.error(xhr.responseText);
            }
        });
    });

// company registration
  $("#registrationForm").submit(function(e) {
      e.preventDefault();

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: "{{ route('create-account.company') }}",
          type: 'post',
          data: $(this).serializeArray(),
          dataType: 'json',
          success: function(response) {
              handleFormErrors(response.errors);

              if (response.status === true) {
                  // dd('working');
                  window.location.href = "{{ route('sign-in.company') }}";
              }
          },
          error: function(xhr) {
              console.error(xhr.responseText);
              console.error('An error occurred: ', xhr.statusText);
          }
      });
  });

  function handleFormErrors(errors) {
      var fields = ['name', 'phone_no', 'email', 'password', 'cpassword', 'toc'];

      fields.forEach(function(field) {
          var $field = $("#" + field);
          var errorMessage = errors[field] || '';

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

function handleFormErrors(errors) {
  var fields = ['name', 'phone_no', 'email', 'password', 'cpassword', 'toc'];

  fields.forEach(function(field) {
      var $field = $("#" + field);
      var errorMessage = errors[field] || '';

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
// });

// edit job post 
    $('#editJobPostForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const jobId = '{{ $postedJob->id }}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('/update-posted-job') }}/" + jobId,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle success
                showMessage('jobPost', 'success', response.message);
            },
            error: function(xhr) {
                // Handle error
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    displayFormValidationErrors(errors);
                } else {
                    showMessage('jobPost', 'error',
                        'Something went wrong. Please try again.');
                }
            }
        });
    });

function showMessage(type, message) {
    const messageSelector = `#${type}-message`;
    $(messageSelector).text(message).fadeIn();
    setTimeout(() => {
        $(messageSelector).fadeOut();
    }, 5000);
}

function displayFormValidationErrors(errors) {
    clearErrors();
    $.each(errors, function(inputName, errorMessage) {
        let inputError = $(`#error-${inputName}`);
        if (inputError.length) {
            inputError.text(errorMessage[0]).fadeIn();
        }
    });
}

function clearErrors() {
    $('.input-error').fadeOut().text('');
}

// post jobs
    $('#jobPostForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('post-new-job.company') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                clearErrors();
                showMessage('jobPost', 'success', response.message);
            },
            error: function(xhr) {
                if(xhr.status === 422) {
                    console.error(xhr.responseText);
                    const errors = xhr.responseJSON.errors;
                    displayFormValidationErrors(errors);
                } else {
                    showMessage('jobPost', 'error', 'Something went wrong. Please try again.');
                }
            }
        });
    });

function showMessage(type, message) {
    const messageSelector = `#${type}-message`;
    $(messageSelector).text(message).fadeIn();
    setTimeout(() => {
        $(messageSelector).fadeOut();
    }, 5000);
}

function displayFormValidationErrors(errors) {
    clearErrors();
    $.each(errors, function(inputName, errorMessage) {
        let inputError = $(`#error-${inputName}`);
        if (inputError.length) {
            inputError.text(errorMessage[0]).fadeIn();
        }
    });
}

function clearErrors() {
    $('.input-error').fadeOut().text('');
}

// sign up
// This appends the csrf into the header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $("#registrationForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('create-account') }}",
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                handleFormErrors(response.errors);

                if (response.status === true) {
                    window.location.href = "{{ route('sign-in') }}";
                }
            },
            error: function(xhr) {
                console.error('An error occurred: ', xhr.statusText);
                console.error('checkError', xhr.responseText);
            }
        });
    });

    function handleFormErrors(errors) {
        var fields = ['fname', 'lname', 'email', 'password', 'cpassword', 'toc'];

        fields.forEach(function(field) {
            var $field = $("#" + field);
            var errorMessage = errors[field] || '';

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

// user profile
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
              url: "{{ route('states') }}",  // Fetch states route
              type: 'GET',
              data: { 
                  country_id: countryId,
                  _token: "{{ csrf_token() }}"  // CSRF token
              },
              dataType: "json",
              success: function(states) {
                  let options = '<option selected>Select State</option>';
                  $.each(states, function(key, state) {
                      options += `<option value="${state.state_id}">${state.state_name}</option>`;
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
              url: "{{ route('districts') }}",  // Fetch districts route
              type: 'POST',
              data: { 
                  state_id: stateId,
                  _token: "{{ csrf_token() }}"  // CSRF token
              },
              success: function(districts) {
                  let options = '<option selected>Select District</option>';
                  $.each(districts, function(key, district) {
                      options += `<option value="${district.district_id}">${district.district_name}</option>`;
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
          if($(this).val().trim() !== '') {
              filled = true;
              return false;
          }
      });
  
      $saveButton.prop('disabled', !filled);
  }
  
  $inputs.on('input', function() {
      checkInputs();
  });
  
  
  
  $('#personal_info_form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('personal-info') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.personal_info = true;
              clearErrors();
              // Handle success response for personal-info
              showMessage('personal-info', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for personal-info form
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  displayFormValidationErrors('personal-info', errors);
              } else {
                  showMessage('personal-info', 'error', 'Something went wrong. Please try again.');
              }
          }
      });
  });
  
  
  // END::HANDLE PERSONAL INFO FORM SUBMISSION
  
  // BEGIN::HANDLE EDUCATIONAL INFORMATION
  
  // Handle Grade 10 form submission
  $('#grade_tenth_form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('education-info.tenth-grade') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.grade_tenth = true;
              clearErrors();
              // Handle success response for Grade 10
              showMessage('10th', 'success', response.message);
          },
          error: function (xhr, status, error) {
              console.error('check', xhr.responseText);
              // console.error(errors);
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  displayFormValidationErrors('10th', errors);
              } else {
                  showMessage('10th', 'error', 'Something went wrong. Please try again.');
              }
              // Handle error for Grade 10 form
  
          }
      });
  });
  
  // Handle Grade 12 form submission
  $('#grade_twelfth_form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('education-info.twelfth-grade') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.grade_twelfth = true;
              clearErrors();
              // Handle success response for Grade 12
              showMessage('12th', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for Grade 12 form
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  displayFormValidationErrors('12th', errors);
              } else {
                  showMessage('12th', 'error', 'Something went wrong. Please try again.');
              }
          }
      });
  });
  
  // Handle Higher Education form submission
  $('#higher_education_form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('education-info.higher-education') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.higher_education = true;
              clearErrors();
              // Handle success response for higher education
              showMessage('higher-education', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for higher education form
              // console.error(xhr.responseText);
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  console.error(errors);
                  displayFormValidationErrors('higher-education', errors);
              } else {
                  showMessage('higher-education', 'error', 'Something went wrong. Please try again.');
              }
  
          }
      });
  });
  
  // Handle masters and doctorate form submission
  $('#masters_doctorate_form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('education-info.postgraduate-info') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.masters = true;
              clearErrors();
              // Handle success response for post graduate
              showMessage('postgraduate', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for post graduate form
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  displayFormValidationErrors('postgraduate-info', errors);
              } else {
                  showMessage('postgraduate-info', 'error', 'Something went wrong. Please try again.');
              }
          }
      });
  });
  
  // END::HANDLE EDUCATIONAL INFORMATION
  
  // BEGIN::HANDLE MEDICAL HISTORY FORMS
  
  // Handle personal medical history form submission
  $('#personal_medical_form').on('submit', function (e) {
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
          success: function (response) {
              // formsSubmitted.personalMedicalInfo = true;
              clearErrors();
              // Handle success response for personal medical history
              showMessage('personal-medical-history', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for personal medical history form
              console.error(xhr.responseText);
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  // console.error(errors);
                  // console.error('check', errors);
                  displayFormValidationErrors('personal-medical-history', errors);
              } else {
                  showMessage('personal-medical-history', 'error', 'Something went wrong. Please try again.');
              }
          }
      });
  });
  
  // Handle family medical history form submission
  $('#family_medical_form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('medical-history.family-medical-info') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.familyMedicalInfo = true;
              clearErrors();
              // Handle success response for family medical history
              showMessage('family-medical-history', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for family medical history form
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  displayFormValidationErrors('family-medical-history', errors);
              } else {
                  showMessage('family-medical-history', 'error', 'Something went wrong. Please try again.');
              }
          }
      });
  });
  
  // END::HANDLE MEDICAL HISTORY FORMS
  
  // BEGIN::HANDLE EXPERIENCE FORM
  // Handle experience form form submission
  $('#experience-form').on('submit', function (e) {
      e.preventDefault();
  
      let formData = new FormData(this);
  
      $.ajax({
          url: "{{ route('work-experience.update') }}",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // formsSubmitted.familyMedicalInfo = true;
              clearErrors();
              // Handle success response for experience form
              showMessage('experience-form', 'success', response.message);
          },
          error: function (xhr, status, error) {
              // Handle error for experience form
              console.error(xhr.responseText);
              if(xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  displayFormValidationErrors('experience-form', errors);
              } else {
                  showMessage('experience-form', 'error', 'Something went wrong. Please try again.');
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
              if(inputError.length) {
                  inputError.text(errorMessage[0]).fadeIn();
              }
          });
      }
  
      function clearErrors() {
          $('.input-error').fadeOut().text('');
      }
  
  // END - HANDLE FORM VALIDATIONS ERRORS
  
  
  
// end: ajax & jquery
// HANDLES AADHAR CARD FORMAT
  {/* Add the event listener when the DOM is ready */}
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
{/* HANDLES AADHAR CARD FORMAT */}

{/* end::Global Javascript Bundle */}
{/* begin::Page Vendors Javascript(used by this page) */}
{/* <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> */}
{/* end::Page Vendors Javascript */}

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
});