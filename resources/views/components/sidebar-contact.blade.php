@php
    $baseUrl = url('/');
    $no1 = rand(0, 10);
    $no2 = rand(0, 9);
    $result = $no1 + $no2;
    $mdResult = md5($result);
    $base_url = url('/');
@endphp

@if (request()->route()->getName() != 'site.contact')
    <div class="siwst" id="solicita_informatii_wrapper_static_text" tabindex="0" role="button" onclick="openLightbox()">
        <div class="icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 5C8.23858 5 6 7.23858 6 10V11V18H3C1.89543 18 1 17.1046 1 16V12C1 10.8954 1.89543 10 3 10L4 10C4 6.13401 7.13401 3 11 3H13C16.866 3 20 6.13401 20 10H21C22.1046 10 23 10.8954 23 12V16C23 17.1046 22.1046 18 21 18H19.874C19.4299 19.7252 17.8638 21 16 21H14.7324C14.3866 21.5978 13.7403 22 13 22C11.8954 22 11 21.1046 11 20C11 18.8954 11.8954 18 13 18C13.7403 18 14.3866 18.4022 14.7324 19H16C17.1046 19 18 18.1046 18 17V11V10C18 7.23858 15.7614 5 13 5H11ZM4 12H3L3 16H4V12ZM11 12.25C11 12.9404 10.4404 13.5 9.75 13.5C9.05964 13.5 8.5 12.9404 8.5 12.25C8.5 11.5596 9.05964 11 9.75 11C10.4404 11 11 11.5596 11 12.25ZM14.25 13.5C14.9404 13.5 15.5 12.9404 15.5 12.25C15.5 11.5596 14.9404 11 14.25 11C13.5596 11 13 11.5596 13 12.25C13 12.9404 13.5596 13.5 14.25 13.5ZM20 12H21V16H20V12Z" />
            </svg>
        </div>
        <p>Solicita Informatii</p>
    </div>
@endif

<div id="contact-lightbox" class="lightbox" style="display: none;">
    <div class="w-full h-screen flex justify-center align-center modal">
        <div class="modal-container">
            <div class="relative header w-full row justify-between align-center" id="header-sidebar-contact">
                <div></div>
                <img class="logo-footer" width="201" height="72" src="storage/resources/new_design/general/logo-footer.png" alt="Logo Footer">
                <button onclick="closeLightbox()" role="button" tabindex="0" class="close-btn" aria-label="Inchide">
                    <img width="32" height="32" src="storage/resources/new_design/icons/close.svg" alt="close">
                </button>
            </div>
            <div class="col align-center content">
                <p class="gray-title"> $main_title </p>
                <h2 id="contact_light_box_first_h5" class="mt-8">$secondary_title</h2>
                <form class="col w-full" method="POST" action="{{ $baseUrl }}/side-contact">
                    @csrf
                    <div class="form-group w-full">
                        <label for="side-contact-name">Nume</label>
                        <input id="side-contact-name" required type="text" name="Contact[name]" class="w-full">
                    </div>
                    <div class="form-group w-full">
                        <label for="side-contact-societate">Societate</label>
                        <input id="side-contact-societate" type="text" name="Contact[company]" class="w-full">
                    </div>
                    <div class="form-group w-full">
                        <label for="side-contact-email">Email</label>
                        <input id="side-contact-email" type="email" required name="Contact[email]" class="w-full">
                    </div>
                    <div class="form-group w-full">
                        <label for="side-contact-telefon">Telefon</label>
                        <input id="side-contact-telefon" type="tel" placeholder="+1 (555) 555-5555" required name="Contact[phone]" class="w-full">
                    </div>
                    <div class="form-group w-full">
                        <label for="side_contact_msg">Mesaj</label>
                        <textarea rows="4" name="Contact[message]" class="w-full" id="side_contact_msg" placeholder="Mentionati, in masura in care se poate, toate cerintele sau informatiile dorite, legate de solicitarea Dvs."></textarea>
                    </div>

                    <div class="form-group">
                        <div>
                            <div class="col">
                                <div class="row">
                                    <p id="captchaLabel" class="subtext space">Spam check: </p>
                                    <p class="subtext captcha-value space"><b>{{ $no1 }} + </b></p>
                                    <p class="subtext captcha-value"><b>{{ $no2 }} = </b></p>
                                </div>
                                <input type="text" id="captchaResult" name="captchaResult" required>
                                <input type="hidden" name="captchaMdResult" value="{{ $mdResult }}">
                            </div>
                        </div>
                    </div>

                    <div class="row align-center">
                        <label class="switch">
                            <input type="checkbox" name="consent" id="consent-checkbox" required>
                            <i></i>
                        </label>
                        <span class="disclaimer">
                            Sunt de acord cu
                            <a class="text-blue" href="{{ $baseUrl }}/confidentialitate-gdpr">politica de confidentialitate</a> si
                            <a class="text-blue" href="{{ $baseUrl }}/termeni-si-conditii">termeni si conditii.</a>
                        </span>
                    </div>
                    <div class="form-validation" style="display: none;" data-validation-for="consent-checkbox">Conform reglementarilor in vigoare, trebuie sa fiti de acord cu Termeni si Conditii si Politica de Confidentialitate</div>
                    <div class="w-full flex justify-center">
                        <input type="submit" class="w-fit btn btn-blue rounded-lg px-16 mt-16" value="Trimite" id="contact_lighbox_submit_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openLightbox() {
        document.getElementById('contact-lightbox').style.display = 'flex';
    }

    function closeLightbox() {
        document.getElementById('contact-lightbox').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                const consentCheckbox = document.getElementById('consent-checkbox');
                if (!consentCheckbox.checked) {
                    event.preventDefault();
                    document.querySelector('.form-validation').style.display = 'block';
                }
            });
        });
    });
</script>
