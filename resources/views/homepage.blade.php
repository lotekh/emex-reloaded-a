@extends('layout.layout')

@section('seo')
<title>Vopsea tencuiala pardoseala | Emex by Romtehnochim</title>
<meta name="keywords" content="emex by romtehnochim, vopsea epoxidica emex, vopsea lavabila emex, tencuiala decorativa emex">
<meta name="description" content="Emex by romtehnochim este denumirea sub care producem vopsea epoxidica emex, tencuiala decorativa emex sau vopsea lavabila emex, in general, vopsea emex">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Emex: Vopsele | Tencuieli | Pardoseli">
<meta property="og:image" content="https://emex.ro/images/social/Coperta-Emex-ro-Instagram.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Coperta-Emex-ro-Instagram.jpg"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Productie si aplicari de vopsele"/>
<meta property="og:description" content="Romtehnochim produce in gama &#8220;Emex&#8221; vopsea si pardoseli epoxidice, poliuretanice sau poliesterice, dar si o gama larga de vopsele speciale sau industriale.">
<meta property="og:url" content="https://emex.ro/index">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Romtehnochim">
<meta name="twitter:image" content="https://emex.ro/images/social/Coperta-Emex-ro-Instagram.jpg">
<meta name="twitter:title" content="Emex by Romtehnochim">
<meta name="twitter:description" content="Producator de vopsele, tencuieli si pardoseli, intr-o gama variata, cu proprietati profesionale si rezultate de inalta calitate.">
<meta name="twitter:url" content="https://emex.ro/index">
@endsection

@section('title')
    <title>Vopsea tencuiala pardoseala | Emex by Romtehnochim</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/homepage.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs ellipsis"><a href="/">Acasa</a></li></ul>
@endsection


@section('content')

    <div class="w-full" id="homepage">
        @include('site.partials.homepage-slider')



        @include('site.partials.homepage-about')


        <div class="bg-blue" id="hp_first_paralax">
        <div class="container hp_paralax_text">
            &#8220;Emex&#8221; - Performanta si profesionalism !
        </div>
        </div>
        @include('site.partials.homepage-cards')
    </div>


@endsection

{{-- @include('components.sidebar-contact', ['secondary_title' => 'vopsele']) --}}




