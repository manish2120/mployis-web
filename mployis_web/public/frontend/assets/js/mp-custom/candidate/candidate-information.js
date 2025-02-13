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
});