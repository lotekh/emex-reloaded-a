@extends('layout.layout')

@section('content')
<div id="auth-lightbox" class="w-full h-screen flex justify-center align-center modal">
    <div class="modal-container">
        <div class="relative header row justify-between align-center">
            <div></div>
            <img class="logo-footer" width="201" height="72" src="{{ asset('resources/new_design/general/logo-footer.png') }}">
            <button onclick="closeModal('auth-lightbox')" role="button" tabindex="0" class="close-btn" aria-label="Inchide">
                <div class="flex align-center">
                    <img src="{{ asset('resources/new_design/icons/close.svg') }}" alt="close" width="32" height="32">
                </div>
            </button>
        </div>
        <div class="header-buttons">
            <button class="header-button clickable" onclick="switchModal('auth-lightbox', 'register-lightbox')" role="button" aria-label="Creeaza cont" tabindex="0">Creeaza cont</button>
            <div class="header-button">Autentificare</div>
        </div>
        <div class="col align-center content">
            <form class="col w-full" method="POST" action="{{ route('login') }}">
                @csrfWithoutAutocomplete
                <div class="form-group w-full">
                    <label for="form-login-email">Adresa de email</label>
                    <input class="w-full" id="form-login-email" type="text" name="email" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="form-group w-full">
                    <label for="form-login-password">Parola</label>
                    <input class="w-full" id="form-login-password" type="password" name="password" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="w-full flex justify-center">
                    <button type="submit" class="w-fit btn rounded-lg px-16 mt-32">Autentifica-te</button>
                </div>
                <button class="subtext mt-16 underline-hover" type="button" onclick="switchModal('auth-lightbox', 'recover-password-lightbox')" role="button" aria-label="Recupereaza Parola" tabindex="0">Parola uitata?</button>
            </form>
        </div>
    </div>
</div>

<div id="register-lightbox" class="w-full h-screen flex justify-center align-center modal">
    <div class="modal-container">
        <div class="relative header row justify-between align-center">
            <div></div>
            <img class="logo-footer" width="201" height="72" src="{{ asset('resources/new_design/general/logo-footer.png') }}">
            <button onclick="closeModal('register-lightbox')" role="button" tabindex="0" class="close-btn" aria-label="Inchide">
                <div class="flex align-center">
                    <img src="{{ asset('resources/new_design/icons/close.svg') }}" alt="close" width="32" height="32">
                </div>
            </button>
        </div>
        <div class="header-buttons">
            <div class="header-button">Creeaza cont</div>
            <button class="header-button clickable" onclick="switchModal('register-lightbox', 'auth-lightbox')" role="button" aria-label="Autentificare" tabindex="0">Autentificare</button>
        </div>
        <div class="col align-center content">
            <form class="col w-full" method="POST" action="{{ route('register') }}">
                @csrfWithoutAutocomplete
                <div class="form-group w-full">
                    <label for="form-register-last-name">Nume</label>
                    <input class="w-full" id="form-register-last-name" type="text" name="last_name" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="form-group w-full">
                    <label for="form-register-first-name">Prenume</label>
                    <input class="w-full" id="form-register-first-name" type="text" name="first_name" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="form-group w-full">
                    <label for="form-register-email">Adresa de email</label>
                    <input class="w-full" id="form-register-email" type="text" name="email" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="form-group w-full">
                    <label for="form-register-telefon">Telefon</label>
                    <input class="w-full" id="form-register-telefon" type="text" name="phone" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="form-group w-full">
                    <label for="form-register-password">Parola</label>
                    <input class="w-full" id="form-register-password" type="password" name="password" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <div class="row align-center">
                    <input type="checkbox" class="hidden" name="terms" id="tc" required checked>
                    <label class="switch">
                        <input type="checkbox" name="gdpr" id="gdpr" required>
                        <i></i>
                    </label>
                    <span>
                        Sunt de acord cu
                        <a href="{{ url('/confidentialitate-gdpr') }}"><em class="link_color1">politica de confidentialitate</em></a> si
                        <a href="{{ url('/termeni-si-conditii') }}"><em class="link_color1">termeni si conditii</em>.</a>
                    </span>
                </div>
                {{-- <p class="form-validation">Bifează caseta dacă vrei să continui.</p> --}}
                <div class="w-full flex justify-center">
                    <button type="submit" class="w-fit btn btn-blue rounded-lg px-16 mt-16">Creeaza Cont</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="recover-password-lightbox" class="w-full h-screen flex justify-center align-center modal">
    <div class="modal-container">
        <div class="relative header row justify-between align-center">
            <div></div>
            <img class="logo-footer" width="201" height="72" src="{{ asset('resources/new_design/general/logo-footer.png') }}">
            <button onclick="closeModal('recover-password-lightbox')" role="button" tabindex="0" class="close-btn" aria-label="Recupereaza parola">
                <div class="flex align-center">
                    <img src="{{ asset('resources/new_design/icons/close.svg') }}" alt="close" width="32" height="32">
                </div>
            </button>
        </div>
        <div class="col align-center content">
            <p>Recupereaza Parola</p>
            <form class="col align-center w-full" method="POST" action="{{ route('password.email') }}">
                @csrfWithoutAutocomplete
                <div class="form-group w-full">
                    <label for="form-recover-password" class="form-label">E-mail</label>
                    <input class="w-full" id="form-recover-password" type="email" name="email" required>
                    {{-- <p class="form-validation">Completează acest câmp.</p> --}}
                </div>
                <button type="submit" class="w-fit btn btn-blue rounded-lg px-16 mt-64">Recupereaza Parola</button>
            </form>
        </div>
    </div>
</div>

<script>
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    function switchModal(currentModalId, targetModalId) {
        closeModal(currentModalId);
        document.getElementById(targetModalId).style.display = 'flex';
    }
</script>

@endsection