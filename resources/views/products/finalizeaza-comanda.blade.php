@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/order.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#">Produse dorite</a></li></ul>
@endsection

@section('content')
<div class="main-container" id="order-page">
    <form method="POST" action="{{ url('/save-order') }}" id="order_form">
        @csrfWithoutAutocomplete
         <input type="hidden" id="orderr_id" name="order_id" value="{{ $order_id }}">
        @foreach ($ordered_products as $key => $value)
            <input type="hidden" name="product{{ $key }}_id" value="{{ $value->product_id }}">
            <input type="hidden" name="product{{ $key }}_quantity" value="{{ $value->ordered_quantity }}"> 
            <input type="hidden" name="product{{ $key }}_price" value="{{ $value->price }}"> 
            <input type="hidden" name="product{{ $key }}_price_no_tva" value="{{ $value->price_no_vat }}"> 
            <input type="hidden" name="product{{ $key }}_name" value="{{ $value->product->name }}">
            <input type="hidden" name="product{{ $key }}_color" value="{{ $value->product->color }}">
            <input type="hidden" name="product{{ $key }}_packaging" value="{{ $value->product->ambalare }}">
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
                            <button id="auth_lightbox_trigger2" type="button" class="link" role="button" tabindex="0" aria-label="Autentificare">
                                Autentificare
                            </button>
                        </div>
                    @endif

                    @if (!$isGuest)
                        @php
                            $companyInfo = auth()->user() && is_string(auth()->user()->company_information) 
                                ? json_decode(auth()->user()->company_information) 
                                : auth()->user()->company_information;

                            $personLastName = optional($companyInfo)->person_last_name;
                            $personFirstName = optional($companyInfo)->person_first_name;
                            $personPhone = optional($companyInfo)->person_phone;
                            $personEmail = optional($companyInfo)->person_email;
                            $personCountyId = optional($companyInfo)->person_county_id;
                            $personCityId = optional($companyInfo)->person_city_id;
                            $personAddress = optional($companyInfo)->person_address;

                            $organizationName = optional($companyInfo)->organization_name;
                            $organizationCui = optional($companyInfo)->organization_cui;
                            $organizationPhone = optional($companyInfo)->organization_phone;
                            $organizationEmail = optional($companyInfo)->organization_email;
                            $organizationBank = optional($companyInfo)->organization_bank;
                            $organizationBankAccount = optional($companyInfo)->organization_bank_account;
                            $organizationContactLastName = optional($companyInfo)->contact_person_last_name;
                            $organizationContactFirstName = optional($companyInfo)->contact_person_first_name;                     
                            $organizationCountyId = optional($companyInfo)->organization_county_id;
                            $organizationCityId = optional($companyInfo)->organization_city_id;
                            $organizationAddress = optional($companyInfo)->organization_address;
                        @endphp
                    @endif



                    {{-- Persoana fizica --}}
                    <div id="person-billing-container" class="mt-32 {{ optional(auth()->user())->billing_type == 0 ? '' : 'hidden' }}">
                        <div class="grid grid-4 gap-lg p-8">
                            <div class="form-group">
                                <label>Nume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_last_name" name="person_last_name" value="{{$personLastName ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Prenume <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_first_name" name="person_first_name" value="{{ $personFirstName ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" inputmode="numeric" type="tel" pattern="^\+?[0-9]{1,4}?[0-9]{6,14}$" placeholder="Ex: +40700000000" id="person_phone" name="person_phone" value="{{ $personPhone ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="email" id="person_email" name="person_email" value="{{ $personEmail ?? ''}}">
                            </div>
                        </div>

                        <div class="grid grid-4 gap-lg p-8">
                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full height-43px" name="company_information[person_county_id]" id="person_county_id">
                                    <option value="">Selectează județul</option> 
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($companyInfo->person_county_id ?? '') == $county->id ? 'selected' : '' }}>
                                            {{ $county->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Oras <span class="text-red">*</span></label>
                                <select class="form-control w-full height-43px" name="company_information[person_city_id]" id="person_city_id">
                                    <option value="">Selectează orasul</option> 
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ ($companyInfo->person_city_id ?? '') == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="person_address" name="company_information[person_address]" value="{{ $personAddress ?? '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- {Persoana juridica} --}}
                    <div id="organization-billing-container" class="mt-32 {{ optional(auth()->user())->billing_type == 1 ? '' : 'hidden' }}">
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Nume societate <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_name" name="organization_name" value="{{ $organizationName ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>CUI <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_cui" name="organization_cui" value="{{ $organizationCui ?? ''}}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Telefon <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="tel" id="organization_phone" name="organization_phone" pattern="^\+?[0-9]{1,4}?[0-9]{6,14}$" placeholder="Ex: +40700000000" value="{{ $organizationPhone ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_email" name="organization_email" value="{{ $organizationEmail ?? ''}}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Banca</label>
                                <input class="form-control w-full" type="text" id="organization_bank" name="organization_bank" value="{{ $organizationBank ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>IBAN</label>
                                <input class="form-control w-full" type="text" id="organization_bank_account" name="organization_bank_account" value="{{ $organizationBankAccount ?? ''}}">
                            </div>
                        </div>
                        <div class="grid grid-2 gap-lg p-8">
                            <div class="form-group">
                                <label>Nume persoana de contact</label>
                                <input class="form-control w-full" type="text" id="contact_person_last_name" name="contact_person_last_name" value="{{ $organizationContactLastName ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Prenume persoana de contact</label>
                                <input class="form-control w-full" type="text" id="contact_person_first_name" name="contact_person_first_name" value="{{ $organizationContactFirstName ?? ''}}">
                            </div>
                        </div>
                        <div class="grid grid-4 gap-lg p-8">

                            <div class="form-group">
                                <label>Judet <span class="text-red">*</span></label>
                                <select class="form-control w-full height-43px" name="company_information[organization_county_id]" id="organization_county_id">
                                    <option value="">Selectează județul</option> 
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}" {{ ($companyInfo->organization_county_id ?? '') == $county->id ? 'selected' : '' }}>
                                            {{ $county->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Oras <span class="text-red">*</span></label>
                                <select class="form-control w-full height-43px" id="organization_city_id" name="company_information[organization_city_id]">
                                    <option value="">Selectează orasul</option> 
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ ($companyInfo->organization_city_id ?? '') == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Adresa <span class="text-red">*</span></label>
                                <input class="form-control w-full" type="text" id="organization_address" name="company_information[organization_address]" value="{{ $organizationAddress ?? ''}}" >
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
                        <input type="hidden" name="delivery_type" value="{{ $order['delivery_type'] ?? '' }}">
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



                        @if (!$isGuest)
                            @php
                                $deliveryInfo = auth()->user() && is_string(auth()->user()->delivery_information) ? json_decode(auth()->user()->delivery_information): auth()->user()->delivery_information;

                                $deliveryLastName = optional($deliveryInfo)->delivery_last_name;
                                $deliveryFirstName = optional($deliveryInfo)->delivery_first_name;
                                $deliveryPhone = optional($deliveryInfo)->delivery_phone;
                                $deliveryEmail = optional($deliveryInfo)->delivery_email;
                                $deliveryCountyId = optional($deliveryInfo)->delivery_county_id;
                                $deliveryCityId = optional($deliveryInfo)->delivery_city_id;
                                $deliveryAddress = optional($deliveryInfo)->delivery_address;
                            @endphp
                        @endif

                        <div id="delivery-inputs">
                            <div class="grid grid-4 gap-lg p-8">
                                <div class="form-group">
                                    <label>Nume <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_last_name" name="delivery_last_name" value="{{ $deliveryLastName ?? ''  }}">
                                </div>
                                <div class="form-group">
                                    <label>Prenume <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_first_name" name="delivery_first_name" value="{{ $deliveryFirstName ?? ''  }}">
                                </div>
                                <div class="form-group">
                                    <label>Telefon <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="tel" id="delivery_phone" name="delivery_phone" pattern="^\+?[0-9]{1,4}?[0-9]{6,14}$" placeholder="Ex: +40700000000" value="{{ $deliveryPhone ?? ''  }}">
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_email" name="delivery_email" value="{{ $deliveryEmail ?? ''  }}">
                                </div>
                            </div>
                        
                            <div class="grid grid-4 gap-lg p-8">

                                <div class="form-group">
                                    <label>Judet <span class="text-red">*</span></label>
                                    <select class="form-control w-full height-43px" name="delivery_information[delivery_county_id]" id="delivery_county_id">
                                        <option value="">Alege județul</option> 
                                        @foreach ($counties as $county)
                                            <option value="{{ $county->id }}" {{ ($deliveryInfo->delivery_county_id ?? '') == $county->id ? 'selected' : '' }}>
                                                {{ $county->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Oras <span class="text-red">*</span></label>
                                    <select class="form-control w-full height-43px" id="delivery_city_id" name="delivery_information[delivery_city_id]">
                                        <option value="">Alege orasul</option> 
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ ($deliveryInfo->delivery_city_id ?? '') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Adresa <span class="text-red">*</span></label>
                                    <input class="form-control w-full" type="text" id="delivery_address" name="delivery_address" value="{{ $deliveryAddress ?? ''  }}">
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
                        <div class="flex col align-center">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control w-full" type="text" id="email" name="email">
                            </div>
                            <span class="hidden" id="create-account-email"></span>
                            <div class="form-group mt-16">
                                <label>Parola</label>
                                <input class="form-control w-full" type="password" id="password" name="password">
                            </div>
                            <span class="hidden" id="create-account-password"></span>
                        </div>
                    </div>
                    <p class="mt-16">Pentru a crea un cont va trebui doar să definiți o parolă. Restul elementelor sunt cele ce oricum sunt completate.</p>
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
                            <div class="title mb-8">
                                Ramburs
                                <div class="tooltip ml-8">
                                    <img src="{{ asset('resources/new_design/icons/info.svg') }}">
                                    <span class="tooltip_text tooltip_text_top trans_tooltip" id="tooltip_order_body">
                                        <div class="ot_title">Costurile ocazionate de transferul de numerar sunt in cuatum de 3% din valoarea comenzii.</div>
                                    </span>
                                </div>
                            </div>
                            <img src="{{ asset('resources/new_design/icons/delivery.svg') }}" class="mb-8">
                            <button type="button" class="checkbox p-0 flex justify-center align-center" id="ramburs" data-checked="false" aria-label="Ramburs">
                                <img src="{{ asset('resources/new_design/icons/check.svg') }}" class="hidden">
                            </button>
                        </div>
                        <input type="hidden" name="payment_method" id="payment_method" value="{{ $order['payment_method'] ?? '' }}">
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

                            @foreach ($ordered_products as $key => $ordered_product)
                            @php
                                $price = $ordered_product['price'] ?? 0;
                                $price_no_vat = $ordered_product['price_no_vat'] ?? 0;
                                $quantity = $ordered_product['ordered_quantity'] ?? 0;
                                $tva = $price - $price_no_vat;
                                $value = $price_no_vat * $quantity;

                                $total_value += $value;
                                $total_tva += $tva * $quantity;
                                $total_price += $price * $quantity;
                            @endphp
                            <tr>
                                <td class="ta_l comanda_product_title">{{ $ordered_product['name'] ?? '' }}</td>
                                <td class="ta_c">{{ $quantity }}</td>
                                <td class="ta_r">{{ number_format($price_no_vat, 2, '.', '') }}</td>
                                <td class="ta_r">{{ number_format($value, 2, '.', '') }}</td>
                                <td class="ta_r">{{ number_format($tva * $quantity, 2, '.', '') }}</td>
                            </tr>
                            @endforeach


                            {{-- Cost livrare --}}
                            <tr id="transport-row" style="display: none;">
                            {{-- <tr id="transport-row"> --}}
                                <td>
                                    <div class="flex align-center">
                                        Cost livrare
                                        <div class="tooltip ml-8">
                                            <img src="{{ asset('resources/new_design/icons/info.svg') }}">
                                            <span class="tooltip_text tooltip_text_top trans_tooltip" id="tooltip_order_body">
                                                <div class="ot_title">
                                                    <b>Romtehnochim sustine parte din costurile de transport. Astfel, acestea sunt:</b>
                                                </div>
                                                <div class="ot_subtitle">Bucuresti + Imprejurimi</div>
                                                <ul class="ott_ul">
                                                    <li>&lt; 50 Kg: 25 Ron</li>
                                                    <li>50 - 100 Kg: 75 Ron</li>
                                                    <li>100 - 250 Kg: 100 Ron</li>
                                                </ul>
                                                <div class="ot_subtitle"><b>In tara</b></div>
                                                <ul class="ott_ul">
                                                    <li>1 - 10 Kg: 25 Ron</li>
                                                    <li>11 - 50 Kg: 45 Ron</li>
                                                    <li>51 - 100 Kg: 75 Ron</li>
                                                    <li>101 - 200 Kg: 150 Ron</li>
                                                    <li>200 - 250 Kg: 175 Ron</li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>1</td>
                                <td id="transport_unitary">-</td>
                                <td id="transport_value">-</td>
                                <td id="transport_TVA">-</td>
                            </tr>

                            {{-- Cost ramburs --}}
                            <tr id="ramburs-row" style="display: none;">
                                <td>Cost ramburs</td>
                                <td>1</td>
                                <td id="ramburs_unitary">-</td>
                                <td id="ramburs_value">-</td>
                                <td id="ramburs_TVA">-</td>
                            </tr>

                            {{-- Total general --}}
                            <tr>
                                <th colspan="3" class="align-right">Total general:</th>
                                <th colspan="2" id="total_general"></th>
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
    var userPersonCityId = '{{ $order->company_information->person_city_id ?? '' }}';
    var userOrganizationCityId = '{{ $order->company_information->organization_city_id ?? '' }}';
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch cities by county
        const countySelects = document.querySelectorAll('select[name*="county_id"]');
        
        countySelects.forEach(countySelect => {
            const citySelect = document.querySelector(`select[name="${countySelect.name.replace('county', 'city')}"]`);
            
            const selectedCounty = countySelect.value;
            const selectedCity = citySelect.value;

            if (selectedCounty) {
                // If there is a selected county, load the cities for that county
                fetch(`/get-cities-by-county/${selectedCounty}`)
                    .then(response => response.json())
                    .then(data => {
                        citySelect.innerHTML = '<option value="">Selectează orasul</option>';
                        data.forEach(city => {
                            citySelect.innerHTML += `<option value="${city.id}" ${city.id == selectedCity ? 'selected' : ''}>${city.name}</option>`;
                        });
                    });
            } else {
                // If there is no county, have the option to select the city
                citySelect.innerHTML = '<option value="">Selectează orasul</option>';
            }

            countySelect.addEventListener('change', function () {
                if (this.value === "") {
                    // If a county is selected, reset the dropdown for cities
                    citySelect.innerHTML = '<option value="">Selectează orasul</option>';
                } else {
                    // If a valid county is selected, load the necessary cities
                    fetch(`/get-cities-by-county/${this.value}`)
                        .then(response => response.json())
                        .then(data => {
                            citySelect.innerHTML = '<option value="">Selectează orasul</option>';
                            data.forEach(city => {
                                citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                            });
                        });
                }
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
