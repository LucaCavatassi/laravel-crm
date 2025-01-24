import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import "~resources/scss/app.scss";

const successPopup = document.querySelector('.alert-success');

if (successPopup) {
    setTimeout(() => {
        successPopup.classList.add('d-none');
    }, 4000)
}

// Ensure the script runs after the DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    const logoInput = document.getElementById('logo');
    const logoPreview = document.getElementById('logo-preview');

    // Function to handle the image preview
    window.previewLogo = function(event) {
        const file = event.target.files[0]; // Get the selected file

        if (file) {
            const reader = new FileReader();

            // When the file is read, update the image preview
            reader.onload = function(e) {
                logoPreview.src = e.target.result; // Set the image source to the result of the FileReader
            }

            reader.readAsDataURL(file); // Read the file as a data URL format that can be used directly in the browser
        }
    }
});