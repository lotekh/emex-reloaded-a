var summaryBillingType = document.querySelector("#summary_billing_type span");
var summaryBillingName = document.querySelector("#summary_billing_name span");
var summaryBillingPhone = document.querySelector("#summary_billing_phone span");
var summaryBillingEmail = document.querySelector("#summary_billing_email span");
var summaryBillingCounty = document.querySelector(
  "#summary_billing_county_name span"
);
var summaryBillingCity = document.querySelector(
  "#summary_billing_city_name span"
);
var summaryBillingAddress = document.querySelector(
  "#summary_billing_address span"
);
var summaryBillingCUIContainer = document.querySelector("#summary_billing_cui");
var summaryBillingBankContainer = document.querySelector(
  "#summary_billing_bank"
);
var summaryBillingBankAccountContainer = document.querySelector(
  "#summary_billing_bank_account"
);
var summaryBillingCUI = document.querySelector("#summary_billing_cui span");
var summaryBillingBank = document.querySelector("#summary_billing_bank span");
var summaryBillingBankAccount = document.querySelector(
  "#summary_billing_bank_account span"
);

var organizationBank = document.getElementById("organization_bank");
var organizationBankAccount = document.getElementById(
  "organization_bank_account"
);

var summaryDeliveryType = document.querySelector("#summary_delivery_type span");
var summaryDeliveryName = document.querySelector("#summary_delivery_name span");
var summaryDeliveryPhone = document.querySelector(
  "#summary_delivery_phone span"
);
var summaryDeliveryEmail = document.querySelector(
  "#summary_delivery_email span"
);
var summaryDeliveryCounty = document.querySelector(
  "#summary_delivery_county_name span"
);
var summaryDeliveryCity = document.querySelector(
  "#summary_delivery_city_name span"
);
var summaryDeliveryAddress = document.querySelector(
  "#summary_delivery_address span"
);
var summaryDeliveryNameContainer = document.getElementById(
  "summary_delivery_name"
);
var summaryDeliveryPhoneContainer = document.getElementById(
  "summary_delivery_phone"
);
var summaryDeliveryEmailContainer = document.getElementById(
  "summary_delivery_email"
);
var summaryDeliveryCountyContainer = document.getElementById(
  "summary_delivery_county_name"
);
var summaryDeliveryCityContainer = document.getElementById(
  "summary_delivery_city_name"
);
var summaryDeliveryAddressContainer = document.getElementById(
  "summary_delivery_address"
);

var summaryPaymentType = document.getElementById("summary_payment_method");

var agreement = document.getElementById("agreement");
var finalize = document.getElementById("finalize");
var backToStep4 = document.getElementById("back-to-step-4");

agreement.addEventListener("click", agree);
backToStep4.addEventListener("click", returnToStep4);

function agree() {
  if (this.checked) {
    if (finalize.classList.contains("btn-disabled")) {
      finalize.classList.remove("btn-disabled");
    }
  } else {
    finalize.classList.add("btn-disabled");
  }
}

function returnToStep4() {
  step5Container.classList.remove("active");
  step4Container.classList.add("active");
  headerStep5.classList.remove("active");
  headerStep4.classList.add("active");
}

