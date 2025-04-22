@extends('layout.layout')

@section('seo')
<title>Angajari personal Romtehnochim</title>
<meta name="keywords" content="angajari operatori chimisti, inginer chimist, specialist pardoseli epoxidice, montatori pardoseli turnate">
<meta name="description" content="Romtehnochim angajeaza personal calificat pentru vopsiri si aplicari de pardoseli epoxidice si poliuretanice ingineri operatori si tehnologi vopsele">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Veniti in echipa Romtehnochim">
<meta property="og:image" content="https://emex.ro/images/social/Angajari-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Angajari-sm.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" content="Angajari Romtehnochim" />
<meta property="og:description" content="Angajam personal calificat pentru vopsiri si aplicari de pardoseli epoxidice si poliuretanice ingineri operatori si tehnologi vopsele.">
<meta property="og:url" content="https://emex.ro/angajari">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website" />
<!--meta name="Author" content="Emex by Romtehnochim">
<link href="https://plus.google.com/+EmexRomtehnochim" rel="license">
<meta name="rating" content="General"-->
<meta name="geo.region" content="RO-IF">
<meta name="geo.placename" content="Jilava">
<meta name="geo.position" content="44.328689;26.067273">
<meta name="ICBM" content="44.328689,26.067273">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/angajari.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bundled/aplicare.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Angajari</li></ul>
@endsection

@section('content')

<style>
    #header_img_bg_angajari {
        background-image: url("{{ asset('resources/Angajari-Romtehnochim.jpg') }}");
        display: flex;
    }
</style>

<div class="aplicari relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg_angajari">
        <h1 class="z-10">
            Emex by Romtehnochim <br>
            Te invita alaturi de noi
        </h1>
    </div>
</div>

<div class="main-container col">
    <h3>Formular de aplicare Emex</h3>
    <p>
        Daca sunteti interesat sa faceti parte din echipa ROMTEHNOCHIM completati mai jos datele dumneavoastra. Trimiteti-va CV-ul, iar noi vom legatura cu dumneavoastra in cel mai scurt timp. Pentru mai multe informatii, puteti sa si sunati la: 0724-509.552
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="mt-64" method="POST" action="{{ url('/angajari') }}" enctype="multipart/form-data" id="angajari_wrapper">
        @csrfWithoutAutocomplete
        <div class="grid grid-3 gap-md">
            <div class="form-group">
                <label>Nume <span class="text-red">*</span></label>
                <input class="w-full form-control" type="text" placeholder="Nume..." name="Angajari[name]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Data Nasterii <span class="text-red">*</span></label>
                <input class="w-full form-control" type="date" name="Angajari[date_of_birth]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Adresa <span class="text-red">*</span></label>
                <input class="w-full form-control" type="text" placeholder="Adresa..." name="Angajari[address]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Cod Postal <span class="text-red">*</span></label>
                <input class="w-full form-control" type="text" placeholder="Cod Postal..." name="Angajari[postal_code]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Email <span class="text-red">*</span></label>
                <input class="w-full form-control" type="email" placeholder="Email..." name="Angajari[email]" aria-required="true" required="required">
            </div>
            <div class="form-group">
                <label>Sex <span class="text-red">*</span></label>
                <select class="w-full" name="Angajari[gender]" aria-required="true" required="required">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
            </div>
        </div>
        <div class="grid grid-2 gap-md mt-16">
            <div class="form-group">
                <label>Oras <span class="text-red">*</span></label>
                <input class="w-full form-control" type="text" placeholder="Oras..." name="Angajari[city]" aria-required="true" required="required">
            </div>

            <div class="form-group">
                <label>CV <span class="text-red">*</span></label>
                <input class="w-full form-control" type="file" name="Angajari[upload]" aria-required="true" required="required">
            </div>
        </div>
        <div class="form-group mt-32">
            <label>Mesaj <span class="text-red">*</span></label>
            <textarea class="w-full" id="apm" placeholder="Mesaj..." name="Angajari[message]" rows="10" aria-required="true" required="required"></textarea>
        </div>

        <div class="row justify-center mt-32">
            <input type="submit" value="Trimite" id="aps_btn" class="btn btn-blue">
        </div>
    </form>
</div>

@endsection
