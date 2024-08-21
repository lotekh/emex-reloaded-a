@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endsection

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
                                <input class="form-control w-full" type="text" name="company_information[person_first_name]" value="{{ $order->company_information->person_first_name ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" name="company_information[person_phone]" value="{{ $order->company_information->person_phone ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" name="company_information[person_email]" value="{{ $order->company_information->person_email ?? '' }}" required>
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[person_country_id]" required>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->company_information->person_country_id ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[person_county_id]" required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->company_information->person_county_id ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[person_locality]" value="{{ $order->company_information->person_locality ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[person_address]" value="{{ $order->company_information->person_address ?? '' }}" required>
                            </div>
                        </div>
                    </div>

                    <div id="organization-billing-container" class="mt-32 {{ $order->billing_type == 1 ? '' : 'hidden' }}">
                        <div class="grid grid-2 gap-lg">
                            <div class="form-group">
                                <label>Nume societate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_name]" value="{{ $order->company_information->organization_name ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>CUI <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_cui]" value="{{ $order->company_information->organization_cui ?? '' }}" required>
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" name="company_information[organization_phone]" value="{{ $order->company_information->organization_phone ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" name="company_information[organization_email]" value="{{ $order->company_information->organization_email ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Banca</label>
                                <input class="form-control w-full" type="text" name="company_information[organization_bank]" value="{{ $order->company_information->organization_bank ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>IBAN</label>
                                <input class="form-control w-full" type="text" name="company_information[organization_bank_account]" value="{{ $order->company_information->organization_bank_account ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg">
                            <div class="form-group">
                                <label>Nume persoana de contact</label>
                                <input class="form-control w-full" type="text" name="company_information[contact_person_last_name]" value="{{ $order->company_information->contact_person_last_name ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Prenume persoana de contact</label>
                                <input class="form-control w-full" type="text" name="company_information[contact_person_first_name]" value="{{ $order->company_information->contact_person_first_name ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[organization_country_id]" required>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->company_information->organization_country_id ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[organization_county_id]" required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->company_information->organization_county_id ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_locality]" value="{{ $order->company_information->organization_locality ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="company_information[organization_address]" value="{{ $order->company_information->organization_address ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between col flex-md align-center">
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
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_last_name]" value="{{ $order->delivery_information->delivery_last_name ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Prenume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_first_name]" value="{{ $order->delivery_information->delivery_first_name ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" name="delivery_information[delivery_phone]" value="{{ $order->delivery_information->delivery_phone ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" name="delivery_information[delivery_email]" value="{{ $order->delivery_information->delivery_email ?? '' }}" required>
                            </div>
                        </div>
                        <div class="grid grid-3 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="delivery_information[delivery_country_id]" required>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->delivery_information->delivery_country_id ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="delivery_information[delivery_county_id]" required>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->delivery_information->delivery_county_id ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_locality]" value="{{ $order->delivery_information->delivery_locality ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" name="delivery_information[delivery_address]" value="{{ $order->delivery_information->delivery_address ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between col flex-md align-center">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-1">Inapoi la facturare</button>
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
                            <div class="title mb-8">Ramburs</div>
                            <img src="{{ asset('resources/icons/delivery.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ramburs" data-checked="false">
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
                        <input type="hidden" name="payment_method" id="payment_method">
                    </div>
                </div>
                <div class="flex justify-between col flex-md align-center gap-md">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-2">Inapoi la livrare</button>
                    <button type="button" class="btn btn-blue rounded-xl large-width btn-disabled" id="go-to-step-4">Mergi la sumar comanda</button>
                </div>
            </div>

            <!-- Pasul 4: Sumar Comanda -->
            <div class="step col" id="step4">
                <div class="grid grid-3 gap-xs mb-8">
                    <div class="inputs">
                        <h5 class="m-0 mb-8">Facturare</h5>
                        <div id="summary_billing_type">
                            Tip facturare:
                            <span>{{ $order->billing_type == 1 ? 'Persoana Juridica' : 'Persoana Fizica' }}</span>
                        </div>
                        <div id="summary_billing_name">
                            Nume:
                            <span>
                                {{ $order->billing_type == 1 ? $order->company_information->organization_name : $order->company_information->person_first_name . ' ' . $order->company_information->person_last_name }}
                            </span>
                        </div>
                        <div id="summary_billing_phone">
                            Numar de telefon:
                            <span>
                                @if($order->billing_type == 1)
                                    {{ $order->company_information->organization_phone ?? 'N/A' }}
                                @else
                                    {{ $order->company_information->person_phone ?? 'N/A' }}
                                @endif
                            </span>
                        </div>
                        {{-- <div id="summary_billing_email">
                            Email:
                            <span>{{ $order->billing_type == 1 ? $order->company_information->organization_email : $order->company_information->person_email }}</span>
                        </div> --}}
                        <div id="summary_billing_county_name">
                            Judet:
                            <span>{{ $order->billing_type == 1 ? $order->company_information->organization_county_id : $order->company_information->person_county_id }}</span>
                        </div>
                        <div id="summary_billing_city_name">
                            Localitate:
                            <span>{{ $order->billing_type == 1 ? $order->company_information->organization_locality : $order->company_information->person_locality }}</span>
                        </div>
                        <div id="summary_billing_address">
                            Adresa:
                            <span>{{ $order->billing_type == 1 ? $order->company_information->organization_address : $order->company_information->person_address }}</span>
                        </div>
                        @if ($order->billing_type == 1)
                            <div id="summary_billing_cui">
                                CUI:
                                <span>{{ $order->company_information->organization_cui }}</span>
                            </div>
                            <div id="summary_billing_bank">
                                Banca:
                                <span>{{ $order->company_information->organization_bank }}</span>
                            </div>
                            <div id="summary_billing_bank_account">
                                IBAN:
                                <span>{{ $order->company_information->organization_bank_account }}</span>
                            </div>
                        @endif
                        
                    </div>

                    <div class="inputs">
                        <h5 class="m-0 mb-8">Livrare</h5>
                        <div id="summary_delivery_type">
                            Tip livrare:
                            <span>{{ $order->delivery_type == 'curier' ? 'Curier' : 'Ridicare personala' }}</span>
                        </div>
                        <div id="summary_delivery_name">
                            Nume:
                            <span>{{ $order->delivery_information->delivery_first_name . ' ' . $order->delivery_information->delivery_last_name }}</span>
                        </div>
                        <div id="summary_delivery_phone">
                            Numar de telefon:
                            <span>{{ $order->delivery_information->delivery_phone }}</span>
                        </div>
                        <div id="summary_delivery_email">
                            Email:
                            <span>{{ $order->delivery_information->delivery_email }}</span>
                        </div>
                        <div id="summary_delivery_county_name">
                            Judet:
                            <span>{{ $order->delivery_information->delivery_county_id }}</span>
                        </div>
                        <div id="summary_delivery_city_name">
                            Localitate:
                            <span>{{ $order->delivery_information->delivery_locality }}</span>
                        </div>
                        <div id="summary_delivery_address">
                            Adresa:
                            <span>{{ $order->delivery_information->delivery_address }}</span>
                        </div>
                        
                    </div>

                    <div class="inputs">
                        <h5 class="m-0 mb-8">Plata</h5>
                        <div id="summary_payment_method">
                            Metoda de plata:
                            <span>{{ ucfirst(str_replace('-', ' ', $order->payment_method)) }}</span>
                        </div>
                    </div>
                </div>
                <div class="inputs mb-32 scrollable-x">
                    <table class="mb-32">
                        <thead>
                            <th>Denumirea produselor si a serviciilor</th>
                            <th>Cantitate</th>
                            <th>Pret unitar</th>
                            <th>Valoare</th>
                            <th>TVA</th>
                        </thead>
                        <tbody>
                            @foreach ($ordered_products as $ordered_product)
                                @php
                                    $price = $ordered_product->pivot->price;
                                    $price_no_vat = $ordered_product->pivot->price_no_vat;
                                    $quantity = $ordered_product->pivot->quantity;
                                    $tva = ($price - $price_no_vat) * $quantity;
                                    $value = $price_no_vat * $quantity;
                                @endphp
                                <tr>
                                    <td class="ta_l comanda_product_title">{{ $ordered_product->name }}</td>
                                    <td class="ta_c">{{ $quantity }}</td>
                                    <td class="ta_r">{{ number_format($price_no_vat, 2, '.', '') }}</td>
                                    <td class="ta_r">{{ number_format($value, 2, '.', '') }}</td>
                                    <td class="ta_r">{{ number_format($tva, 2, '.', '') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Cost livrare</td>
                                <td>1</td>
                                <td id="transport_unitary">-</td>
                                <td id="transport_value">-</td>
                                <td id="transport_TVA">-</td>
                            </tr>
                            <tr>
                                <td>Cost ramburs</td>
                                <td>1</td>
                                <td id="ramburs_unitary">-</td>
                                <td id="ramburs_value">-</td>
                                <td id="ramburs_TVA">-</td>
                            </tr>
                            <tr>
                                <th colspan="3" class="align-right">Total general:</th>
                                <th colspan="2" id="total_general">{{ number_format($order->total, 2, '.', '') }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-end align-center mb-16">
                        <label class="switch mr-4">
                            <input type="checkbox" id="agreement">
                            <i></i>
                        </label>
                        <p>Sunt de acord cu <a href="{{ url('/confidentialitate-gdpr') }}" target="_blank"><em class="link_color1">politica de confidentialitate</em></a> si <a href="{{ url('/termeni-si-conditii') }}" target="_blank"><em class="link_color1">termeni si conditii</em>.</a></p>
                    </div>
                </div>
                <div class="flex justify-between col flex-md align-center gap-md">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-3">Inapoi la plata</button>
                    <button type="submit" class="btn btn-blue rounded-xl large-width btn-disabled" id="finalize">Finalizeaza comanda</button>
                </div>
            </div>
        </div>
    </form>
</div>



<script>
    // Script pentru gestionarea pașilor
    document.addEventListener('DOMContentLoaded', function () {
        const step1Container = document.getElementById('step1');
        const step2Container = document.getElementById('step2');
        const step3Container = document.getElementById('step3');
        const step4Container = document.getElementById('step4');

        const goToStep2Button = document.getElementById('go-to-step-2');
        const goToStep3Button = document.getElementById('go-to-step-3');
        const goToStep4Button = document.getElementById('go-to-step-4');
        const backToStep1Button = document.getElementById('back-to-step-1');
        const backToStep2Button = document.getElementById('back-to-step-2');
        const backToStep3Button = document.getElementById('back-to-step-3');

        // Evenimente pentru butoanele de trecere între pași
        goToStep2Button.addEventListener('click', function () {
            step1Container.classList.remove('active');
            step2Container.classList.add('active');
        });

        goToStep3Button.addEventListener('click', function () {
            step2Container.classList.remove('active');
            step3Container.classList.add('active');
        });

        goToStep4Button.addEventListener('click', function () {
            step3Container.classList.remove('active');
            step4Container.classList.add('active');
        });

        // Evenimente pentru butoanele de întoarcere între pași
        backToStep1Button.addEventListener('click', function () {
            step2Container.classList.remove('active');
            step1Container.classList.add('active');
        });

        backToStep2Button.addEventListener('click', function () {
            step3Container.classList.remove('active');
            step2Container.classList.add('active');
        });

        backToStep3Button.addEventListener('click', function () {
            step4Container.classList.remove('active');
            step3Container.classList.add('active');
        });

        // Selectarea metodei de plată
        const paymentMethods = document.querySelectorAll('.card .checkbox');
        paymentMethods.forEach(function (method) {
            method.addEventListener('click', function () {
                paymentMethods.forEach(function (el) {
                    el.dataset.checked = 'false';
                    el.querySelector('img').classList.add('hidden');
                });
                this.dataset.checked = 'true';
                this.querySelector('img').classList.remove('hidden');
                document.querySelector('input[name="payment_method"]').value = this.id;
            });
        });

        // Selectarea metodei de livrare
        const deliveryType = document.querySelector('input[name="delivery_type"]');
        document.getElementById('curier').addEventListener('click', function () {
            deliveryType.value = 'curier';
            document.getElementById('curier-container').classList.remove('hidden');
            document.getElementById('ridicare-personala-container').classList.add('hidden');
        });

        document.getElementById('ridicare-personala').addEventListener('click', function () {
            deliveryType.value = 'ridicare-personala';
            document.getElementById('curier-container').classList.add('hidden');
            document.getElementById('ridicare-personala-container').classList.remove('hidden');
        });

        // Gestionarea tipului de facturare
        const billingType = document.querySelector('input[name="billing_type"]');
        document.getElementById('person-billing').addEventListener('click', function () {
            billingType.value = 0;
            document.getElementById('person-billing-container').classList.remove('hidden');
            document.getElementById('organization-billing-container').classList.add('hidden');
        });

        document.getElementById('organization-billing').addEventListener('click', function () {
            billingType.value = 1;
            document.getElementById('organization-billing-container').classList.remove('hidden');
            document.getElementById('person-billing-container').classList.add('hidden');
        });

        // Fetch judete by tara
        const countrySelects = document.querySelectorAll('select[name*="country_id"]');
        countrySelects.forEach(countrySelect => {
            countrySelect.addEventListener('change', function () {
                const countySelect = document.querySelector(`select[name="${this.name.replace('country', 'county')}"]`);
                fetch(`/get-counties-by-country/${this.value}`)
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