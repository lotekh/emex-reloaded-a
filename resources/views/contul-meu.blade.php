@extends('layout.layout')

@section('content')
<div class="main-container" id="contul_meu_row">
    <h2>Contul meu</h2>
    <div class="tabs w-full grid grid-5 gap-lg" id="product_tabs">
        <div id="detalii-cont" class="btn btn-blue" onclick="showTab('detalii-cont')">Detalii cont</div>
        <div id="livrare" class="btn btn-blue" onclick="showTab('livrare')">Livrare</div>
        <div id="istoric" class="btn btn-blue" onclick="showTab('istoric')">Istoric</div>
        <div id="facturare" class="btn btn-blue" onclick="showTab('facturare')">Facturare</div>
        <div id="schimb-parola" class="btn btn-blue" onclick="showTab('schimb-parola')">Schimb parola</div>
    </div>
    <div class="content col-span-5">
        <!-- Detalii cont -->
        <div class="tab-content" id="detalii-cont-content">
            <form method="POST" action="{{ route('user.update.details') }}">
                @csrf
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

        <!-- Livrare -->
        <div class="tab-content" id="livrare-content" style="display: none;">
            <form method="POST" action="{{ route('user.update.delivery') }}">
                @csrf
                <div class="form-group">
                    <label>Tara</label>
                    <select class="w-full" name="delivery_country_id" id="delivery_country_id" onchange="updateCounties('delivery')">
                        <option value="">Alege tara</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @if (isset($user->delivery_information->country_id) && $user->delivery_information->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Judet</label>
                    <select class="w-full" name="delivery_county_id" id="delivery_county_id">
                        <option value="">Alege judetul</option>
                        @foreach($counties as $county)
                            <option value="{{ $county->id }}" @if (isset($user->delivery_information->county_id) && $user->delivery_information->county_id == $county->id) selected @endif>{{ $county->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Localitate</label>
                    <input class="w-full" type="text" name="delivery_locality" value="{{ $user->delivery_information->locality ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Adresa</label>
                    <input class="w-full" type="text" name="delivery_address" value="{{ $user->delivery_information->address ?? '' }}">
                </div>
                <div class="w-full row justify-center mt-32">
                    <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                </div>
            </form>
        </div>

        <!-- Istoric -->
        <div class="tab-content" id="istoric-content" style="display: none;">
            <!-- Adauga istoricul comenzilor aici -->
        </div>

        <!-- Facturare -->
        <div class="tab-content" id="facturare-content" style="display: none;">
            <form method="POST" action="{{ route('user.update.billing') }}">
                @csrf
                <div class="form-group">
                    <label>Metoda facturare:</label>
                    <select class="w-full" name="billing_type" id="billing-type">
                        <option value="" @if ($user->billing_type === null) selected @endif>Selecteaza metoda de facturare</option>
                        <option value="0" @if ($user->billing_type === 0) selected @endif>Persoana fizica</option>
                        <option value="1" @if ($user->billing_type === 1) selected @endif>Persoana juridica</option>
                    </select>
                </div>
                <div class="col mt-16" id="person-billing" style="display: none;">
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
                            <select class="w-full" name="person_country_id" id="person_country_id" onchange="updateCounties('person')">
                                <option value="">Alege tara</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if (isset($user->company_information->person_country_id) && $user->company_information->person_country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judet</label>
                            <select class="w-full" name="person_county_id" id="person_county_id">
                                <option value="">Alege judetul</option>
                                @foreach($counties as $county)
                                    <option value="{{ $county->id }}" @if (isset($user->company_information->person_county_id) && $user->company_information->person_county_id == $county->id) selected @endif>{{ $county->name }}</option>
                                @endforeach
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
                <div class="col mt-16" id="organization-billing" style="display: none;">
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
                            <select class="w-full" name="organization_country_id" id="organization_country_id" onchange="updateCounties('organization')">
                                <option value="">Alege tara</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if (isset($user->company_information->organization_country_id) && $user->company_information->organization_country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judet</label>
                            <select class="w-full" name="organization_county_id" id="organization_county_id">
                                <option value="">Alege judetul</option>
                                @foreach($counties as $county)
                                    <option value="{{ $county->id }}" @if (isset($user->company_information->organization_county_id) && $user->company_information->organization_county_id == $county->id) selected @endif>{{ $county->name }}</option>
                                @endforeach
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

        <!-- Schimb parola -->
        <div class="tab-content" id="schimb-parola-content" style="display: none;">
            <form method="POST" action="{{ route('user.update.password') }}">
                @csrf
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
    </div>
</div>

<script>
    function showTab(tabId) {
        // Ascunde toate tab-urile
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(tabContent => {
            tabContent.style.display = 'none';
        });

        // Elimină clasa activă de la toate butoanele
        const tabs = document.querySelectorAll('.tabs .btn');
        tabs.forEach(tab => {
            tab.classList.remove('active');
            tab.style.backgroundColor = '';
            tab.style.border = '';
        });

        // Afișează tab-ul selectat
        document.getElementById(tabId + '-content').style.display = 'block';

        // Adaugă clasa activă la butonul selectat
        document.getElementById(tabId).classList.add('active');
        // Schimbă stilul pentru butonul activ
        document.getElementById(tabId).style.backgroundColor = 'white';
        document.getElementById(tabId).style.border = '1px solid var(--blue)';
    }

    // Afișează tab-ul implicit (Detalii cont) la încărcarea paginii
    document.addEventListener('DOMContentLoaded', function () {
        showTab('detalii-cont');
    });

    function updateCounties(prefix) {
        const countryId = document.getElementById(prefix + '_country_id').value;
        const countySelect = document.getElementById(prefix + '_county_id');

        // Golește dropdown-ul de județe
        countySelect.innerHTML = '<option value="">Alege județul</option>';

        if (countryId) {
            fetch('/get-counties-by-country/' + countryId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(county => {
                        const option = document.createElement('option');
                        option.value = county.id;
                        option.text = county.name;
                        countySelect.add(option);
                    });
                })
                .catch(error => console.error('Eroare:', error));
        }
    }

    // Populează județele la încărcarea paginii
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('delivery_country_id').value) {
            updateCounties('delivery');
        }
        if (document.getElementById('person_country_id').value) {
            updateCounties('person');
        }
        if (document.getElementById('organization_country_id').value) {
            updateCounties('organization');
        }

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
    });
</script>
@endsection
