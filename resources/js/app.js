import './bootstrap';
import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
  '../img/**'
])

// seleziona gli elementi necessari
const password = document.getElementById("password");
const password2 = document.getElementById("password_confirm");
const passwordError = document.getElementById("password_error");

// verifica il contenuto dell'input password
const handlePasswordValidation = (password, password2, passwordError) => {
  const isValidLength = password.value.length >= 8;
  const hasLowercase = /[a-z]/.test(password.value);
  const hasUppercase = /[A-Z]/.test(password.value);
  const hasNumber = /\d/.test(password.value);
  const hasSpecialChar = /[#.?!@$%^&*-]/.test(password.value);

  if (password.value && password2.value) {
    if (password.value !== password2.value) {
      passwordError.textContent = "le due password non corrispondono.";
      passwordError.classList.add("passworderror");
      passwordError.classList.remove("passwordtrue");
      return false;
    } else {
      passwordError.textContent = "password confermate";
      passwordError.classList.add("passwordtrue");
      passwordError.classList.remove("passworderror");
      return true;
    }
  }
};

// aggiunge event listener ai campi password
password.addEventListener("input", () => {
  handlePasswordValidation(password, password2, passwordError);
});
password2.addEventListener("input", () => {
  handlePasswordValidation(password, password2, passwordError);
});

// impedisce l'invio del form se le password non corrispondono o se i campi sono vuoti
const form = document.querySelector("form");
form.addEventListener("submit", (event) => {
  if (!handlePasswordValidation(password, password2, passwordError)) {
    event.preventDefault();
  }
});

// mostra un messaggio se le password corrispondono al click del campo
const passwordRequirements = document.getElementById("password-requirements")
const displaynone = document.querySelector(".requirementpassowrd")
password.addEventListener("click", () => {
  passwordRequirements.classList.add("display-block")
  displaynone.classList.remove("requirementpassowrd")
})

// mostra i caratteri nascosti della password
const showPasswordCheckbox = document.getElementById('show-password');
showPasswordCheckbox.addEventListener('change', function () {
  if (this.checked) {
    password.type = 'text';
  } else {
    password.type = 'password';
  }
});

// gestione del popover
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))