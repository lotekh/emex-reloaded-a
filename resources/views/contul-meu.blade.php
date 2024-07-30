@extends('layout.layout')

@section('content')
 <div class="main-container" id="contul_meu_row">
     <h2>Contul meu</h2>
     <div class="tabs w-full grid grid-5 gap-lg" id="product_tabs">
         <div id="p_tab_1" class="btn btn-blue" role="tab" selected option="a">
             <span>Detalii cont</span>
         </div>
         <div id="p_tab_2" class="btn btn-blue" role="tab" option="b">
             <span>Facturare</span>
         </div>
         <div id="p_tab_3" class="btn btn-blue" role="tab" option="c">
             <span>Livrare</span>
         </div>
         <div id="p_tab_4" class="btn btn-blue" role="tab" option="d">
             <span>Schimb parola</span>
         </div>
         <div id="p_tab_5" class="btn btn-blue" role="tab" option="e">
             <span>Istoric</span>
         </div>
     </div>
 
     <div class="content col-span-5">
         <!-- DETALII CONT -->
         <div class="tab-content" role="tabpanel" id="tabsCM">
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
 
         <!-- FACTURARE -->
         <div class="tab-content" role="tabpanel" id="tabsCM">
             <form class="col" action="{{ url('/save-facturare') }}" method="POST">
                 @csrf
                 <input type="hidden" name="user_id" value="{{ $user->id }}">
                 <div class="w-full form-group">
                     <label>Metoda facturare:</label>
                     <select class="w-full" name="billing_type" id="billing-type">
                         <option value="" @if ($user->billing_type === null) selected @endif>
                             Selecteaza metoda de facturare
                         </option>
                         <option id="person-billing-option" value="0" @if ($user->billing_type === 0) selected @endif>
                             Persoana fizica
                         </option>
                         <option id="organization-billing-option" value="1" @if ($user->billing_type === 1) selected @endif>
                             Persoana juridica
                         </option>
                     </select>
                 </div>
                 <div class="col mt-16" id="person-billing">
                     <div class="grid grid-2 gap-md">
                         <div class="form-group">
                             <label>Nume</label>
                             <input class="w-full" type="text" name="person_last_name" value="{{ $user->company_information['person_last_name'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Prenume</label>
                             <input class="w-full" type="text" name="person_first_name" value="{{ $user->company_information['person_first_name'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Telefon</label>
                             <input class="w-full" type="text" name="person_phone" value="{{ $user->company_information['person_phone'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Judet</label>
                             <select class="w-full" name="person_county_id" id="person_county_id">
                                 <option value="">Alege judetul</option>
                                 @foreach ($counties as $county)
                                    <option value="{{ $county->id }}" 
                                            @if (isset($user->company_information['person_county_id']) && $user->company_information['person_county_id'] == $county->id) 
                                                selected 
                                            @endif>
                                        {{ $county->name }}
                                    </option>
                                @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                             <label>Localitate</label>
                             <input class="w-full" type="text" name="person_locality" value="{{ $user->company_information['person_locality'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Adresa</label>
                             <input class="w-full" type="text" name="person_address" value="{{ $user->company_information['person_address'] ?? '' }}">
                         </div>
                     </div>
                     <div class="w-full row justify-center mt-32">
                         <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                     </div>
                 </div>
                 <div class="col mt-16" id="organization-billing">
                     <div class="grid grid-2 gap-md">
                         <div class="form-group">
                             <label>Nume societate</label>
                             <input class="w-full" type="text" name="organization_name" value="{{ $user->company_information['organization_name'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>CUI</label>
                             <input class="w-full" type="text" name="organization_cui" value="{{ $user->company_information['organization_cui'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Banca</label>
                             <input class="w-full" type="text" name="organization_bank" value="{{ $user->company_information['organization_bank'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>IBAN</label>
                             <input class="w-full" type="text" name="organization_bank_account" value="{{ $user->company_information['organization_bank_account'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Nume persoana de contact</label>
                             <input class="w-full" type="text" name="contact_person_last_name" value="{{ $user->company_information['contact_person_last_name'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Prenume persoana de contact</label>
                             <input class="w-full" type="text" name="contact_person_first_name" value="{{ $user->company_information['contact_person_first_name'] ?? '' }}">
                         </div>
                     </div>
                     <div class="grid grid-3 gap-md mt-16">
                         <div class="form-group">
                             <label>Tara</label>
                             <select class="w-full" name="organization_country_id" id="organization_country_id">
                                 <option value="">Alege tara</option>
                                 @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" 
                                            @if (isset($user->company_information['organization_country_id']) && $user->company_information['organization_country_id'] == $country->id) 
                                                selected 
                                            @endif>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                             <label>Judet</label>
                             <select class="w-full" name="organization_county_id" id="organization_county_id">
                                 <option value="">Alege judetul</option>
                                 @foreach ($counties as $county)
                                 <option value="{{ $county->id }}" 
                                    @if (isset($user->company_information['organization_county_id']) && $user->company_information['organization_county_id'] == $county->id) 
                                        selected 
                                    @endif>
                                {{ $county->name }}
                            </option>
                            
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                             <label>Localitate</label>
                             <input class="w-full" type="text" name="organization_locality" value="{{ $user->company_information['organization_locality'] ?? '' }}">
                         </div>
                         <div class="form-group">
                             <label>Adresa</label>
                             <input class="w-full" type="text" name="organization_address" value="{{ $user->company_information['organization_address'] ?? '' }}">
                         </div>
                     </div>
                     <div class="w-full row justify-center mt-32">
                         <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                     </div>
                 </div>
             </form>
         </div>
 
         <!-- LIVRARE -->
         <div class="tab-content" role="tabpanel" id="tabsCM">
             <form class="col" action="{{ url('/save-livrare') }}" method="POST">
                 @csrf
                 <input type="hidden" name="user_id" value="{{ $user->id }}">
                 <h5>Persoana de contact</h5>
                 <div class="grid grid-4 gap-md">
                     <div class="form-group">
                         <label>Nume</label>
                         <input class="w-full" type="text" name="delivery_last_name" value="{{ $user->delivery_information['delivery_last_name'] ?? '' }}">
                     </div>
                     <div class="form-group">
                         <label>Prenume</label>
                         <input class="w-full" type="text" name="delivery_first_name" value="{{ $user->delivery_information['delivery_first_name'] ?? '' }}">
                     </div>
                     <div class="form-group">
                         <label>Telefon</label>
                         <input class="w-full" type="text" name="delivery_phone" value="{{ $user->delivery_information['delivery_phone'] ?? '' }}">
                     </div>
                     <div class="form-group">
                         <label>Email</label>
                         <input class="w-full" type="text" name="delivery_email" value="{{ $user->delivery_information['delivery_email'] ?? '' }}">
                     </div>
                 </div>
                 <h5 class="mt-32">Adresa de livrare</h5>
                 <div class="grid grid-3 gap-md">
                     <div class="form-group">
                         <label>Tara</label>
                         <select class="w-full" name="delivery_country_id" id="delivery_country_id">
                             <option value="">Alege tara</option>
                             @foreach ($countries as $country)
                                <option value="{{ $country->id }}" 
                                        @if (isset($user->company_information['organization_country_id']) && $user->company_information['organization_country_id'] == $country->id) 
                                            selected 
                                        @endif>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Judet</label>
                         <select class="w-full" name="delivery_county_id" id="delivery_county_id">
                             <option value="">Alege judetul</option>
                             @foreach ($counties as $county)
                                <option value="{{ $county->id }}" 
                                        @if (isset($user->company_information['organization_county_id']) && $user->company_information['organization_county_id'] == $county->id) 
                                            selected 
                                        @endif>
                                    {{ $county->name }}
                                </option>
                            @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Localitate</label>
                         <input class="w-full" type="text" name="delivery_locality" value="{{ $user->delivery_information['delivery_locality'] ?? '' }}">
                     </div>
                     <div class="form-group">
                         <label>Adresa</label>
                         <input type="text" class="w-full" name="delivery_address" value="{{ $user->delivery_information['delivery_address'] ?? '' }}">
                     </div>
                 </div>
                 <div class="w-full row justify-center mt-32">
                     <button type="submit" class="btn btn-blue rounded-sm">Salveaza</button>
                 </div>
             </form>
         </div>
 
         <!-- SCHIMB PAROLA -->
         <div class="tab-content" role="tabpanel" id="tabsCM">
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
 
         <!-- ISTORIC -->
         <div class="tab-content" role="tabpanel" id="tabsCM">
             <!-- Example orders -->
             <div class="w-full p-8 order-history">
                 <div class="sent_ordered_products">
                     <div class="flex grid grid-6 w-full align-center p-8">
                         <div class="col-span-2">
                             <h3 class="order-identifier">Comanda nr. EMEX-00001</h3>
                         </div>
                         <div class="col-span-3">
                             <p>Plasata pe: 01-01-2023 | Total: <strong>100.00 Lei</strong></p>
                         </div>
                         <div class="flex justify-end">
                             <button role="button" class="btn btn-blue rounded-sm">detalii comanda</button>
                         </div>
                     </div>
                     <div class="history_products_list show">
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
                                 <tr>
                                     <td>Produs 1</td>
                                     <td>1</td>
                                     <td>Cutie</td>
                                     <td>None</td>
                                     <td>100.00</td>
                                 </tr>
                             </tbody>
                         </table>
                         <div class="flex ml-8 mt-16 mb-16">
                             <button class="btn btn-blue-outline rounded-sm">Descarca proforma</button>
                             <button class="btn btn-blue-outline rounded-sm">Descarca factura finala</button>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Add more orders as needed -->
         </div>
     </div>
 </div>
 
 <script>
     var select = document.getElementById('billing-type');
     var personBilling = document.getElementById('person-billing-option');
     var organizationBilling = document.getElementById('organization-billing-option');
     var personBillingContent = document.getElementById('person-billing');
     var organizationBillingContent = document.getElementById('organization-billing');
 
     select.addEventListener('change', function() {
         if (personBilling.selected) {
             personBillingContent.style.display = 'flex';
             organizationBillingContent.style.display = 'none';
         } else if (organizationBilling.selected) {
             personBillingContent.style.display = 'none';
             organizationBillingContent.style.display = 'flex';
         } else {
             personBillingContent.style.display = 'none';
             organizationBillingContent.style.display = 'none';
         }
     });
 
     if (personBilling.selected) {
         personBillingContent.style.display = 'flex';
         organizationBillingContent.style.display = 'none';
     } else if (organizationBilling.selected) {
         personBillingContent.style.display = 'none';
         organizationBillingContent.style.display = 'flex';
     } else {
         personBillingContent.style.display = 'none';
         organizationBillingContent.style.display = 'none';
     }
 
     function populateCounties(countryId, countySelect) {
         fetch(`/counties-by-country/${countryId}`)
             .then(response => response.json())
             .then(data => {
                 countySelect.innerHTML = '<option value="">Alege judetul</option>';
                 data.forEach(county => {
                     let option = document.createElement('option');
                     option.value = county.id;
                     option.text = county.name;
                     countySelect.add(option);
                 });
             });
     }
 
     document.getElementById('organization_country_id').addEventListener('change', function() {
         populateCounties(this.value, document.getElementById('organization_county_id'));
     });
 
     document.getElementById('delivery_country_id').addEventListener('change', function() {
         populateCounties(this.value, document.getElementById('delivery_county_id'));
     });
 </script>
@endsection
 