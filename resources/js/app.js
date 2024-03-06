import './bootstrap';
import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
  '../img/**'
])

// gestisce le classi dei messaggi di errore 
const password = document.getElementById("password");
const updateRequirement = (id, valid) => {
  const requirement = document.getElementById(id);
  if (valid) {
    requirement.classList.add("valid");
    requirement.classList.remove("error");
  } else {
    requirement.classList.add("error");
    requirement.classList.remove("valid");
  }
};

// verifica il contentuto dell'input password
const handleFormValidation = () => {
  const value = password.value;
  const isValidLength = value.length >= 8;
  const hasLowercase = /[a-z]/.test(value);
  const hasUppercase = /[A-Z]/.test(value);
  const hasNumber = /\d/.test(value);
  const hasSpecialChar = /[#.?!@$%^&*-]/.test(value);

  updateRequirement("length", isValidLength);
  updateRequirement("lowercase", hasLowercase);
  updateRequirement("uppercase", hasUppercase);
  updateRequirement("number", hasNumber);
  updateRequirement("special-char", hasSpecialChar)
};
password.addEventListener("input", handleFormValidation);

// controllo delle due password
const password1 = document.getElementById("password");
const password2 = document.getElementById("password_confirm");
const passwordError = document.getElementById("password_error");
const checkPasswordMatch = () => {
  if (password1.value && password2.value) {
    if (password1.value !== password2.value) {
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
password1.addEventListener("input", checkPasswordMatch);
password2.addEventListener("input", checkPasswordMatch);

// impedisci l'invio del form se le password non corrispondono o se i campi sono vuoti
const form = document.querySelector("form");
form.addEventListener("submit", (event) => {
  if (!checkPasswordMatch()) {
    event.preventDefault();
  }
});


// messaggio se le password coincidono al click dell'input
const passwordRequirements = document.getElementById("password-requirements")
const displaynone = document.querySelector(".requirementpassowrd")
password1.addEventListener("click", () => {
  passwordRequirements.classList.add("display-block")
  displaynone.classList.remove("requirementpassowrd")
})

// mostra i caratteri nascosti della password
const showPasswordCheckbox = document.getElementById('show-password');
showPasswordCheckbox.addEventListener('change', function () {
  if (this.checked) {
    password1.type = 'text';
  } else {
    password1.type = 'password';
  }
});

// gestione del popover
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))