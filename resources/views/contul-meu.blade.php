@extends('layout.layout')

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#">Produse dorite</a></li></ul>
@endsection

@section('content')
<div class="main-container" id="contul_meu_row">
    <h2>Contul meu</h2>
    <div class="tabs w-full grid grid-5 gap-lg" id="product_tabs">
        <div id="detalii-cont" class="tab btn btn-blue active" onclick="showTab('detalii-cont')">Detalii cont</div>
        <div id="facturare" class="tab btn btn-blue" onclick="showTab('facturare')">Facturare</div>
        <div id="livrare" class="tab btn btn-blue" onclick="showTab('livrare')">Livrare</div>
        <div id="schimb-parola" class="tab btn btn-blue" onclick="showTab('schimb-parola')">Schimb parola</div>
        <div id="istoric" class="tab btn btn-blue" onclick="showTab('istoric')">Istoric</div>
    </div>
    <div id="tabs-content-big">
        <!-- Detalii cont -->
        <div id="detalii-cont-content" class="tab-content">
            <form action="{{ url('/save-detalii-cont') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="active_tab" id="active_tab_detalii_cont">
                <div class="grid grid-2 gap-md">
                    <div class="form-group">
                        <label>Nume</label>
                        <input class="w-full" type="text" name="last_name" value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label>Prenume</label>
                        <input class="w-full" type="text" name="first_name" value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="w-full" type="text" name="email" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input class="w-full" type="text" name="phone" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="w-full row justify-center mt-32">
                    <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                </div>
            </form>
        </div>

        @php
            $companyInformation = is_string($user->company_information) ? json_decode($user->company_information, true) : $user->company_information;
            $deliveryInformation = is_string($user->delivery_information) ? json_decode($user->delivery_information, true) : $user->delivery_information;
        @endphp

        <!-- Facturare -->
        <div id="facturare-content" class="tab-content" style="display:none;">
            <form class="col" action="{{ url('/save-facturare') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="active_tab" id="active_tab_facturare">
                <div class="w-full form-group">
                    <label>Metoda facturare:</label>
                    <select class="w-full" name="billing_type" id="billing-type">
                        <option value="" @if ($user->billing_type === null) selected @endif>Selecteaza metoda de facturare</option>
                        <option id="person-billing-option" value="0" @if ($user->billing_type === 0) selected @endif>Persoana fizica</option>
                        <option id="organization-billing-option" value="1" @if ($user->billing_type === 1) selected @endif>Persoana juridica</option>
                    </select>
                </div>
                <!-- Facturare persoana fizica -->
                <div class="col mt-16" id="person-billing" style="display:none;">
                    <div class="grid grid-2 gap-md">
                        <div class="form-group">
                            <label>Nume</label>
                            <input class="w-full" type="text" name="person_last_name" value="{{ $companyInformation['person_last_name']  ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Prenume</label>
                            <input class="w-full" type="text" name="person_first_name" value="{{ $companyInformation['person_first_name'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <input class="w-full" type="text" name="person_phone" value="{{ $companyInformation['person_phone'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Tara</label>
                            <select class="w-full" name="person_country_id" id="person_country_id">
                                <option value="">Alege tara</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if (($companyInformation['person_country_id'] ?? null) == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judet</label>
                            <select class="w-full" name="person_county_id" id="person_county_id" data-selected-county="{{ $companyInformation['person_county_id'] ?? '' }}">
                                <option value="">Alege judetul</option>
                                @foreach ($counties as $county)
                                    <option value="{{ $county->id }}" @if (($companyInformation['person_county_id'] ?? null) == $county->id) selected @endif>{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Localitate</label>
                            <input class="w-full" type="text" name="person_locality" value="{{ $companyInformation['person_locality'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Adresa</label>
                            <input class="w-full" type="text" name="person_address" value="{{ $companyInformation['person_address'] ?? '' }}">
                        </div>
                    </div>
                    <div class="w-full row justify-center mt-32">
                        <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                    </div>
                </div>
                <!-- Facturare persoana juridica -->
                <div class="col mt-16" id="organization-billing" style="display:none;">
                    <div class="grid grid-2 gap-md">
                        <div class="form-group">
                            <label>Nume societate</label>
                            <input class="w-full" type="text" name="organization_name" value="{{ $companyInformation['organization_name'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>CUI</label>
                            <input class="w-full" type="text" name="organization_cui" value="{{ $companyInformation['organization_cui'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Banca</label>
                            <input class="w-full" type="text" name="organization_bank" value="{{ $companyInformation['organization_bank'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>IBAN</label>
                            <input class="w-full" type="text" name="organization_bank_account" value="{{ $companyInformation['organization_bank_account'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Nume persoana de contact</label>
                            <input class="w-full" type="text" name="contact_person_last_name" value="{{ $companyInformation['contact_person_last_name'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Prenume persoana de contact</label>
                            <input class="w-full" type="text" name="contact_person_first_name" value="{{ $companyInformation['contact_person_first_name'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Tara</label>
                            <select class="w-full" name="organization_country_id" id="organization_country_id">
                                <option value="">Alege tara</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if (($user->company_information->organization_country_id ?? null) == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judet</label>
                            <select class="w-full" name="organization_county_id" id="organization_county_id">
                                <option value="">Alege judetul</option>
                                @foreach ($counties as $county)
                                    <option value="{{ $county->id }}" @if (($user->company_information->organization_county_id ?? null) == $county->id) selected @endif>{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Localitate</label>
                            <input class="w-full" type="text" name="organization_locality" value="{{ $companyInformation['organization_locality'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Adresa</label>
                            <input class="w-full" type="text" name="organization_address" value="{{ $companyInformation['organization_bank_address'] ?? '' }}">
                        </div>
                    </div>
                    <div class="w-full row justify-center mt-32">
                        <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Livrare -->
        <div id="livrare-content" class="tab-content" style="display:none;">
            <form class="col" action="{{ url('/save-livrare') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="active_tab" id="active_tab_livrare">
                <h5>Persoana de contact</h5>
                <div class="grid grid-4 gap-md">
                    <div class="form-group">
                        <label>Nume</label>
                        <input class="w-full" type="text" name="delivery_last_name" value="{{ $deliveryInformation['delivery_last_name'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Prenume</label>
                        <input class="w-full" type="text" name="delivery_first_name" value="{{ $deliveryInformation['delivery_first_name'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input class="w-full" type="text" name="delivery_phone" value="{{ $deliveryInformation['delivery_phone'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="w-full" type="text" name="delivery_email" value="{{ $deliveryInformation['delivery_email'] ?? '' }}">
                    </div>
                </div>
                <h5 class="mt-32">Adresa de livrare</h5>
                <div class="grid grid-3 gap-md">
                    <div class="form-group">
                        <label>Tara</label>
                        <select class="w-full" name="delivery_country_id" id="delivery_country_id">
                            <option value="">Alege tara</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if (($deliveryInformation['delivery_country_id'] ?? null) == $country->id) selected @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judet</label>
                        <select class="w-full" name="delivery_county_id" id="delivery_county_id">
                            <option value="">Alege judetul</option>
                            @foreach ($counties as $county)
                                <option value="{{ $county->id }}" @if (($deliveryInformation['delivery_county_id'] ?? null) == $county->id) selected @endif>{{ $county->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Localitate</label>
                        <input type="text" class="w-full" name="delivery_locality" value="{{ $deliveryInformation['delivery_locality'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Adresa</label>
                        <input class="w-full" type="text" name="delivery_address" value="{{ $deliveryInformation['delivery_address'] ?? '' }}">
                    </div>
                </div>
                <div class="w-full row justify-center mt-32">
                    <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                </div>
            </form>
        </div>

        <!-- Schimb parola -->
        <div id="schimb-parola-content" class="tab-content" style="display:none;">
            <form class="col" action="{{ url('/save-schimba-parola') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="active_tab" id="active_tab_schimb_parola">
                <div class="grid grid-2 gap-md">
                    <div class="form-group">
                        <label>Parola Curenta</label>
                        <input class="w-full" type="password" name="current_password">
                    </div>
                    <div class="form-group">
                        <label>Parola Noua</label>
                        <input class="w-full" type="password" name="new_password">
                    </div>
                </div>
                <div class="w-full row justify-center mt-32">
                    <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                </div>
            </form>
        </div>

        <!-- Istoric -->
        <div id="istoric-content" class="tab-content" style="display:none;">
            <div class="tabs-content" id="tabsCM">
                @php $visCount = 0; @endphp
                @foreach ($orders as $order)
                    @php $visCount++; @endphp
                    <div class="w-full p-8 order-history">
                        <div class="sent_ordered_products">
                            <div class="flex grid grid-6 w-full align-center p-8">
                                <div class="col-span-2">
                                    <h3 class="order-identifier">Comanda nr. EMEX-{{ sprintf('%05d', $order->id) }}</h3>
                                </div>
                                <div class="col-span-3">
                                    <p>Plasata pe: {{ $order->created_at->format('d-m-Y') }} | Total: <strong>{{ number_format($order->total, 2) }} Lei</strong></p>
                                </div>
                                <div class="flex justify-end">
                                    <button role="button" class="btn btn-blue rounded-sm" onclick="toggleDetails({{ $visCount }})">
                                        detalii comanda
                                    </button>
                                </div>
                            </div>
                            <div id="details-{{ $visCount }}" class="history_products_list hide">
                                <table class="styled w-full">
                                    <thead>
                                        <tr>
                                            <th>Nume produs</th>
                                            <th>Cantitate</th>
                                            <th>Ambalare</th>
                                            <th>Mentiuni</th>
                                            <th>Pret (RON)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->productVariations as $productVariation)
                                            <tr>
                                                <td>{{ $productVariation->product->plain_name }}</td>
                                                <td>{{ $productVariation->pivot->quantity }}</td>
                    
                                                <td>{{ $productVariation->quantity }} {{ $productVariation->measurementUnit->name ?? '-' }}</td>

                                                <td>{{ $productVariation->pivot->mentions ?? '-' }}</td>
                                                <td>{{ number_format($productVariation->pivot->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="flex ml-8 mt-16 mb-16">
                                    @php
                                    $proformaPath = $order->proforma ? $order->proforma->path : null;
                                    // $proformaUrl = asset('storage/' . $proformaPath);
                                    $proformaUrl = $proformaPath && file_exists(storage_path('app/public/' . $proformaPath)) ? asset('storage/' . $proformaPath) : null;
                                    @endphp
                                    {{-- <a href="{{$proformaUrl}}" target="_blank">
                                        <button class="btn btn-blue-outline rounded-sm">Descarcă proforma</button>
                                    </a> --}}
                                    @if ($proformaUrl)
                                        <a href="{{ $proformaUrl }}" target="_blank">
                                            <button class="btn btn-blue-outline rounded-sm">Descarcă proforma</button>
                                        </a>
                                    @else
                                        <p class="text-gray-500">Proforma indisponibilă</p>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>

<script>
    function showTab(tabId) {
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => tab.classList.remove('active'));
        contents.forEach(content => content.style.display = 'none');
        document.getElementById(tabId).classList.add('active');
        document.getElementById(tabId + '-content').style.display = 'block';

        // Actualizează hash-ul în URL
        window.location.hash = tabId;
        
        setTimeout(function() {
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'  
            });
        }, 250);  
    }

    function toggleDetails(id) {
        const details = document.getElementById('details-' + id);
        details.classList.toggle('hide');
        details.classList.toggle('show');

        const button = details.closest('.sent_ordered_products').querySelector('button');
            if (details.classList.contains('show')) {
            button.textContent = 'ascunde detalii';
        } else {
            button.textContent = 'detalii comanda';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('form');

        forms.forEach(form => {
            form.addEventListener('submit', function () {
                // Obține hash-ul curent din URL
                const activeTab = window.location.hash.substring(1);

                // Dacă nu există un hash activ, selectăm implicit tab-ul "detalii-cont"
                const tabToSend = activeTab ? activeTab : 'detalii-cont';

                // Găsește input-ul hidden corect în funcție de formularul pe care îl trimiți
                const activeTabInput = form.querySelector('input[name="active_tab"]');
                
                if (activeTabInput) {
                    activeTabInput.value = tabToSend;
                }

                // Actualizăm URL-ul cu hash-ul
                window.location.hash = tabToSend;
            });
        });

    const billingType = document.getElementById('billing-type');
    const personBilling = document.getElementById('person-billing');
    const organizationBilling = document.getElementById('organization-billing');
    
    billingType.addEventListener('change', function () {
        if (this.value == '0') {
            personBilling.style.display = 'flex';
            organizationBilling.style.display = 'none';
        } else if (this.value == '1') {
            personBilling.style.display = 'none';
            organizationBilling.style.display = 'flex';
        } else {
            personBilling.style.display = 'none';
            organizationBilling.style.display = 'none';
        }
    });

    if (billingType.value == '0') {
        personBilling.style.display = 'flex';
        organizationBilling.style.display = 'none';
    } else if (billingType.value == '1') {
        personBilling.style.display = 'none';
        organizationBilling.style.display = 'flex';
    } else {
        personBilling.style.display = 'none';
        organizationBilling.style.display = 'none';
    }

    const countrySelects = document.querySelectorAll('[name$="_country_id"]');
    countrySelects.forEach(countrySelect => {
        const countySelect = document.getElementById(countrySelect.name.replace('country', 'county'));
        const selectedCountyId = countySelect.getAttribute('data-selected-county');

        function preselectCounty(countyData) {
            countySelect.innerHTML = '<option value="">Alege judetul</option>';
            countyData.forEach(county => {
                countySelect.innerHTML += `<option value="${county.id}">${county.name}</option>`;
            });

            if (selectedCountyId) {
                countySelect.value = selectedCountyId;
            }
        }

        function loadCounties(countryId) {
            fetch('/get-counties-by-country/' + countryId)
                .then(response => response.json())
                .then(data => {
                    preselectCounty(data);
                })
                .catch(error => {
                    console.error('Eroare la încărcarea județelor:', error);
                    countySelect.innerHTML = '<option value="">Eroare la încărcarea județelor</option>';
                });
        }

        countrySelect.addEventListener('change', function () {
            if (!this.value) {
                countySelect.innerHTML = '<option value="">Alege judetul</option>';
                return;
            }

            loadCounties(this.value);
        });

        if (countrySelect.value) {
            loadCounties(countrySelect.value);
        }
    });

    const hash = window.location.hash.substring(1);  
    if (hash) {
        showTab(hash);  
    }

    window.addEventListener('hashchange', function() {
        const newHash = window.location.hash.substring(1);
        showTab(newHash);  
    });
});





</script>
@endsection