import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import "~resources/scss/app.scss";

const successPop = document.querySelector('.alert-success');
setTimeout(() => {
    successPop.classList.add('d-none');
}, 4000)