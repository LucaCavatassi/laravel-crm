import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import "~resources/scss/app.scss";

const successPopup = document.querySelector('.alert-success');
const alertPopup = document.querySelector('.alert-danger');
console.log(alertPopup);


if (successPopup) {
    setTimeout(() => {
        successPopup.classList.add('d-none');
    }, 4000)
}
// if (alertPopup) {
//     setTimeout(() => {
//         alertPopup.classList.add('d-none');
//     }, 4000)
// }