//Get cities options for person billing
    var personCountyIdSelect = document.getElementById('person_county_id');
    var personCityIdSelect = document.getElementById('person_locality_id');
    var personCityValue = personCityIdSelect.value;
    getCities(personCountyIdSelect, personCityIdSelect, userPersonLocalityId);

    //Get cities options for organization billing
    var organizationCountyIdSelect = document.getElementById('organization_county_id');
    var organizationCityIdSelect = document.getElementById('organization_locality_id');
    var organizationCityValue = organizationCityIdSelect.value;
    getCities(organizationCountyIdSelect, organizationCityIdSelect, userOrganizationLocalityId);

    var deliveryCountyIdSelect = document.getElementById('delivery_county_id');
    var deliveryCityIdSelect = document.getElementById('delivery_locality_id');
    var deliveryCityValue = deliveryCityIdSelect.value;
    getCities(deliveryCountyIdSelect, deliveryCityIdSelect, userDeliveryLocalityId);

    //Get delivery options for organization billing

    //If county changes, change cities options
    personCountyIdSelect.addEventListener("change", function () {
        getCities(personCountyIdSelect, personCityIdSelect, null);
        // if(deliverySameAsBilling.checked) {
        //     setTimeout(function() {
        //         getTransportPrice(personCountyIdSelect.value);
        //         console.log('personCountyIdSelect');
        //     }, 300);
        // }
    });
    organizationCountyIdSelect.addEventListener("change", function () {
        getCities(organizationCountyIdSelect, organizationCityIdSelect, null);
        // if(deliverySameAsBilling.checked) {
        //     setTimeout(function() {
        //         getTransportPrice(organizationCountyIdSelect.value);
        //         console.log('organizationCountyIdSelect');
        //     }, 300);
        // }
    });
    deliveryCountyIdSelect.addEventListener("change", function () {
        getCities(deliveryCountyIdSelect, deliveryCityIdSelect, null);
        // if(!deliverySameAsBilling.checked) {
        //     setTimeout(function () {
        //         getTransportPrice(deliveryCountyIdSelect.value);
        //         console.log('deliveryCountyIdSelect');
        //     }, 300);
        // }
    });

    //If delivery county changes, change cities options and transport price accordingly


    //If there is a delivery county value already set, get transport price for it
    function getCities(countySelect, citySelect, cityValue) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    var cities = xmlhttp.responseText;
                    cities = JSON.parse(cities);
                    citySelect.innerHTML = '';
                    var option = document.createElement('option');
                    option.value = '';
                    option.text = 'Alege localitatea';
                    citySelect.add(option);
                    cities.forEach(function (city, index) {
                        var option = document.createElement('option');
                        option.value = city.id;
                        option.text = city.name;
                        if (option.value == cityValue)
                            option.selected = true;
                        citySelect.add(option);
                    });
                }
                else if (xmlhttp.status == 400) {
                    alert('There was an error 400');
                }
                else {
                    alert('something else other than 200 was returned');
                }
            }
        };
        var selectedOption = countySelect.value;
        xmlhttp.open("GET", baseUrl + '/get-cities-by-county-id?county_id=' + selectedOption, true);
        xmlhttp.send();
    }