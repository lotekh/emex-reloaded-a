@extends('layout.layout')

@section('seo')
<title>Contact vopsele Emex by Romtehnochim</title>
<meta name="keywords" content="formular de contact, contact Emex, contact Romtehnochim, email Romtehnochim, email Emex">
<meta name="description" content="Pagina de contact pentru comenzi sau informatii legate de servicii sau vopsele marca Emex furnizate de producatorul Romtehnochim">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Contact Emex by Romtehnochim">
<meta property="og:image" content="https://emex.ro/images/social/Contact-Emex-Instagram.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Contact-Emex-Instagram.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Contacte Emex adresa tefefon mail"/>
<meta property="og:description" content="Pagina si formularul de contact ale Romtehnochim. Interactiunea cu clientii prin telefon fax mail sau retele sociale.">
<meta property="og:url" content="https://emex.ro/contact">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Contact</li></ul>
@endsection

@section('content')

<div class="main-container contact">
    <h1 class="text-center" id="pt">
        FORMULAR DE CONTACT “EMEX”
    </h1>
    <div class="grid-page">
        <div class="col gap-md">
            <h2 class="info text-center text-white">Contact “Romtehnochim”</h2>

            <b>Telefon</b>
            <div class="grid grid-2">
                <p>Secretariat:</p>
                <div class="col">
                    <p>021-457.1693</p>
                    <p>021-457.1693</p>
                    <p>021-457.0638</p>
                    <p>021-457.0646</p>
                </div>
            </div>
            <div class="grid grid-2">
                <p>Vanzari:</p>
                <div class="col">
                    <p>0724-509.552</p>
                    <p>0785-232.552</p>
                </div>
            </div>
            <div class="grid grid-2">
                <p>Tehnic:</p>
                <div class="col">
                    <p>0724-577.075</p>
                    <p>0728-213.628</p>
                </div>
            </div>
            <div class="grid grid-2">
                <p>Marketing:</p>
                <div class="col">
                    <p>0722-393.206</p>
                    <p>0722-209.453</p>
                </div>
            </div>

            <div class="col gap-xs">
                <b>Email</b>
                <div class="grid grid-2">
                    <p>Secretariat:</p>
                    <a href="mailto:office@emex.ro">office@emex.ro</a>
                </div>
                <div class="grid grid-2">
                    <p>Vanzari:</p>
                    <a href="mailto:vanzari@emex.ro">vanzari@emex.ro</a>
                </div>
            </div>
        </div>
        <div class="col">
            <h2 class="info text-center text-white">Instant mail “Romtehnochim”</h2>
            <form id="cpf" method="POST" action="{{ route('contact.store') }}">
                @csrfWithoutAutocomplete
                <div class="grid grid-2 gap-md" id="row_inputs_contact_form">
                    <div class="form-group">
                        <label for="contact_page_nume">Nume<span class="text-red">*</span></label>
                        <div class="flex row w-full gap-md align-center">
                            <!-- Icon -->
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <path fill="#ff9c4d" d="M17.4 6c0 1.5-.5 2.8-1.6 3.9s-2.4 1.6-3.9 1.6S9.1 11 8 9.9 6.4 7.5 6.4 6 6.9 3.2 8 2.1 10.4.5 11.9.5s2.8.5 3.9 1.6c1 1.1 1.6 2.4 1.6 3.9z" />
                                <path fill="#1976d3" d="M21.6 19.9c0 1.1-.4 2-1.1 2.6-.7.6-1.7 1-2.9 1H6.4c-1.2 0-2.2-.3-2.9-1-.8-.7-1.1-1.5-1.1-2.6v-1.2c0-.4.1-.9.2-1.3.1-.5.2-.9.4-1.3.1-.4.4-.8.6-1.2.3-.4.6-.8.9-1.1.4-.3.8-.6 1.3-.7.5-.2 1.1-.3 1.7-.3.2 0 .5.1.9.3l.9.6c.3.2.7.3 1.2.5.4.1.9.2 1.3.2h.1c.5 0 1-.1 1.5-.2s.9-.3 1.2-.5c.4-.2.7-.4.9-.6.4-.3.7-.3.9-.3.6 0 1.2.1 1.7.3s.9.4 1.3.7c.3.3.6.7.9 1.1.2.4.5.8.6 1.2s.3.9.4 1.3c.1.5.2.9.2 1.3.1.3.1.8.1 1.2z" />
                            </svg>
                            <input type="text" class="w-full" placeholder="Nume..." name="Contact[name]" aria-required="true" required id="contact_page_nume">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_page_email">E-mail<span class="text-red">*</span></label>
                        <div class="flex row w-full gap-md align-center">
                            <!-- Icon -->
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <switch>
                                    <g fill="#1976d3">
                                        <path d="M3.1 6.3c.4.2 1.2.8 2.6 1.7 1.5 1 2.6 1.7 3.4 2.2.1.1.3.2.5.4.3.2.5.3.7.5.2.1.4.2.7.4.3.1.5.3.7.3.2.1.4.1.6.1.2 0 .4 0 .6-.1s.5-.2.7-.3c.3-.1.5-.3.7-.4.2-.1.4-.3.7-.5.3-.2.5-.3.5-.4.8-.5 2.8-1.8 6-4 .6-.4 1.1-.9 1.6-1.5.4-.6.6-1.2.6-1.8 0-.5-.2-1-.6-1.4s-.9-.6-1.4-.6H3c-.7 0-1.2.2-1.5.6-.4.4-.5.9-.5 1.6 0 .5.2 1.1.7 1.7.4.7.9 1.2 1.4 1.5z" />
                                        <path d="M22.6 8c-2.8 1.9-4.9 3.4-6.4 4.4-.5.4-.9.6-1.2.8-.3.2-.7.4-1.2.6-.5.2-1 .3-1.4.3-.4 0-.9-.1-1.4-.3s-.9-.4-1.2-.6c-.3-.2-.7-.5-1.2-.8-1.1-.8-3.2-2.3-6.3-4.4-.5-.3-.9-.7-1.3-1.1v10.2c0 .6.2 1 .6 1.4s.9.6 1.5.6H22c.6 0 1-.2 1.5-.6.4-.4.6-.9.6-1.4V6.8c-.6.4-1 .8-1.5 1.2z" />
                                    </g>
                                </switch>
                            </svg>
                            <input type="text" class="w-full" placeholder="Email..." name="Contact[email]" aria-required="true" required id="contact_page_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_page_telefon">Telefon<span class="text-red">*</span></label>
                        <div class="flex row w-full gap-md align-center">
                            <!-- Icon -->
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <switch>
                                    <g>
                                        <path d="M23.5 20.5c0 1.6-1.3 3-3 3h-17c-1.6 0-3-1.4-3-3v-17c0-1.7 1.4-3 3-3h17c1.7 0 3 1.3 3 3v17z" fill="#1976d3" />
                                        <path d="m8.4 9.2-1.1 1.1c.1.1.1.2.2.3.5 1 1.2 2.2 2.6 3.6 1.3 1.3 2.7 2.1 3.6 2.6.1.1.2.1.3.1l1-1.1.1-.1c.9-.9 2.1-.9 3 0l2.2 2.2c.9.9.9 2.2 0 3l-.5.4c-.4.3-.8.5-1.2.7s-.9.3-1.2.3c-3.2.4-6.2-1.1-10.2-5.1C1.7 11.7 2 7.2 2 7c.1-.4.2-.9.3-1.2.2-.5.4-.9.7-1.2l.4-.5c.9-.9 2.1-.9 3 0l2.1 2.1c.8.9.8 2.1-.1 3zm12 4.3h-.1c-.4-.1-.6-.4-.6-.8.4-2.4-.3-4.9-2.1-6.6C15.9 4.4 13.4 3.6 11 4c-.4.1-.7-.2-.8-.6s.2-.7.6-.8c2.9-.5 5.8.4 7.8 2.4s3 5 2.4 7.8c0 .5-.2.7-.6.7z" fill="#fff" />
                                        <path d="M16.3 13.5h-.2c-.4-.1-.5-.5-.4-.9.5-1.3.2-2.7-.8-3.6-1-1-2.4-1.3-3.6-.8-.4.1-.7 0-.9-.4-.1-.4 0-.7.4-.9 1.8-.7 3.8-.2 5.1 1.1s1.8 3.3 1.1 5.1c-.2.2-.5.4-.7.4z" fill="#fff" />
                                    </g>
                                </switch>
                            </svg>
                            <input type="tel" class="w-full" placeholder="+1 (555) 555-5555" name="Contact[phone]" aria-required="true" required id="contact_page_telefon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_page_societate">Societate</label>
                        <div class="flex row w-full gap-md align-center">
                            <!-- Icon -->
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="#1976d3">
                                <path d="M7.2 3.4H4.5c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V3.8c0-.2-.1-.4-.2-.4zM7 7.2H4.7V3.9H7v3.3zm4.3-3.8H8.6c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V3.8c0-.2-.1-.4-.2-.4zm-.2 3.8H8.8V3.9h2.3v3.3zm4.4-3.8h-2.7c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V3.8c-.1-.2-.1-.4-.2-.4zm-.2 3.8H13V3.9h2.3v3.3zm4.3-3.8h-2.7c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V3.8c0-.2-.1-.4-.2-.4zm-.2 3.8h-2.3V3.9h2.3v3.3zm-12.2 2H4.5c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V9.6c0-.3-.1-.4-.2-.4zM7 13.1H4.7V9.8H7v3.3zm4.3-3.9H8.6c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V9.6c0-.3-.1-.4-.2-.4zm-.2 3.9H8.8V9.8h2.3v3.3zm4.4-3.9h-2.7c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V9.6c-.1-.3-.1-.4-.2-.4zm-.2 3.9H13V9.8h2.3v3.3zm4.3-3.9h-2.7c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3V9.6c0-.3-.1-.4-.2-.4zm-.2 3.9h-2.3V9.8h2.3v3.3zm-12.2 2H4.5c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3v-3.8c0-.3-.1-.3-.2-.3zM7 18.8H4.7v-3.3H7v3.3zm12.6-3.7h-2.7c-.1 0-.2.1-.2.3v3.8c0 .2.1.3.2.3h2.7c.1 0 .2-.1.2-.3v-3.8c0-.3-.1-.3-.2-.3zm-.2 3.7h-2.3v-3.3h2.3v3.3z" />
                                <path d="M1.8.4c-.1 0-.2.1-.2.3v22.2H.7c-.1 0-.2.1-.2.3s.1.3.2.3h22.6c.1 0 .2-.1.2-.3s-.1-.3-.2-.3h-.9V.8c0-.2-.1-.3-.2-.3H1.8zm11.1 0h-1.8M8.5 22.8H2v-1.5h6.5v1.5zm6.8.1h-3v-4.5c0-.2-.1-.3-.2-.3s-.2.1-.2.3v4.5h-3v-7.3h3v.8c0 .2.1.3.2.3s.2-.1.2-.3v-.8h3v7.3zm6.8-2.1h-2.5c-.1 0-.2.1-.2.3s.1.3.2.3h2.5v1.5h-6.5v-1.5h4.5c.1 0 .2-.1.2-.3s-.1-.3-.2-.3h-4.5v-5.5c0-.2-.1-.3-.2-.3H8.6c-.1 0-.2.1-.2.3v5.6H1.9V.9H22l.1 19.9z" />
                            </svg>
                            <input type="text" class="w-full" placeholder="Societate..." name="Contact[company]" id="contact_page_societate">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-16">
                    <label for="contact_page_mesaj">Mesaj<span class="text-red">*</span></label>
                    <div class="flex row w-full gap-md">
                        <!-- Icon -->
                        <svg viewbox="0 0 24 24" width="24" height="24" fill="#1976d3">
                            <switch>
                                <g>
                                    <path class="st0" d="M22.2,2.3c0.8,0.8,0.8,2.1,0,2.8l-1,1l-3.5-3.5l1-1c0.8-0.8,2.1-0.8,2.8,0L22.2,2.3z" />
                                    <path class="st0" d="M21.2,6.2L12,15.4l0,0l-3.5-3.5l9.2-9.2L21.2,6.2z" />
                                    <path class="st1" d="M8.5,11.9l3.5,3.5l0,0l-4.9,1.4L8.5,11.9L8.5,11.9z" />
                                    <g>
                                        <path class="st0" d="M21.6,11.9c-0.3,0-0.6,0.3-0.6,0.6v8.1c0,1-0.8,1.7-1.7,1.7H3.2c-0.9,0-1.7-0.8-1.7-1.7v-15
					c0-1,0.8-1.7,1.7-1.7h8.1c0.3,0,0.6-0.3,0.6-0.6s-0.3-0.6-0.6-0.6H3.2C1.6,2.7,0.3,4,0.3,5.6v15c0,1.6,1.3,2.9,2.9,2.9h16.1
					c1.6,0,2.9-1.3,2.9-2.9v-8.1C22.2,12.2,21.9,11.9,21.6,11.9z" />
                                        <path class="st0" d="M22,1.3c-1-1-2.6-1-3.6,0L8.2,11.6c-0.1,0.1-0.1,0.2-0.1,0.3l-1.3,4.9c-0.1,0.2,0,0.4,0.1,0.6
					c0.1,0.1,0.4,0.2,0.6,0.1l4.9-1.4c0.1,0,0.2-0.1,0.3-0.1l0,0L22.9,5.8c1-1,1-2.7,0-3.7L22,1.3z M8.8,13l2.2,2.2L8,16L8.8,13z
					 M12.1,15.4L12.1,15.4l0.4,0.4L12.1,15.4z M12.1,14.6l-2.7-2.7l8.4-8.4l2.7,2.7L12.1,14.6z M21.8,4.8l-0.6,0.6l-2.7-2.7l0.6-0.6
					c0.6-0.6,1.5-0.6,2,0l0.7,0.7C22.4,3.3,22.4,4.2,21.8,4.8z" />
                                    </g>
                                    <path class="st1" d="M17.7,3.5c0.4-0.4,0.5-0.5,0.8-0.8c1,1,1.6,1.6,2.7,2.7c-0.2,0.3-0.5,0.5-0.8,0.8" />
                                    <path class="st1" d="M10.8,12.5c-0.1-0.1-0.2-0.2-0.3-0.3c2.3-2.3,4.6-4.6,6.9-6.9c0.1,0.1,0.2,0.2,0.3,0.3
				C15.4,8,13.1,10.2,10.8,12.5z" />
                                </g>
                            </switch>
                        </svg>
                        <textarea class="w-full" id="contact_page_mesaj" placeholder="Mesaj..." name="Contact[message]" rows="10" aria-required="true" required></textarea>
                    </div>
                </div>

                <div class="form-group mt-16">
                    <div class="row align-center">
                        <input class="mr-8" type="checkbox" name="consent" id="consent-checkbox" required>
                        <label for="consent-checkbox">
                            Sunt de acord cu <a href="{{ url('/confidentialitate-gdpr') }}">politica de confidentialitate</a> si <a class="link_color1" href="{{ url('/termeni-si-conditii') }}">termeni si conditii.</a>
                        </label>
                    </div>
                    <div class="form-validation" style="display: none;">Conform reglementarilor in vigoare, trebuie sa fiti de acord cu Termeni si Conditii si Politica de Confidentialitate</div>
                </div>
                

                @php
                    $no1 = rand(0, 10);
                    $no2 = rand(0, 9);
                    $result = $no1 + $no2;
                    $mdResult = md5($result);
                @endphp
                <div class="form-group mt-32">
                    <div class="w-full col align-center">
                        <div class="col">
                            <div>
                                <label for="captchaResult" id="captchaLabel">Spam check: </label>
                                <label class="mr-5 captcha-value"><b>{{ $no1 }} + </b></label>
                                <label class="mr-5 captcha-value"><b>{{ $no2 }} = </b></label>
                            </div>
                            <input type="text" id="captchaResult" name="captchaResult" required>
                            <input type="hidden" name="captchaMdResult" value="{{ $mdResult }}">
                        </div>
                    </div>
                </div>
                <div class="w-full row justify-center mt-32">
                    <input type="submit" class="btn btn-blue" id="cpf_submit_btn" value="Trimite">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('cpf');
        const consentCheckbox = document.getElementById('consent-checkbox');
        const validationMessage = document.querySelector('.form-validation');

        consentCheckbox.removeAttribute('required');

        if (form) {
            form.addEventListener('submit', function (event) {
                if (!consentCheckbox.checked) {
                    // If the checkbox is not checked, stop sending the form
                    event.preventDefault(); 
                    validationMessage.style.display = 'block'; 
                    consentCheckbox.focus();  
                } else {
                    // Hide the message if the checkbox is checked
                    validationMessage.style.display = 'none'; 
                }
            });
        }
    });
</script>
