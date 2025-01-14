var step3Container = document.getElementById("step3");
var headerStep3 = document.getElementById("header-step3");
var step4Container = document.getElementById("step4");
var headerStep4 = document.getElementById("header-step4");

var curierCheck = document.getElementById("curier");
var ridicarePersonalaCheck = document.getElementById("ridicare-personala");

var curierContainer = document.getElementById("curier-container");

var deliveryType = document.getElementsByName("delivery_type")[0];
var goToStep3 = document.getElementById("go-to-step-3");
var backToStep1 = document.getElementById("back-to-step-1");
var deliverySameAsBilling = document.getElementById("delivery-same-as-billing");
var deliveryInputs = document.getElementById("delivery-inputs");

let deliveryDataSameAsBilling = false;

var deliveryLastName = document.getElementById("delivery_last_name");
var deliveryFirstName = document.getElementById("delivery_first_name");
var deliveryPhone = document.getElementById("delivery_phone");
var deliveryEmail = document.getElementById("delivery_email");
var deliveryCountyId = document.getElementById("delivery_county_id");
var deliveryCityId = document.getElementById("delivery_city_id");
var deliveryAddress = document.getElementById("delivery_address");

curierCheck.addEventListener("click", changeDeliveryType);
ridicarePersonalaCheck.addEventListener("click", changeDeliveryType);
deliverySameAsBilling.addEventListener("click", sameDataAsBilling);
goToStep3.addEventListener("click", validateAndProceedToNextStep);
backToStep1.addEventListener("click", returnToStep1);

function changeDeliveryType() {
  if (this.id == "curier") {
    if (this.dataset.checked == "false") {
      this.dataset.checked = true;
      ridicarePersonalaCheck.dataset.checked = false;
      if (curierContainer.classList.contains("hidden")) {
        curierContainer.classList.remove("hidden");
      }

      if (deliveryDataSameAsBilling == false) {
        deliveryLastName.required = true;
        deliveryFirstName.required = true;
        deliveryPhone.required = true;
        deliveryEmail.required = true;
        deliveryCountyId.required = true;
        deliveryCityId.required = true;
        deliveryAddress.required = true;
      }

      if (goToStep3.classList.contains("btn-disabled")) {
        goToStep3.classList.remove("btn-disabled");
      }

      deliveryType.value = 0;
    } else {
      this.dataset.checked = false;
      curierContainer.classList.add("hidden");
      deliveryType.value = null;

      goToStep3.classList.add("btn-disabled");
    }
  } else if (this.id == "ridicare-personala") {
    if (this.dataset.checked == "false") {
      this.dataset.checked = true;
      curierCheck.dataset.checked = false;
      curierContainer.classList.add("hidden");

      deliveryLastName.required = false;
      deliveryFirstName.required = false;
      deliveryPhone.required = false;
      deliveryEmail.required = false;
      deliveryCountyId.required = false;
      deliveryCityId.required = false;
      deliveryAddress.required = false;

      if (goToStep3.classList.contains("btn-disabled")) {
        goToStep3.classList.remove("btn-disabled");
      }

      deliveryType.value = 1;
    } else {
      this.dataset.checked = false;
      deliveryType.value = null;

      goToStep3.classList.add("btn-disabled");
    }
  }
}

function sameDataAsBilling() {
  if (this.checked) {
    deliveryDataSameAsBilling = true;
    hideOrShowDeliveryInputs(false);
    deliveryLastName.required = false;
    deliveryFirstName.required = false;
    deliveryPhone.required = false;
    deliveryEmail.required = false;
    deliveryCountyId.required = false;
    deliveryCityId.required = false;
    deliveryAddress.required = false;
  } else {
    deliveryDataSameAsBilling = false;
    hideOrShowDeliveryInputs(true);
  }
}

function hideOrShowDeliveryInputs(show) {
  if (show == false) {
    deliveryInputs.classList.add("hidden");
  } else if (show == true) {
    if (deliveryInputs.classList.contains("hidden")) {
      deliveryInputs.classList.remove("hidden");
    }
  }
}

function validateAndProceedToNextStep() {
  if (!this.classList.contains("btn-disabled")) {
    console.log(deliveryType);
    var toValidate;
    var valid = true;
    if (deliveryType.value == 0) {
      toValidate = curierContainer.getElementsByClassName("form-control");
      console.log(toValidate);

      for (let item of toValidate) {
        if (item.reportValidity() == false) {
          valid = false;
        }
      }
    }

    if (valid) {
      if (isGuest) {
        step2Container.classList.remove("active");
        step3Container.classList.add("active");
        headerStep2.classList.remove("active");
        headerStep3.classList.add("active");
      } else {
        step2Container.classList.remove("active");
        step4Container.classList.add("active");
        headerStep2.classList.remove("active");
        headerStep4.classList.add("active");
      }
    }
  }
}

function returnToStep1() {
  step2Container.classList.remove("active");
  step1Container.classList.add("active");
  headerStep2.classList.remove("active");
  headerStep1.classList.add("active");
}
