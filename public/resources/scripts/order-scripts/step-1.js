var step1Container = document.getElementById("step1");
var step2Container = document.getElementById("step2");
var headerStep1 = document.getElementById("header-step1");
var headerStep2 = document.getElementById("header-step2");

var organizationBillingCheck = document.getElementById("organization-billing");
var personBillingCheck = document.getElementById("person-billing");
var organizationBillingContainer = document.getElementById(
  "organization-billing-container"
);
var personBillingContainer = document.getElementById(
  "person-billing-container"
);

var personLastName = document.getElementById("person_last_name");
var personFirstName = document.getElementById("person_first_name");
var personPhone = document.getElementById("person_phone");
var personCountyId = document.getElementById("person_county_id");
// var personLocalityId = document.getElementById("person_locality_id");
var personLocalityId = document.getElementById("person_locality_id");
// console.log("personLocalityId:", personLocalityId); // Verifică dacă elementul este definit corect

// if (personLocalityId) {
//   console.log("personLocalityId.value:", personLocalityId.value); // Verifică valoarea câmpului
// } else {
//   console.error(
//     "Elementul personLocalityId nu este definit sau nu a fost găsit în DOM."
//   );
// }

var personAddress = document.getElementById("person_address");
var personEmail = document.getElementById("person_email");

var organizationName = document.getElementById("organization_name");
var organizationCUI = document.getElementById("organization_cui");
var organizationCountyId = document.getElementById("organization_county_id");
var organizationLocalityId = document.getElementById(
  "organization_locality_id"
);
var organizationAddress = document.getElementById("organization_address");
var organizationPhone = document.getElementById("organization_phone");
var organizationEmail = document.getElementById("organization_email");
var organizationContactPersonLastName = document.getElementById(
  "contact_person_last_name"
);
var organizationContactPersonFirstName = document.getElementById(
  "contact_person_first_name"
);

var billingType = document.getElementsByName("billing_type")[0];
console.log(billingType.value);

var goToStep2 = document.getElementById("go-to-step-2");

document.addEventListener("DOMContentLoaded", function () {
  // Apelează funcția de inițializare când pagina este gata
  initializeBillingType();
});

function initializeBillingType() {
  if (billingType.value == 1) {
    // Persoana juridica
    organizationBillingCheck.dataset.checked = true;
    personBillingCheck.dataset.checked = false;
    personBillingContainer.classList.add("hidden");
    organizationBillingContainer.classList.remove("hidden");

    personLastName.required = false;
    personFirstName.required = false;
    personPhone.required = false;
    personCountyId.required = false;
    personLocalityId.required = false;
    personAddress.required = false;
    personEmail.required = false;

    organizationName.required = true;
    organizationCUI.required = true;
    organizationCountyId.required = true;
    organizationLocalityId.required = true;
    organizationAddress.required = true;
    organizationPhone.required = true;
    organizationEmail.required = true;
    organizationContactPersonFirstName.required = true;
    organizationContactPersonLastName.required = true;

    billingType.value = 1;
  } else {
    // Persoana fizica or guest
    organizationBillingCheck.dataset.checked = false;
    personBillingCheck.dataset.checked = true;
    organizationBillingContainer.classList.add("hidden");
    personBillingContainer.classList.remove("hidden");

    personLastName.required = true;
    personFirstName.required = true;
    personPhone.required = true;
    personCountyId.required = true;
    personLocalityId.required = true;
    personAddress.required = true;
    personEmail.required = true;

    organizationName.required = false;
    organizationCUI.required = false;
    organizationCountyId.required = false;
    organizationLocalityId.required = false;
    organizationAddress.required = false;
    organizationPhone.required = false;
    organizationEmail.required = false;
    organizationContactPersonFirstName.required = false;
    organizationContactPersonLastName.required = false;

    billingType.value = 0;
  }
}

organizationBillingCheck.addEventListener("click", changeBillingType);
personBillingCheck.addEventListener("click", changeBillingType);

goToStep2.addEventListener("click", validateAndProceedToStep2);

function changeBillingType() {
  if (this.id == "organization-billing") {
    if (this.dataset.checked == "false") {
      this.dataset.checked = true;
      personBillingCheck.dataset.checked = false;
      personBillingContainer.classList.add("hidden");
      if (organizationBillingContainer.classList.contains("hidden")) {
        organizationBillingContainer.classList.remove("hidden");
      }

      personLastName.required = false;
      personFirstName.required = false;
      personPhone.required = false;
      personCountyId.required = false;
      personLocalityId.required = false;
      personAddress.required = false;
      personEmail.required = false;

      organizationName.required = true;
      organizationCUI.required = true;
      organizationCountyId.required = true;
      organizationLocalityId.required = true;
      organizationAddress.required = true;
      organizationPhone.required = true;
      organizationEmail.required = true;
      organizationContactPersonFirstName.required = true;
      organizationContactPersonLastName.required = true;

      if (goToStep2.classList.contains("btn-disabled")) {
        goToStep2.classList.remove("btn-disabled");
      }

      billingType.value = 1;
    } else {
      this.dataset.checked = false;
      organizationBillingContainer.classList.add("hidden");
      billingType.value = null;

      goToStep2.classList.add("btn-disabled");
    }
  } else if (this.id == "person-billing") {
    if (this.dataset.checked == "false") {
      this.dataset.checked = true;
      organizationBillingCheck.dataset.checked = false;
      organizationBillingContainer.classList.add("hidden");
      if (personBillingContainer.classList.contains("hidden")) {
        personBillingContainer.classList.remove("hidden");
      }

      personLastName.required = true;
      personFirstName.required = true;
      personPhone.required = true;
      personCountyId.required = true;
      personLocalityId.required = true;
      personAddress.required = true;
      personEmail.required = true;

      organizationName.required = false;
      organizationCUI.required = false;
      organizationCountyId.required = false;
      organizationLocalityId.required = false;
      organizationAddress.required = false;
      organizationPhone.required = false;
      organizationEmail.required = false;
      organizationContactPersonFirstName.required = false;
      organizationContactPersonLastName.required = false;

      if (goToStep2.classList.contains("btn-disabled")) {
        goToStep2.classList.remove("btn-disabled");
      }

      billingType.value = 0;
    } else {
      this.dataset.checked = false;
      personBillingContainer.classList.add("hidden");
      billingType.value = null;

      goToStep2.classList.add("btn-disabled");
    }
  }
  // console.log(billingType.value);
}

function validateAndProceedToStep2() {
  if (!this.classList.contains("btn-disabled")) {
    var toValidate;
    if (billingType.value == 0) {
      toValidate =
        personBillingContainer.getElementsByClassName("form-control");
    } else if (billingType.value == 1) {
      toValidate =
        organizationBillingContainer.getElementsByClassName("form-control");
    }

    var valid = true;
    for (let item of toValidate) {
      if (item.reportValidity() == false) {
        valid = false;
      }
    }

    if (valid) {
      step1Container.classList.remove("active");
      step2Container.classList.add("active");
      headerStep1.classList.remove("active");
      headerStep2.classList.add("active");
    }
  }
}
