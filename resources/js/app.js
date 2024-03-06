import './bootstrap';
import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
    '../img/**'
])
// aggiunta  caratteri nella password
const password = document.getElementById("password");
const requirements = document.querySelectorAll(".requirement");

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
  updateRequirement("special-char", hasSpecialChar)};

  password.addEventListener("input", handleFormValidation);

  // controllo delle due password

  const password1 = document.getElementById("password");
const password2 = document.getElementById("password_confirm");
const passwordError = document.getElementById("password_error");

const checkPasswordMatch = () => {
  if (password1.value !== password2.value || password1.value == "") {
    passwordError.textContent = "le due password non corrispondono.";
    passwordError.classList.add("passworderror")
    if(password1.value !== password2.value){
        passwordError.classList.remove("passwordtrue")
    }
    return false;
  }else{
    passwordError.textContent = "password confermate";
    passwordError.classList.add("passwordtrue")
    return true;
  }

};
password1.addEventListener("input", checkPasswordMatch);
password2.addEventListener("input", checkPasswordMatch);


// aggiunta bottone di visuallizazione di  caratteri richiesti al click della password
const passwordRequirements = document.getElementById("password-requirements")
const displaynone = document.querySelector(".requirementpassowrd")

password1.addEventListener("click",()=>{
    passwordRequirements.classList.add("display-block")
    displaynone.classList.remove("requirementpassowrd")
})
const showPasswordCheckbox = document.getElementById('show-password');
showPasswordCheckbox.addEventListener('change', function() {
    if (this.checked) {
      password1.type = 'text';
    } else {
      password1.type = 'password';
    }
  });

const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

// const nameuser = document.getElementById("names")
// const nameuserrequired = document.getElementById("namerequired")


// nameuser.addEventListener("input", () => {
//     if (nameuser.value.trim() === "") {
//       nameuserrequired.textContent = " il campo nome non può essere vuoto";
//     } else {
//       nameuserrequired.textContent = "";
//     }
//   });

//   const surnameuser = document.getElementById("surname")
// const surnameuserrequireds = document.getElementById("surnamerequired")

// surnameuser.addEventListener("input", () => {
//     if (surnameuser.value.trim() === "") {
//       surnameuserrequireds.textContent = " il campo nome non può essere vuoto";
//     } else {
//       surnameuserrequireds.textContent = "";
//     }
//   });

//   const emailuser = document.getElementById("email")
// const emailuserrequired = document.getElementById("emailrequired")

// emailuser.addEventListener("input", () => {
//     if (emailuser.value.trim() === "") {
//       emailuserrequired.textContent = " il campo nome non può essere vuoto";
//     } else {
//       emailuserrequired.textContent = "";
//     }
//   });




  





  



