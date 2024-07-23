var backToStep3 = document.getElementById("back-to-step-3");
var goToStep5 = document.getElementById("go-to-step-5");

var step5Container = document.getElementById("step5");
var headerStep5 = document.getElementById("header-step5");

var paymentType = document.getElementById("payment_method");

var card = document.getElementById("card");
var ordinDePlata = document.getElementById("ordin-de-plata");
var transferBancar = document.getElementById("transfer-bancar");
var ramburs = document.getElementById("ramburs");
var rambursCard = document.getElementById("rambursCard");
var cash = document.getElementById('cash');
var cashCard = document.getElementById('cashCard');

curierCheck.addEventListener("click", function () {
  rambursCard.style.display = "flex";
  cashCard.style.display = "none";
  changePaymentType(true);
});

ridicarePersonalaCheck.addEventListener("click", function () {
  rambursCard.style.display = "none";
  cashCard.style.display = "flex";
  changePaymentType(true);
});

card.addEventListener("click", changePaymentType);
ordinDePlata.addEventListener("click", changePaymentType);
transferBancar.addEventListener("click", changePaymentType);
ramburs.addEventListener("click", changePaymentType);
cash.addEventListener("click", changePaymentType);

goToStep5.addEventListener("click", proceedToStep5);
backToStep3.addEventListener("click", returnToPreviousStep);

function changePaymentType(resetPayment = false) {
  if (resetPayment == true) {
    paymentType.value = null;

    if (!goToStep5.classList.contains("btn-disabled")) {
      goToStep5.classList.add("btn-disabled");
    }
  } else if (this.dataset && this.dataset.checked == "true") {
    paymentType.value = "";
    this.dataset.checked = false;
    goToStep5.classList.add("btn-disabled");
  } else {
    if (this.id == "card") {
      this.dataset.checked = true;
      ordinDePlata.dataset.checked = false;
      transferBancar.dataset.checked = false;
      ramburs.dataset.checked = false;
      cash.dataset.checked = false;

      paymentType.value = "card";
    } else if (this.id == "ordin-de-plata") {
      this.dataset.checked = true;
      card.dataset.checked = false;
      transferBancar.dataset.checked = false;
      ramburs.dataset.checked = false;
      cash.dataset.checked = false;

      paymentType.value = "ordin de plata";
    } else if (this.id == "transfer-bancar") {
      this.dataset.checked = true;
      card.dataset.checked = false;
      ordinDePlata.dataset.checked = false;
      ramburs.dataset.checked = false;
      cash.dataset.checked = false;

      paymentType.value = "transfer bancar";
    } else if (this.id == "ramburs") {
      this.dataset.checked = true;
      card.dataset.checked = false;
      transferBancar.dataset.checked = false;
      ordinDePlata.dataset.checked = false;
      cash.dataset.checked = false;

      paymentType.value = "ramburs";
    } else if (this.id == "cash") {
        console.log(this.id);
        this.dataset.checked = true;
        card.dataset.checked = false;
        transferBancar.dataset.checked = false;
        ordinDePlata.dataset.checked = false;
        ramburs.dataset.checked = false;

        paymentType.value = "cash";
    }

    if (goToStep5.classList.contains("btn-disabled")) {
      goToStep5.classList.remove("btn-disabled");
    }
  }
}

function proceedToStep5() {
  if (!this.classList.contains("btn-disabled")) {
    step4Container.classList.remove("active");
    step5Container.classList.add("active");
    headerStep4.classList.remove("active");
    headerStep5.classList.add("active");

    populateSummary();
  }
}

function returnToPreviousStep() {
  if (isGuest) {
    step4Container.classList.remove("active");
    step3Container.classList.add("active");
    headerStep4.classList.remove("active");
    headerStep3.classList.add("active");
  } else {
    step4Container.classList.remove("active");
    step2Container.classList.add("active");
    headerStep4.classList.remove("active");
    headerStep2.classList.add("active");
  }
}
