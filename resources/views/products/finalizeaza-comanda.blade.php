@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#">Produse dorite</a></li></ul>
@endsection

@section('content')
<div class="main-container" id="order-page">
    <form method="POST" action="{{ url('/save-order') }}" id="order_form">
        @csrf
        <input type="hidden" id="orderr_id" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="ordered_products_number" value="{{ $ordered_products->count() }}">
        @foreach ($ordered_products as $key => $value)
            <input type="hidden" name="product{{ $key }}_id" value="{{ $value->product_id }}">
            <input type="hidden" name="product{{ $key }}_quantity" value="{{ $value->pivot->quantity }}">
            <input type="hidden" name="product{{ $key }}_price" value="{{ $value->pivot->price }}">
            <input type="hidden" name="product{{ $key }}_price_no_tva" value="{{ $value->pivot->price_no_vat }}">
            <input type="hidden" name="product{{ $key }}_name" value="{{ $value->product->name }}">
            <input type="hidden" name="product{{ $key }}_color" value="{{ $value->product->color }}">
            <input type="hidden" name="product{{ $key }}_packaging" value="{{ $value->product->ambalare }}">
            <input type="hidden" name="product{{ $key }}_addon_quantity" value="{{ $value->pivot->addon_quantity }}">
        @endforeach

        <div class="flex justify-center mt-32">
            <div class="steps flex align-center">
                <div class="step flex col align-center active" id="header-step1">
                    <div class="circle flex justify-center align-center">
                        1
                    </div>
                    <div class="step-title">
                        Facturare
                    </div>
                </div>
                <div class="divider"></div>
                <div class="step flex col align-center" id="header-step2">
                    <div class="circle flex justify-center align-center">
                        2
                    </div>
                    <div class="step-title">
                        Livrare
                    </div>
                </div>
                <div class="divider"></div>
                @if ($isGuest)
                    <div class="step flex col align-center" id="header-step3">
                        <div class="circle flex justify-center align-center">
                            3
                        </div>
                        <div class="step-title">
                            Creare cont
                        </div>
                    </div>
                    <div class="divider"></div>
                @endif
                <div class="step flex col align-center" id="header-step4">
                    <div class="circle flex justify-center align-center">
                        {{ $isGuest ? '4' : '3' }}
                    </div>
                    <div class="step-title">
                        Plata
                    </div>
                </div>
                <div class="divider"></div>
                <div class="step flex col align-center" id="header-step5">
                    <div class="circle flex justify-center align-center">
                        {{ $isGuest ? '5' : '4' }}
                    </div>
                    <div class="step-title">
                        Finalizeaza
                    </div>
                </div>
            </div>
        </div>

        {{-- STEP 1 --}}
        <div class="step-container mt-32">
            <div class="step active col" id="step1">
                <div class="inputs mb-32">
                    <div class="flex justify-center w-full">
                        <div class="checkboxes-row">
                            <button type="button" class="checkbox flex justify-between" id="organization-billing" data-checked="{{ optional(auth()->user())->billing_type == 1 ? 'true' : 'false' }}">
                                <p class="title">Persoana Juridica</p>
                                <img src="{{ asset('resources/new_design/icons/persoana-juridica.svg') }}">
                            </button>
                            <button type="button" class="checkbox flex justify-between" id="person-billing" data-checked="{{ optional(auth()->user())->billing_type == 0 ? 'true' : 'false' }}">
                                <p class="title">Persoana Fizica</p>
                                <img src="{{ asset('resources/new_design/icons/persoana-fizica.svg') }}">
                            </button>
                        </div>
                        {{-- <input type="hidden" name="billing_type" value="{{ $order->billing_type }}"> --}}
                        <input type="hidden" name="billing_type" value="{{ auth()->check() ? optional(auth()->user())->billing_type : 0 }}">

                    </div>

                    {{-- @if ($isGuest)
                        <div class="guest-row">
                            Ai deja cont?
                            <button id="auth_lightbox_trigger" class="link" on="tap:auth-lightbox" role="button" tabindex="0" type="button">
                                Autentificare
                            </button>
                        </div>
                    @endif --}}

                    @if ($isGuest)
                        <div class="guest-row">
                            Ai deja cont?
                            <button id="auth_lightbox_trigger2" class="link" role="button" tabindex="0" aria-label="Autentificare">
                                Autentificare
                            </button>
                        </div>
                    @endif


                    {{-- Persoana fizica --}}
                    <div id="person-billing-container" class="mt-32 {{ optional(auth()->user())->billing_type == 0 ? '' : 'hidden' }}">
                        <div class="grid grid-4 gap-lg p-8">
                            <div class="form-group">
                                <label>Nume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_last_name" name="person_last_name" value="{{ $order->company_information->person_last_name ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Prenume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_first_name" name="person_first_name" value="{{ $order->company_information->person_first_name ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" inputmode="numeric" type="tel" pattern="^\+?[0-9]{1,4}?[0-9]{6,14}$" placeholder="Ex: +40700000000" id="person_phone" name="person_phone" value="{{ $order->company_information->person_phone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" id="person_email" name="person_email" value="{{ $order->company_information->person_email ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-4 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[person_country_id]">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->company_information->person_country_id ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[person_county_id]" id="person_county_id">
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->company_information->person_county_id ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_locality_id" name="company_information[person_locality]" value="{{ $order->company_information->person_locality ?? '' }}" >
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_address" name="company_information[person_address]" value="{{ $order->company_information->person_address ?? '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- {Persoana juridica} --}}
                    <div id="organization-billing-container" class="mt-32 {{ optional(auth()->user())->billing_type == 1 ? '' : 'hidden' }}">
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Nume societate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_name" name="organization_name" value="{{ $order->company_information->organization_name ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>CUI <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_cui" name="organization_cui" value="{{ $order->company_information->organization_cui ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" id="organization_phone" name="organization_phone" pattern="^\+?[0-9]{1,4}?[0-9]{6,14}$" placeholder="Ex: +40700000000" value="{{ $order->company_information->organization_phone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_email" name="organization_email" value="{{ $order->company_information->organization_email ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Banca</label>
                                <input class="form-control w-full" type="text" id="organization_bank" name="organization_bank" value="{{ $order->company_information->organization_bank ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>IBAN</label>
                                <input class="form-control w-full" type="text" id="organization_bank_account" name="organization_bank_account" value="{{ $order->company_information->organization_bank_account ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Nume persoana de contact</label>
                                <input class="form-control w-full" type="text" id="contact_person_last_name" name="contact_person_last_name" value="{{ $order->company_information->contact_person_last_name ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Prenume persoana de contact</label>
                                <input class="form-control w-full" type="text" id="contact_person_first_name" name="contact_person_first_name" value="{{ $order->company_information->contact_person_first_name ?? '' }}">
                            </div>
                        </div>
                        <div class="grid grid-4 gap-lg">
                            <div class="form-group">
                                <label>Tara <span class="text-red">*</span></label>
                                <select class="form-control w-full" name="company_information[organization_country_id]">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ ($order->company_information->organization_country_id ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full" id="organization_county_id" name="company_information[organization_county_id]">
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($order->company_information->organization_county_id ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Localitate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_locality_id" name="company_information[organization_locality]" value="{{ $order->company_information->organization_locality ?? '' }}" >
                            </div>
                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_address" name="company_information[organization_address]" value="{{ $order->company_information->organization_address ?? '' }}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end col flex-md align-center">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="go-to-step-2">Continua la livrare</button>
                </div>
            </div>


            {{-- STEP 2 --}}
            <div class="step col" id="step2">
                <div class="inputs mb-32">
                    <div class="flex justify-center w-full">
                        <div class="card flex col align-center">
                            <div class="title mb-8">
                                Curier
                            </div>
                            <img src="{{ asset('resources/new_design/icons/delivery.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="curier" data-checked="false" aria-label="Curier">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">
                                Ridicare personala
                            </div>
                            <img src="{{ asset('resources/new_design/icons/location.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ridicare-personala" data-checked="false" aria-label="Ridicare personala">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <input type="hidden" name="delivery_type" value="{{ $order->delivery_type }}">
                    </div>
                    <div id="curier-container" class="hidden mt-32">
                        <div class="flex justify-center align-center mb-16">
                            <label class="switch">
                                <input type="checkbox" id="delivery-same-as-billing" name="delivery_data_same_as_billing">
                                <i></i>
                            </label>
                            <p class="italic ml-4">
                                Datele de livrare sunt aceleasi cu datele de facturare
                            </p>
                        </div>

                        <div id="delivery-inputs">
                            <div class="grid grid-4 gap-lg p-8">
                                <div class="form-group">
                                    <label>Nume <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_last_name" name="delivery_last_name" value="{{ $order->delivery_information->delivery_last_name ?? '' }}" >
                                </div>
                                <div class="form-group">
                                    <label>Prenume <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_first_name" name="delivery_first_name" value="{{ $order->delivery_information->delivery_first_name ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Telefon <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="tel" id="delivery_phone" name="delivery_phone" pattern="^\+?[0-9]{1,4}?[0-9]{6,14}$" placeholder="Ex: +40700000000" value="{{ $order->delivery_information->delivery_phone ?? '' }}" >
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_email" name="delivery_email" value="{{ $order->delivery_information->delivery_email ?? '' }}">
                                </div>
                            </div>

                           
                            <div class="grid grid-4 gap-lg p-8">
                                <div class="form-group">
                                    <label>Tara <span class="text-red">*</span></label>
                                    <select class="form-control w-full" name="delivery_information[delivery_country_id]">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ ($order->delivery_information->delivery_country_id ?? '') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judet <span class="text-red">*</span></label>
                                    <select class="form-control w-full" id="delivery_county_id" name="delivery_information[delivery_county_id]">
                                        <option value="">Alege judetul</option>
                                        @foreach ($counties as $county)
                                            <option value="{{ $county->id }}" {{ ($order->delivery_information->delivery_county_id ?? '') == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Localitate <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_locality" name="delivery_locality" value="{{ $order->delivery_information->delivery_locality ?? '' }}" >
                                </div>
                                <div class="form-group">
                                    <label>Adresa <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_address" name="delivery_address" value="{{ $order->delivery_information->delivery_address ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end col flex-md align-center gap-md">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-1">Inapoi la facturare</button>
                    <button type="button" class="btn btn-blue rounded-xl large-width btn-disabled" id="go-to-step-3">
                        {{ $isGuest ? 'Continua' : 'Mergi la plata' }}
                    </button>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div class="step col" id="step3">
                <div class="inputs mb-32">
                    <div class="flex justify-center align-center mb-16">
                        <label class="switch">
                            <input type="checkbox" id="create-account" name="create_account">
                            <i></i>
                        </label>
                        <p class="italic ml-4">Vreau cont</p>
                    </div>

                    <div id="order_register" class="hidden">
                        <div id="email_error" class="hidden">Adresa de email introdusa corespunde deja unui cont!</div>
                        <div class="flex col align-center">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control w-full" type="text" id="email" name="email">
                            </div>
                            <div class="form-group mt-16">
                                <label>Parola</label>
                                <input class="form-control w-full" type="password" id="password" name="password">
                            </div>
                        </div>
                    </div>
                    <p>Pentru a crea un cont va trebui doar să definiți o parolă. Restul elementelor sunt cele ce oricum sunt completate.</p>
                    <p>Contul, însă, vă va permite să parcurgeți comenzi anterioare, să descărcați facturi și, mai ales, să păstrați produse în lista de favorite, pe care să le puteți comanda ulterior, fără să mai trebuiască să parcurgeți o altă căutare.</p>
                </div>
                <div class="flex justify-end col flex-md align-center gap-md">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-2">Inapoi la livrare</button>
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="go-to-step-4">Mergi la plata</button>
                </div>
            </div>

            {{-- STEP 4 --}}
            <div class="step col" id="step4">
                <div class="inputs mb-32">
                    <div class="flex justify-center w-full wrap">
                        <div class="card flex col align-center">
                            <div class="title mb-8">Card</div>
                            <img src="{{ asset('resources/new_design/icons/card.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="card" data-checked="false" aria-label="Card">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">Transfer bancar</div>
                            <img src="{{ asset('resources/new_design/icons/bank-transfer.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="transfer-bancar" data-checked="false" aria-label="Transfer bancar">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center">
                            <div class="title mb-8">Ordin de plata</div>
                            <img src="{{ asset('resources/new_design/icons/payment-order.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ordin-de-plata" data-checked="false" aria-label="Ordin de plata">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center" id="rambursCard">
                            <div class="title mb-8">Ramburs</div>
                            <img src="{{ asset('resources/new_design/icons/delivery.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ramburs" data-checked="false" aria-label="Ramburs">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <div class="card flex col align-center" id="cashCard">
                            <div class="title mb-8">Cash</div>
                            <img src="{{ asset('resources/new_design/icons/location.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="cash" data-checked="false" aria-label="Cash">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <input type="hidden" name="payment_method" id="payment_method" value="{{ $order->payment_method }}">
                    </div>
                </div>
                <div class="flex justify-end col flex-md align-center gap-md">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-3">
                        {{ $isGuest ? 'Inapoi la creare cont' : 'Inapoi la livrare' }}
                    </button>
                    <button type="button" class="btn btn-blue rounded-xl large-width btn-disabled" id="go-to-step-5">Mergi la sumar comanda</button>
                </div>
            </div>

            <div class="step col" id="step5">
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
                            @php
    $total_value = 0;
    $total_price = 0;
    $total_tva = 0;
@endphp

@foreach ($ordered_products as $ordered_product)
    @php
        $price = $ordered_product->pivot->price;
        $price_no_vat = $ordered_product->pivot->price_no_vat;
        $quantity = $ordered_product->pivot->quantity;
        $tva = $price - $price_no_vat;
        $value = $price_no_vat * $quantity;

        $total_value += $value;
        $total_tva += $tva * $quantity;
        $total_price += $price * $quantity;
    @endphp
    <tr>
        <td class="ta_l comanda_product_title">{!! $ordered_product->product->name !!}</td>
        <td class="ta_c">{{ $quantity }}</td>
        <td class="ta_r">{{ number_format($price_no_vat, 2, '.', '') }}</td>
        <td class="ta_r">{{ number_format($value, 2, '.', '') }}</td>
        <td class="ta_r">{{ number_format($tva * $quantity, 2, '.', '') }}</td>
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
    <th colspan="2" id="total_general">{{ number_format($total_price, 2, '.', '') }}</th>
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
                <div class="flex justify-end col flex-md align-center gap-md">
                    <button type="button" class="btn btn-blue rounded-xl large-width" id="back-to-step-4">Inapoi la plata</button>
                    <button type="submit" class="btn btn-blue rounded-xl large-width btn-disabled" id="finalize">Finalizeaza comanda</button>
                </div>
            </div>
        </div>
    </form>
</div>




<script>
    var baseUrl = '{{ url('/') }}';
    var isGuest = {{ $isGuest ? 'true' : 'false' }};
    var totalPrice = '{{ number_format($total_price, 2, '.', '') }}';
    var totalValue = '{{ number_format($total_value, 2, '.', '') }}';
    var totalTva = '{{ number_format($total_tva, 2, '.', '') }}';
    var userPersonLocalityId = '{{ $order->company_information->person_locality_id ?? '' }}';
    var userOrganizationLocalityId = '{{ $order->company_information->organization_locality_id ?? '' }}';
    // var userDeliveryLocalityId = '{{ $order->delivery_information->delivery_locality ?? '' }}';
</script>

<!-- Step 1 -->
<script src="{{ asset('resources/scripts/order-scripts/step-1.js') }}"></script>

<!-- Step 2 -->
<script src="{{ asset('resources/scripts/order-scripts/step-2.js') }}"></script>

<!-- Step 3 -->
<script src="{{ asset('resources/scripts/order-scripts/step-3.js') }}"></script>

<!-- Step 4 -->
<script src="{{ asset('resources/scripts/order-scripts/step-4.js') }}"></script>

<!-- Step 5 -->
<script src="{{ asset('resources/scripts/order-scripts/step-5.js') }}"></script>

<!-- Bring cities dynamically -->
{{-- <script src="{{ asset('resources/scripts/order-scripts/bring-cities.js') }}"></script> --}}

{{-- Get Counties --}}
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

    document.getElementById('auth_lightbox_trigger2').addEventListener('click', function() {
        var authContainer = document.querySelector('.autentificare-1');
        authContainer.style.opacity = '1';
        authContainer.style.display = 'inline-block';
        document.getElementById('auth-lightbox').style.display = 'flex';
    });
</script>

@endsection
