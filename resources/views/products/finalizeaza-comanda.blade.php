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
                            <span></span>
                        </div>
                        <div id="summary_billing_name">
                            Nume:
                            <span></span>
                        </div>
                        <div id="summary_billing_phone">
                            Numar de telefon:
                            <span></span>
                        </div>
                        <div id="summary_billing_email">
                            Email:
                            <span></span>
                        </div>
                        <div id="summary_billing_county_name">
                            Judet:
                            <span></span>
                        </div>
                        <div id="summary_billing_city_name">
                            Localitate:
                            <span></span>
                        </div>
                        <div id="summary_billing_address">
                            Adresa:
                            <span></span>
                        </div>
                        <div id="summary_billing_cui">
                            CUI:
                            <span></span>
                        </div>
                        <div id="summary_billing_bank">
                            Banca:
                            <span></span>
                        </div>
                        <div id="summary_billing_bank_account">
                            IBAN:
                            <span></span>
                        </div>
                    </div>
                    <div class="inputs">
                        <h5 class="m-0 mb-8">Livrare</h5>
                        <div id="summary_delivery_type">
                            Tip livrare:
                            <span></span>
                        </div>
                        <div id="summary_delivery_name">
                            Nume:
                            <span></span>
                        </div>
                        <div id="summary_delivery_phone">
                            Numar de telefon:
                            <span></span>
                        </div>
                        <div id="summary_delivery_email">
                            Email:
                            <span></span>
                        </div>
                        <div id="summary_delivery_county_name">
                            Judet:
                            <span></span>
                        </div>
                        <div id="summary_delivery_city_name">
                            Localitate:
                            <span></span>
                        </div>
                        <div id="summary_delivery_address">
                            Adresa:
                            <span></span>
                        </div>
                    </div>
                    <div class="inputs">
                        <h5 class="m-0 mb-8">Plata</h5>
                        <div id="summary_payment_method">
                            Metoda de plata:
                            <span></span>
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
    document.addEventListener('DOMContentLoaded', function () {
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


<script src="{{ asset('resources/scripts/order-scripts/step-1.js') }}"></script>
<script src="{{ asset('resources/scripts/order-scripts/step-2.js') }}"></script>
<script src="{{ asset('resources/scripts/order-scripts/step-3.js') }}"></script>
<script src="{{ asset('resources/scripts/order-scripts/step-4.js') }}"></script>
<script src="{{ asset('resources/scripts/order-scripts/step-5.js') }}"></script>



@endsection