function populateSummary() {
  if (billingType.value == 0) {
    summaryBillingType.innerHTML = "Persoana fizica";
    summaryBillingName.innerHTML =
      personFirstName.value + " " + personLastName.value;
    // var personFirstName = document.getElementById("person_first_name");
    summaryBillingPhone.innerHTML = personPhone.value;
    summaryBillingEmail.innerHTML = personEmail.value;
    summaryBillingCounty.innerHTML =
      personCountyId.options[personCountyId.selectedIndex].text;

    // summaryBillingCity.innerHTML = personLocalityId.options[personLocalityId.selectedIndex].text;
    // var personLocalityId = document.getElementById("person_locality_id");
    summaryBillingCity.innerHTML = personLocalityId.value;
    summaryBillingAddress.innerHTML = personAddress.value;
    summaryBillingCUIContainer.style.display = "none";
    summaryBillingBankContainer.style.display = "none";
    summaryBillingBankAccountContainer.style.display = "none";
  } else if (billingType.value == 1) {
    summaryBillingType.innerHTML = "Persoana juridica";
    summaryBillingName.innerHTML = organizationName.value;
    summaryBillingPhone.innerHTML = organizationPhone.value;
    summaryBillingEmail.innerHTML = organizationEmail.value;
    summaryBillingCounty.innerHTML =
      organizationCountyId.options[organizationCountyId.selectedIndex].text;

    // summaryBillingCity.innerHTML = organizationLocalityId.options[organizationLocalityId.selectedIndex].text;
    // var organizationLocalityId = document.getElementById(
    //     "organization_locality_id"
    //   );

    summaryBillingCity.innerHTML = organizationLocalityId.value;
    summaryBillingAddress.innerHTML = organizationAddress.value;
    summaryBillingCUIContainer.style.display = "block";
    summaryBillingBankContainer.style.display = "block";
    summaryBillingBankAccountContainer.style.display = "block";
    summaryBillingCUI.innerHTML = organizationCUI.value;
    summaryBillingBank.innerHTML = organizationBank.value;
    summaryBillingBankAccount.innerHTML = organizationBankAccount.value;
  }

  if (deliveryType.value == 1) {
    summaryDeliveryType.innerHTML = "Ridicare personala";
    summaryDeliveryNameContainer.style.display = "none";
    summaryDeliveryPhoneContainer.style.display = "none";
    summaryDeliveryEmailContainer.style.display = "none";
    summaryDeliveryCountyContainer.style.display = "none";
    summaryDeliveryCityContainer.style.display = "none";
    summaryDeliveryAddressContainer.style.display = "none";

    if (paymentType.value == "ramburs") {
      calculateRamburs();
    } else {
      rambursValueTd.textContent = "-";
      rambursUnitary.textContent = "-";
      rambursTvaTd.textContent = "-";
    }

    transportValue.textContent = "-";
    transportUnitary.textContent = "-";
    transportTVA.textContent = "-";
  } else {
    summaryDeliveryNameContainer.style.display = "block";
    summaryDeliveryPhoneContainer.style.display = "block";
    summaryDeliveryEmailContainer.style.display = "block";
    summaryDeliveryCountyContainer.style.display = "block";
    summaryDeliveryCityContainer.style.display = "block";
    summaryDeliveryAddressContainer.style.display = "block";

    summaryDeliveryType.innerHTML = "Livrare prin curier";
    if (deliverySameAsBilling.checked) {
      if (billingType.value == 0) {
        summaryDeliveryName.innerHTML =
          personFirstName.value + " " + personLastName.value;
        summaryDeliveryPhone.innerHTML = personPhone.value;
        summaryDeliveryEmail.innerHTML = personEmail.value;
        summaryDeliveryCounty.innerHTML =
          personCountyId.options[personCountyId.selectedIndex].text;
        summaryDeliveryCity.innerHTML =
          personLocalityId.options[personLocalityId.selectedIndex].text;
        summaryDeliveryAddress.innerHTML = personAddress.value;

        getTransportPrice(personCountyId.value);
      } else if (billingType.value == 1) {
        summaryDeliveryName.innerHTML = organizationName.value;
        summaryDeliveryPhone.innerHTML = organizationPhone.value;
        summaryDeliveryEmail.innerHTML = organizationEmail.value;
        summaryDeliveryCounty.innerHTML =
          organizationCountyId.options[organizationCountyId.selectedIndex].text;
        summaryDeliveryCity.innerHTML =
          organizationLocalityId.options[
            organizationLocalityId.selectedIndex
          ].text;
        summaryDeliveryAddress.innerHTML = organizationAddress.value;

        getTransportPrice(organizationCountyId.value);
      }
    } else {
      summaryDeliveryName.innerHTML =
        deliveryFirstName.value + " " + deliveryLastName.value;
      summaryDeliveryPhone.innerHTML = deliveryPhone.value;
      summaryDeliveryEmail.innerHTML = deliveryEmail.value;
      summaryDeliveryCounty.innerHTML =
        deliveryCountyId.options[deliveryCountyId.selectedIndex].text;
      //   summaryDeliveryCity.innerHTML =
      //     deliveryLocalityId.options[deliveryLocalityId.selectedIndex].text;
      summaryDeliveryCity.innerHTML = deliveryLocalityId.value;
      summaryDeliveryAddress.innerHTML = deliveryAddress.value;

      getTransportPrice(deliveryCountyId.value);
    }
  }

  summaryPaymentType.innerHTML = paymentType.value;
}

var transportValue = document.getElementById("transport_value");
var transportTVA = document.getElementById("transport_TVA");
var transportUnitary = document.getElementById("transport_unitary");
var totalGeneral = document.getElementById("total_general");
var globalSelectedPayment = "card";
var orderId = document.getElementById("orderr_id").value;
console.log("Numarul Comenzii = " + orderId);
// console.log(county_id);

function getTransportPrice(county_id) {
  var xmlhttp = new XMLHttpRequest();
  if (county_id) {
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if (xmlhttp.status == 200) {
          var response = JSON.parse(xmlhttp.responseText);

          var transportValuePrice = response.price;
          var transportTVAPrice = response.tva;
          var totalPriceWithTransport = response.total;

          transportValue.textContent = transportValuePrice;
          transportUnitary.textContent = transportValuePrice;
          transportTVA.textContent = transportTVAPrice;

          if (paymentType.value == "ramburs") {
            calculateRamburs(transportValuePrice);
          } else {
            rambursValueTd.textContent = "-";
            rambursUnitary.textContent = "-";
            rambursTvaTd.textContent = "-";

            totalGeneral.textContent = totalPriceWithTransport;
          }
        } else if (xmlhttp.status == 400) {
          alert("There was an error 400");
        } else {
          alert("something else other than 200 was returned");
        }
      }
    };
    // xmlhttp.open(
    //   "GET",
    //   baseUrl + "/get-transport-price?county_id=" + county_id,
    //   true
    // );
    xmlhttp.open(
      "GET",
      baseUrl +
        "/get-transport-price?county_id=" +
        county_id +
        "&order_id=" +
        orderId,
      true
    );
    xmlhttp.send();
  }
}

var rambursValueTd = document.getElementById("ramburs_value");
var rambursUnitary = document.getElementById("ramburs_unitary");
var rambursTvaTd = document.getElementById("ramburs_TVA");

function calculateRamburs(transportPrice = 0) {
  console.log(totalValue);
  if (!isNaN(totalValue)) {
    rambursValue = (totalValue * 3) / 100;
    rambursValue = rambursValue.toFixed(2);

    ramburs_TVA = (rambursValue * 19) / 100;
    ramburs_TVA = ramburs_TVA.toFixed(2);

    rambursValueTd.textContent = rambursValue;
    rambursUnitary.textContent = rambursValue;
    rambursTvaTd.textContent = ramburs_TVA;

    totalGeneral.textContent = Number(
      parseFloat(totalPrice) +
        1.19 * transportPrice +
        parseFloat(rambursValue) +
        parseFloat(ramburs_TVA)
    ).toFixed(2);
  }
}
