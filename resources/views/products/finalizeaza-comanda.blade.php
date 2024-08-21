@extends('layout.layout')

@section('content')
<div class="main-container" id="checkout-page">
    <form method="POST" action="{{ url('/save-checkout') }}" id="checkout_form">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <!-- Pasul 1: Facturare -->
        <div class="step-container">
            <div class="step active col" id="step1">
                <div class="inputs mb-32">
                    <div class="flex justify-center w-full">
                        <div class="checkboxes-row">
                            <button type="button" class="checkbox flex justify-between" id="organization-billing" data-checked="false">
                                <p class="title">Persoana Juridica</p>
                                <img src="{{ asset('resources/icons/persoana-juridica.svg') }}">
                            </button>
                            <button type="button" class="checkbox flex justify-between" id="person-billing" data-checked="false">
                                <p class="title">Persoana Fizica</p>
                                <img src="{{ asset('resources/icons/persoana-fizica.svg') }}">
                            </button>
                        </div>
                        <input type="hidden" name="billing_type" value="{{ $order->billing_type }}">
                    </div>

                    <div id="person-billing-container" class="mt-32 {{ $order->billing_type == 0 ? '' : 'hidden' }}">
                        <div class="grid grid-4 gap-lg">
                            <div class="form-group">
                                <label>Nume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[person_last_name]" value="{{ $order->company_information->person_last_name ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Prenume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[person_first_name]" value="{{ $order->company_information['person_first_name'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" name="company_information[person_phone]" value="{{ $order->company_information['person_phone'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" name="company_information[person_email]" value="{{ $order->company_information['person_email'] ?? '' }}" required>
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[person_country_id]" id="person_country_id" required>
                                    <option value="">Alege tara</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->company_information['person_country_id'] ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[person_county_id]" id="person_county_id" required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->company_information['person_county_id'] ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[person_locality]" value="{{ $order->company_information['person_locality'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[person_address]" value="{{ $order->company_information['person_address'] ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div id="organization-billing-container" class="mt-32 {{ $order->billing_type == 1 ? '' : 'hidden' }}">
                        <div class="grid grid-2 gap-lg">
                            <div class="form-group">
                                <label>Nume societate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_name]" value="{{ $order->company_information['organization_name'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>CUI <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_cui]" value="{{ $order->company_information['organization_cui'] ?? '' }}" required>
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" name="company_information[organization_phone]" value="{{ $order->company_information['organization_phone'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" name="company_information[organization_email]" value="{{ $order->company_information['organization_email'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Banca</label>
                                <input class="form-control w-full" type="text" name="company_information[organization_bank]" value="{{ $order->company_information['organization_bank'] ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>IBAN</label>
                                <input class="form-control w-full" type="text" name="company_information[organization_bank_account]" value="{{ $order->company_information['organization_bank_account'] ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg">
                            <div class="form-group">
                                <label>Nume persoana de contact</label>
                                <input class="form-control w-full" type="text" name="company_information[contact_person_last_name]" value="{{ $order->company_information['contact_person_last_name'] ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Prenume persoana de contact</label>
                                <input class="form-control w-full" type="text" name="company_information[contact_person_first_name]" value="{{ $order->company_information['contact_person_first_name'] ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[organization_country_id]" id="organization_country_id" required>
                                    <option value="">Alege tara</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->company_information['organization_country_id'] ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[organization_county_id]" id="organization_county_id" required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->company_information['organization_county_id'] ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_locality]" value="{{ $order->company_information['organization_locality'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_address]" value="{{ $order->company_information['organization_address'] ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end col flex-md align-center">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="go-to-step-2">Continua la livrare</button>
                </div>
            </div>

            <!-- Pasul 2: Livrare -->
            <div class="step col" id="step2">
                <div class="inputs mb-32">
                    <div class="flex justify-center w-full">
                        <div class="card flex col align-center">
                            <div class="title mb-8">Curier</div>
                            <img src="{{ asset('resources/icons/delivery.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="curier" data-checked="false">
                                <img src="{{ asset('resources/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">Ridicare personala</div>
                            <img src="{{ asset('resources/icons/location.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ridicare-personala" data-checked="false">
                                <img src="{{ asset('resources/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <input type="hidden" name="delivery_type">
                    </div>
                    <div id="curier-container" class="mt-32 {{ $order->delivery_type == 'curier' ? '' : 'hidden' }}">
                        <div class="grid grid-4 gap-lg">
                            <div class="form-group">
                                <label>Nume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_last_name]" value="{{ $order->delivery_information['delivery_last_name'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Prenume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_first_name]" value="{{ $order->delivery_information['delivery_first_name'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" name="delivery_information[delivery_phone]" value="{{ $order->delivery_information['delivery_phone'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" name="delivery_information[delivery_email]" value="{{ $order->delivery_information['delivery_email'] ?? '' }}" required>
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="delivery_information[delivery_country_id]" id="delivery_country_id" required>
                                    <option value="">Alege tara</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->delivery_information['delivery_country_id'] ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="delivery_information[delivery_county_id]" id="delivery_county_id" required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->delivery_information['delivery_county_id'] ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_locality]" value="{{ $order->delivery_information['delivery_locality'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_address]" value="{{ $order->delivery_information['delivery_address'] ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end col flex-md align-center">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="go-to-step-3">Mergi la plata</button>
                </div>
            </div>

            <!-- Pasul 3: Plata -->
            <div class="step col" id="step3">
                <div class="inputs mb-32">
                    <div class="flex justify-center w-full wrap">
                        <div class="card flex col align-center">
                            <div class="title mb-8">Card</div>
                            <img src="{{ asset('resources/icons/card.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="card" data-checked="false">
                                <img src="{{ asset('resources/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">Transfer bancar</div>
                            <img src="{{ asset('resources/icons/bank-transfer.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="transfer-bancar" data-checked="false">
                                <img src="{{ asset('resources/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">Ordin de plata</div>
                            <img src="{{ asset('resources/icons/payment-order.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ordin-de-plata" data-checked="false">
                                <img src="{{ asset('resources/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">Cash</div>
                            <img src="{{ asset('resources/icons/location.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="cash" data-checked="false">
                                <img src="{{ asset('resources/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <input type="hidden" name="payment_method">
                    </div>
                </div>
                <div class="flex justify-end col flex-md align-center">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="go-to-step-4">Finalizeaza comanda</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Gestionarea trecerii între pași
    document.getElementById('go-to-step-2').addEventListener('click', function () {
        document.getElementById('step1').classList.remove('active');
        document.getElementById('step2').classList.add('active');
    });

    document.getElementById('go-to-step-3').addEventListener('click', function () {
        document.getElementById('step2').classList.remove('active');
        document.getElementById('step3').classList.add('active');
    });

    document.getElementById('go-to-step-4').addEventListener('click', function () {
        document.getElementById('checkout_form').submit();
    });

    // Gestionarea selectării tipului de facturare
    document.getElementById('organization-billing').addEventListener('click', function () {
        this.dataset.checked = "true";
        document.getElementById('person-billing').dataset.checked = "false";
        document.getElementById('organization-billing-container').classList.remove('hidden');
        document.getElementById('person-billing-container').classList.add('hidden');
        document.querySelector('input[name="billing_type"]').value = 1;
    });

    document.getElementById('person-billing').addEventListener('click', function () {
        this.dataset.checked = "true";
        document.getElementById('organization-billing').dataset.checked = "false";
        document.getElementById('person-billing-container').classList.remove('hidden');
        document.getElementById('organization-billing-container').classList.add('hidden');
        document.querySelector('input[name="billing_type"]').value = 0;
    });

    // Gestionarea selectării tipului de livrare
    document.getElementById('curier').addEventListener('click', function () {
        this.dataset.checked = "true";
        document.getElementById('ridicare-personala').dataset.checked = "false";
        document.getElementById('curier-container').classList.remove('hidden');
        document.querySelector('input[name="delivery_type"]').value = 'curier';
    });

    document.getElementById('ridicare-personala').addEventListener('click', function () {
        this.dataset.checked = "true";
        document.getElementById('curier').dataset.checked = "false";
        document.getElementById('curier-container').classList.add('hidden');
        document.querySelector('input[name="delivery_type"]').value = 'ridicare-personala';
    });

    // Gestionarea selectării metodei de plată
    const paymentMethods = document.querySelectorAll('.step#step3 .card button');
    paymentMethods.forEach(function (button) {
        button.addEventListener('click', function () {
            paymentMethods.forEach(function (btn) {
                btn.dataset.checked = "false";
                btn.querySelector('img').classList.add('hidden');
            });
            this.dataset.checked = "true";
            this.querySelector('img').classList.remove('hidden');
            document.querySelector('input[name="payment_method"]').value = this.id;
        });
    });

    // Gestionarea selectării țării și județului (pentru facturare și livrare)
    const countrySelects = document.querySelectorAll('select[id$="_country_id"]');
    countrySelects.forEach(countrySelect => {
        countrySelect.addEventListener('change', function () {
            const countySelect = document.getElementById(this.id.replace('country', 'county'));
            fetch('/get-counties-by-country/' + this.value)
                .then(response => response.json())
                .then(data => {
                    countySelect.innerHTML = '<option value="">Alege judetul</option>';
                    data.forEach(county => {
                        countySelect.innerHTML += `<option value="${county.id}">${county.name}</option>`;
                    });
                });
        });
    });
});
</script>
@endsection
