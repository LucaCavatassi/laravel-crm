import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import "~resources/scss/app.scss";

const successPopup = document.querySelector('.alert-success');

if (successPopup) {
    setTimeout(() => {
        successPopup.classList.add('d-none');
    }, 4000)
}
