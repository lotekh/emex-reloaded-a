@extends('layout.layout')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/my-account.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
@endsection

@section('content')
<div class="main-container" id="contul_meu_row">
    <h2>Contul meu</h2>
    <div class="tabs w-full grid grid-5 gap-lg" id="product_tabs">
        <div id="detalii-cont" class="tab btn btn-blue" onclick="showTab('detalii-cont')">Detalii cont</div>
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

        <!-- Facturare -->
        <div id="facturare-content" class="tab-content" style="display:none;">
            <form class="col" action="{{ url('/save-facturare') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
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
                            <input class="w-full" type="text" name="person_last_name" value="{{ $user->company_information->person_last_name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Prenume</label>
                            <input class="w-full" type="text" name="person_first_name" value="{{ $user->company_information->person_first_name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <input class="w-full" type="text" name="person_phone" value="{{ $user->company_information->person_phone ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Tara</label>
                            <select class="w-full" name="person_country_id" id="person_country_id">
                                <option value="">Alege tara</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if (($user->company_information->person_country_id ?? null) == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judet</label>
                            <select class="w-full" name="person_county_id" id="person_county_id">
                                <option value="">Alege judetul</option>
                                <!-- Counties will be populated dynamically based on the selected country -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Localitate</label>
                            <input class="w-full" type="text" name="person_locality" value="{{ $user->company_information->person_locality ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Adresa</label>
                            <input class="w-full" type="text" name="person_address" value="{{ $user->company_information->person_address ?? '' }}">
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
                            <input class="w-full" type="text" name="organization_name" value="{{ $user->company_information->organization_name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>CUI</label>
                            <input class="w-full" type="text" name="organization_cui" value="{{ $user->company_information->organization_cui ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Banca</label>
                            <input class="w-full" type="text" name="organization_bank" value="{{ $user->company_information->organization_bank ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>IBAN</label>
                            <input class="w-full" type="text" name="organization_bank_account" value="{{ $user->company_information->organization_bank_account ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Nume persoana de contact</label>
                            <input class="w-full" type="text" name="contact_person_last_name" value="{{ $user->company_information->contact_person_last_name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Prenume persoana de contact</label>
                            <input class="w-full" type="text" name="contact_person_first_name" value="{{ $user->company_information->contact_person_first_name ?? '' }}">
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
                                <!-- Counties will be populated dynamically based on the selected country -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Localitate</label>
                            <input class="w-full" type="text" name="organization_locality" value="{{ $user->company_information->organization_locality ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Adresa</label>
                            <input class="w-full" type="text" name="organization_address" value="{{ $user->company_information->organization_address ?? '' }}">
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
                <h5>Persoana de contact</h5>
                <div class="grid grid-4 gap-md">
                    <div class="form-group">
                        <label>Nume</label>
                        <input class="w-full" type="text" name="delivery_last_name" value="{{ $user->delivery_information->delivery_last_name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Prenume</label>
                        <input class="w-full" type="text" name="delivery_first_name" value="{{ $user->delivery_information->delivery_first_name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input class="w-full" type="text" name="delivery_phone" value="{{ $user->delivery_information->delivery_phone ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="w-full" type="text" name="delivery_email" value="{{ $user->delivery_information->delivery_email ?? '' }}">
                    </div>
                </div>
                <h5 class="mt-32">Adresa de livrare</h5>
                <div class="grid grid-3 gap-md">
                    <div class="form-group">
                        <label>Tara</label>
                        <select class="w-full" name="delivery_country_id" id="delivery_country_id">
                            <option value="">Alege tara</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if (($user->delivery_information->delivery_country_id ?? null) == $country->id) selected @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judet</label>
                        <select class="w-full" name="delivery_county_id" id="delivery_county_id">
                            <option value="">Alege judetul</option>
                            <!-- Counties will be populated dynamically based on the selected country -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Localitate</label>
                        <input type="text" class="w-full" name="delivery_locality" value="{{ $user->delivery_information->delivery_locality ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>Adresa</label>
                        <input class="w-full" type="text" name="delivery_address" value="{{ $user->delivery_information->delivery_address ?? '' }}">
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
                @for ($i = 0; $i < 3; $i++)
                    @php $visCount++; @endphp
                    <div class="w-full p-8 order-history">
                        <div class="sent_ordered_products">
                            <div class="flex grid grid-6 w-full align-center p-8">
                                <div class="col-span-2">
                                    <h3 class="order-identifier">Comanda nr. EMEX-{{ sprintf('%05d', rand(8000, 9000)) }}</h3>
                                </div>
                                <div class="col-span-3">
                                    <p>Plasata pe: {{ now()->subDays(rand(1, 365))->format('d-m-Y') }} | Total: <strong>{{ number_format(rand(100, 1000), 2) }} Lei</strong></p>
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
                                        @for ($j = 0; $j < 3; $j++)
                                            <tr>
                                                <td>Produs {{ $j + 1 }}</td>
                                                <td>{{ rand(1, 10) }}</td>
                                                <td>{{ rand(1, 5) }} L</td>
                                                <td>-</td>
                                                <td>{{ number_format(rand(50, 200), 2) }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                <div class="flex ml-8 mt-16 mb-16">
                                    <button class="btn btn-blue-outline rounded-sm">Descarca proforma</button>
                                    <button class="btn btn-blue-outline rounded-sm">Descarca factura finala</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
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
    }

    function toggleDetails(id) {
        const details = document.getElementById('details-' + id);
        details.classList.toggle('hide');
        details.classList.toggle('show');
    }

    document.addEventListener('DOMContentLoaded', function () {
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
            countrySelect.addEventListener('change', function () {
                const countySelect = document.getElementById(this.name.replace('country', 'county'));
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
