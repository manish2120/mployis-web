document.addEventListener("DOMContentLoaded", function() {
    let cropper;
    const logoInput = document.getElementById("logo");
    const imageElement = document.getElementById("image");
    const logo = document.getElementById("profile-img");

    document.getElementById("uploadButton").addEventListener("click", function() {
        logoInput.click();
    });

    logoInput.addEventListener("change", function(event) {
        const files = event.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageElement.src = e.target.result;
                imageElement.style.display = 'block'; // Show the image
                if (cropper) {
                    cropper.destroy(); // Destroy any existing cropper instance
                }
                cropper = new Cropper(imageElement, {
                    aspectRatio: 1,
                    viewMode: 1,
                    autoCropArea: 1,
                    responsive: true,
                });
                $('#cropModal').modal('show'); // Show the modal
            };
            reader.readAsDataURL(files[0]);
        }
    });

    document.getElementById("cropButton").addEventListener("click", function() {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            const croppedImageURL = canvas.toDataURL(); // Get the cropped image as a data URL
            document.querySelector(".image-input-wrapper").style.backgroundImage = `url(${croppedImageURL})`; // Set the cropped image as the background
            $('#cropModal').modal('hide'); // Hide the modal
            imageElement.style.display = 'none'; // Hide the image inside the modal
            cropper.destroy(); // Destroy the cropper instance
            cropper = null; // Clear the cropper variable
        }
    });
});