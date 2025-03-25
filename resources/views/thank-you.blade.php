@extends('layout.layout')

@section('seo')
<title>Confirmare trimitere mail</title>
<meta name="keywords" content="confirmare mail, mail solicitate, formular multumire">
<meta name="description" content="Va multumim pentru solicitare">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Thank you</li></ul>
@endsection

@section('content')
{{-- <div class="main-container">
    <h2 class="text-center mt-32"> VA MULTUMIM, <br> MESAJUL A FOST TRIMIS CU SUCCES ! </h2>
    <p class="text-center mt-32">
        In functie de solicitare, veti fi contactat sau vi se va raspunde cat mai urgent !<br>
        Pentru a fi redirectionat inapoi in pagina, <a href="{{ url()->previous() }}"><em class="text-blue">Click aici !</em></a>
    </p>
    <p class="text-center mt-32">
        IP dumneavoastra va fi logat in scopuri de securitate.<br> 
        <a href="https://emex.ro/confidentialitate-gdpr"><span class="text-blue"><em>Prelucrarea datelor </em></span></a> va fi efectuata doar in conformitate cu prevederile Regulamentului UE nr. 679/2016.
    </p>
</div> --}}

<div class="main-container" style="min-height: 500px;">
    <div id="plata_main_row">
        <div class="col-md-12 mb-60" id="Fond-plata">
            <div class="success">
                <p class="mail-sent paragraph-thank-you">VA MULTUMIM,<br> MESAJUL A FOST TRIMIS CU SUCCES !</p>
                <p class="paragraph-thank-you">In functie de solicitare, veti fi contactat sau vi se va raspunde cat mai urgent !<br> Pentru a fi redirectionat inapoi in pagina, <a href="{{ url()->previous() }}"><em class="green-mark">Click aici !</em></a></p>
                <p class="text-center paragraph-thank-you">IP dumneavoastra va fi logat in scopuri de securitate.<br><a href="https://emex.ro/confidentialitate-gdpr"><span class="link_color1"><em>Prelucrarea datelor</em></span></a> va fi efectuata doar in conformitate cu prevederile Regulamentului UE nr. 679/2016.</p>
            </div>
        </div>
    </div>
</div>
@endsection 


