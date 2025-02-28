@extends('layout.layout')

@section('seo')
<title>Solicita cotatie aplicare</title>
<meta name="keywords" content="pardoseala epoxidica pret, aplicare pardoseala pret, montaj epoxidica pret">
<meta name="description" content="Emex by Romtehnochim - asigura  montaj sau aplicare de pardoseala epoxidica si poliuretanica la pret accesibil. Similar vopsea epoxidica si poliuretanica">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Veniti in echipa Romtehnochim">
<meta property="og:image" content="https://emex.ro/images/social/Solicita-cotatie-servicii-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Solicita-cotatie-servicii-sm.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:image:alt" content="Angajari Romtehnochim"/>
<meta property="og:description" content="Angajam personal calificat pentru vopsiri si aplicari de pardoseli epoxidice si poliuretanice ingineri operatori si tehnologi vopsele.">
<meta property="og:url" content="https://emex.ro/angajari">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/solicita-cotatie.min.css') }}">
@endsection

@section('breadcrumbs')
<ul style="padding: 0px;" class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Solicita cotatie aplicare</li></ul>
@endsection

@section('content')

<style>
    #solicit_header {
        background-image: url("{{ asset('resources/new_design/images/Aplicari-solicita-cotatie.jpg') }}");
    }
</style>

<div class="relative w-full col justify-center align-center header" id="solicit_header">
    <h1 class="text-center">
        FORMULAR DE SOLICITARE <br> OFERTA
    </h1>
</div>

<section class="main-container relative col">
    <div class="col" id="main_container_angajari_row">
        <h2 id="angajari_title">Date generale necesare:</h2>
        <p>
            <span class="alineat_span"></span>
            Pentru a putea defini cat mai exact lucrarea pe care o doriti, va rugam sa completati formularul de mai jos. Aceasta ne va ajuta 
            sa va putem transmite cea mai avantajoasa oferta, in functie de cerintele dvs. si performantele optime. Daca aveti poze ale spatiului, 
            va rugam sa le urcati in aplicatie. Este posibil ca, pentru o evaluare cat mai exacta, sa fie necesara o vizita a personalului nostru la 
            locatia stabilita. Daca sunt necesare detalii suplimentare, veti fi contactat de personalul nostru la telefon sau pe adresa de mail comunicata.
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="mt-16" id="form_solicita_cotatie" method="POST" action="{{ url('/solicita-cotatie') }}" enctype="multipart/form-data">
        @csrfWithoutAutocomplete
        <div class="grid grid-3 gap-md">
            <div class="form-group">
                <label>Nume sau firma <span class="text-red">*</span></label>
                <input placeholder="Nume sau firma" type="text" class="w-full" name="name" required>
            </div>
            <div class="form-group">
                <label>Email <span class="text-red">*</span></label>
                <input placeholder="Email" type="email" class="w-full" name="email" required>
            </div>
            <div class="form-group">
                <label>Telefon <span class="text-red">*</span></label>
                <input placeholder="Telefon" type="text" class="w-full" name="phone" required>
            </div>
        </div>
        <div class="grid grid-3 gap-md mt-16">
            <div class="form-group">
                <label>Adresa completa</label>
                <input placeholder="Adresa completa" type="text" class="w-full" name="address">
            </div>
            <div class="form-group">
                <label>Localitate</label>
                <input placeholder="Localitate" type="text" class="w-full" name="city">
            </div>
            <div class="form-group">
                <label>Suprafata totala</label>
                <input placeholder="Suprafata totala" type="text" class="w-full" name="surface">
            </div>
        </div>
        <div class="grid grid-4 gap-md mt-16">
            <div class="form-group">
                <label>Utilizare</label>
                <select class="w-full" name="usage">
                    <option selected value> -- Selecteaza o optiune -- </option>
                    <option value="Rezidential">Rezidential</option>
                    <option value="Industrial">Industrial</option>
                    <option value="Comercial">Comercial</option>
                </select>
            </div>
            <div class="form-group">
                <label>Aplicare</label>
                <select class="w-full" name="application">
                    <option selected value> -- Selecteaza o optiune -- </option>
                    <option value="Pardoseala Autonivelanta">Pardoseala Autonivelanta</option>
                    <option value="Pardoseala Decorativa">Pardoseala Decorativa</option>
                    <option value="Covor de cuartz STB">Covor de cuartz STB</option>
                    <option value="Vopsire de pardoseala">Vopsire de pardoseala</option>
                </select>
            </div>
            <div class="form-group">
                <label>Interior/ Exterior</label>
                <select class="w-full" name="interior_exterior">
                    <option selected value> -- Selecteaza o optiune -- </option>
                    <option value="1">Interior</option>
                    <option value="2">Exterior</option>
                </select>
                
            </div>
            <div class="form-group">
                <label>Incarca o imagine/arhiva (max. 10Mb)</label>
                <input type="file" class="w-full" name="file" accept=".jpg,.jpeg,.png,.rar,.zip">
            </div>
        </div>
        <div class="form-group mt-16">
            <label for='solicita-oferta_mesaj'>Mesaj <span class="text-red">*</span></label>
            <textarea rows="10" class="w-full" name="message" id="solicita-oferta_mesaj" placeholder="Va rugam sa incercati sa ne oferiti cat mai multe detalii, despre suport si starea acestuia. Va multumim !" required></textarea>
        </div>            
        <div class="row justify-center mt-16">
            <input type="submit" value="Trimite" class="btn btn-blue">
        </div>
    </form>
</section>
@endsection
