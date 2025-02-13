$(document).ready(function () {
  let cropper;
  const image = document.getElementById('image');
  const profilePictureInput = document.getElementById('profile-picture');
  const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));

  // Handle profile picture upload & crop
  profilePictureInput.addEventListener('change', function (event) {
      const file = event.target.files[0];

      if (file && /^image\/(png|jpe?g)$/.test(file.type)) {
          const reader = new FileReader();
          reader.onload = function (e) {
              image.src = e.target.result;
              image.style.display = 'block';

              if (cropper) {
                  cropper.destroy();
              }
              cropper = new Cropper(image, {
                  aspectRatio: 1,
                  viewMode: 1,
                  scalable: true,
                  zoomable: true,
                  movable: true,
                  rotatable: false,
              });

              cropModal.show();
          };
          reader.readAsDataURL(file);
      } else {
          alert('Please upload a valid image (PNG, JPG, JPEG).');
      }
  });

  // Handle crop button click
  $('#cropButton').on('click', function () {
      const canvas = cropper.getCroppedCanvas({
          width: 200,
          height: 200,
      });

      canvas.toBlob(function (blob) {
          const croppedImage = new File([blob], 'cropped_image.jpg', { type: 'image/jpeg' });

          const dataTransfer = new DataTransfer();
          dataTransfer.items.add(croppedImage);
          profilePictureInput.files = dataTransfer.files;

          cropModal.hide();

          // Update profile picture preview
          $('.image-input-wrapper').css('background-image', `url(${canvas.toDataURL()})`);
      });
  });

  // Aadhar Card Input Formatting
  $('#aadhar_card_no').on('input', function () {
      let inputVal = $(this).val().replace(/\D/g, '');
      let formattedValue = '';
      for (let i = 0; i < inputVal.length; i++) {
          if (i > 0 && (i % 4 === 0)) {
              formattedValue += ' ';
          }
          formattedValue += inputVal[i];
      }
      $(this).val(formattedValue);
  });

  function handleFormSubmission(formId, inputs, saveButton, routeName) {
      $(formId).on("submit", function (event) {
          event.preventDefault();

          const candidateId = $("#candidate_id").val();
          const url = routeName.replace(":candidate_id", candidateId);

          saveButton.prop('disabled', true).text("Saving...");

          const form = $(this);
          let formData = new FormData(this);
          formData.append("_token", $('meta[name="csrf-token"]').attr("content"));

          let messageTimeout;
          $.ajax({
              url: url,
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function (response) {
                  clearTimeout(messageTimeout);
                  saveButton.prop('disabled', false).text("Save");

                  if (response.status) {
                      clearValidationErrors(form);
                      displayStatus(response.message);
                  }
              },
              error: function (response, xhr) {
                  clearTimeout(messageTimeout);
                  saveButton.prop('disabled', false).text("Save");

                  if (!response.error || xhr.status === 422) {
                      clearValidationErrors(form);
                      const errors = response.responseJSON?.errors;
                      if (errors) {
                          form.find("input, select, textarea").each(function () {
                              const fieldName = $(this).attr("name");
                              if (errors[fieldName]) {
                                  $(this).addClass("border border-danger is-invalid");
                                  $(this).next(".invalid-feedback").html(errors[fieldName][0]);
                              }
                          });
                      }
                  }
              },
          });
      });

      // Enable/disable Save button based on input values
      inputs.on('input', function () {
          checkInputs(inputs, saveButton);
      });
  }

  function checkInputs(inputs, saveButton) {
      let filled = false;
      inputs.each((index, input) => {
          if ($(input).val().trim() !== '') {
              filled = true;
              return false;
          }
      });
      saveButton.prop('disabled', !filled);
  }

  // Bind form handlers
  handleFormSubmission(
      "#personalInfoForm",
      $("#personalInfoForm input"),
      $("#saveBtn"),
      "{{ route('personal-info.candidate', ['candidate_id' => ':candidate_id']) }}"
  );

  handleFormSubmission(
      "#grade_tenth_form",
      $("#grade_tenth_form input"),
      $("#saveTenthBtn"),
      "{{ route('tenth-grade-info.candidate', ['candidate_id' => ':candidate_id']) }}"
  );

  handleFormSubmission(
      "#grade_twelfth_form",
      $("#grade_twelfth_form input"),
      $("#saveTwelfthBtn"),
      "{{ route('twelfth-grade-info.candidate', ['candidate_id' => ':candidate_id']) }}"
  );

  handleFormSubmission(
      "#higher_education_form",
      $("#higher_education_form input"),
      $("#saveHigherEduBtn"),
      "{{ route('higher-education-info.candidate', ['candidate_id' => ':candidate_id']) }}"
  );

  handleFormSubmission(
      "#masters_doctorate_form",
      $("#masters_doctorate_form input"),
      $("#saveMastersBtn"),
      "{{ route('masters-doctorate-info.candidate', ['candidate_id' => ':candidate_id']) }}"
  );

  handleFormSubmission(
      "#experience_form",
      $("#experience_form input"),
      $("#saveExperienceBtn"),
      "{{ route('experience-info.candidate', ['candidate_id' => ':candidate_id']) }}"
  );
});

// Utility functions
function displayStatus(response) {
  if (response) {
      $(".status")
          .removeClass("alert-danger d-flex")
          .addClass("alert alert-success d-flex")
          .text(response)
          .fadeIn();
  } else {
      $(".status")
          .removeClass("alert-success d-flex")
          .addClass("alert alert-danger d-flex")
          .text("An error occurred. Please try again.")
          .fadeIn();
  }

  setTimeout(function () {
      $(".status").fadeOut(function () {
          $(this).text("");
          $(this).removeClass("d-flex");
          $(this).addClass("d-none");
      });
  }, 5000);
}

function clearValidationErrors(form) {
  form.find("input, textarea, select").removeClass("is-invalid border border-danger");
  form.find(".invalid-feedback").html("");
}
