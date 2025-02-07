var registerForm = document.getElementById("order_register");
var emailInput = document.getElementById("email");
var passwordInput = document.getElementById("form-order-password");
var createAccount = document.getElementById("create-account");

// var emailValidation = document.getElementById("");
var emailError = document.getElementById("create-account-email");
var passwordError = document.getElementById("create-account-password");

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
    clearErrorMessages();
  }
}

function validateAndProceedToStep4() {
  if (!this.classList.contains("btn-disabled")) {
    clearErrorMessages();

    if (createAccount.checked) {
      fetch("/validate-account", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        },
        body: JSON.stringify({
          email: emailInput.value,
          password: passwordInput.value,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            proceedToStep4();
          } else {
            if (data.errors.email) {
              showError(emailError, data.errors.email);
            }
            if (data.errors.password) {
              showError(passwordError, data.errors.password);
            }
          }
        })
        .catch((error) => {
          console.error("Eroare:", error);
          showError(emailError, "A apărut o eroare. Încercați din nou.");
        });
    } else {
      proceedToStep4();
    }
  }
}

function showError(element, message) {
  element.classList.remove("hidden");
  element.classList.add("block");
  element.textContent = message;
}

function clearErrorMessages() {
  emailError.classList.add("hidden");
  emailError.classList.remove("block");
  emailError.textContent = "";

  passwordError.classList.add("hidden");
  passwordError.classList.remove("block");
  passwordError.textContent = "";
}

function proceedToStep4() {
  step3Container.classList.remove("active");
  step4Container.classList.add("active");
  headerStep3.classList.remove("active");
  headerStep4.classList.add("active");
}

function returnToStep2() {
  step3Container.classList.remove("active");
  step2Container.classList.add("active");
  headerStep3.classList.remove("active");
  headerStep2.classList.add("active");
}
