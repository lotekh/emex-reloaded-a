var registerForm = document.getElementById("order_register");
var emailInput = document.getElementById("email");
var passwordInput = document.getElementById("password");
var createAccount = document.getElementById("create-account");

// var emailValidation = document.getElementById("");

var backToStep2 = document.getElementById("back-to-step-2");
var goToStep4 = document.getElementById("go-to-step-4");

createAccount.addEventListener("click", toggleRegister);

goToStep4.addEventListener("click", validateAndProceedToStep4);
backToStep2.addEventListener("click", returnToStep2);

function toggleRegister() {
  if (registerForm.classList.contains("hidden")) {
    registerForm.classList.remove("hidden");
    emailInput.required = true;
    passwordInput.required = true;
  } else {
    registerForm.classList.add("hidden");
    emailInput.required = false;
    passwordInput.required = false;
  }
}

function validateAndProceedToStep4() {
  if (!this.classList.contains("btn-disabled")) {
    var toValidate;
    var valid = true;
    if (createAccount.checked == true) {
      toValidate = registerForm.getElementsByClassName("form-control");

      for (let item of toValidate) {
        if (item.reportValidity() == false) {
          valid = false;
        }
      }
    }

    if (valid) {
      step3Container.classList.remove("active");
      step4Container.classList.add("active");
      headerStep3.classList.remove("active");
      headerStep4.classList.add("active");
    }
  }
}

function returnToStep2() {
  step3Container.classList.remove("active");
  step2Container.classList.add("active");
  headerStep3.classList.remove("active");
  headerStep2.classList.add("active");
}
