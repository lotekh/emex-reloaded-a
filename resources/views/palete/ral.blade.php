@extends('layout.layout')

@section('seo')
<title>Cartela Paletar de Culori RAL / Catalog de Culori</title>
<meta name="keywords" content="paletar RAL, paletar culori, cartela">
<meta name="description" content="Pentru o nuantare finala de finete a vopselelor solventate este necesara folosirea unui ⭐ Catalog sau Paletar de Culori RAL - ✅ Cartela RAL de culori !">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="⭐ Cartela RAL pentru vopsele in solvent">
<meta property="og:image" content="https://emex.ro/images/social/Paletar-cartela-culori-ral-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Paletar-cartela-culori-ral-sm.jpg"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Paletar catalog de culori RAL"/>
<meta property="og:description" content="Paletar RAL pentru alegerea culorilor sau nuantelor de vopsele pe baza de rasini sintetice solventate alchidice epoxidice poliuretanice clorcauciuc etc.">
<meta property="og:url" content="https://emex.ro/cartela-culori-ral-vopsele">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Romtehnochim">
<meta name="twitter:image" content="https://emex.ro/images/social/Paletar-cartela-culori-ral-sm.jpg">
<meta name="twitter:image:alt" content="Catalog cartela de culori-Paletar RAL">
<meta name="twitter:title" content="⭐ Paletar de culori RAL">
<meta name="twitter:description" content="Cartela de culori RAL, utilizata ca paletar sau catalog de culori este un instrument important in alegerea nuantei de vopsea dorite.">
<meta name="twitter:url" content="https://emex.ro/cartela-culori-ral-vopsele">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/culori-ral.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Cartela Paletar de Culori RAL Vopsele</li></ul>
@endsection

@section('content')
<div class="main-container col culori">
    <h2 class="text-center font-400" id="rt">Vopsele si Emailuri - Cartela RAL</h2>

    <div class="parent-grid h-full mt-16">
        <div class="col">
            <p class="info-container">
                Aceasta cartela are doar caracter orientativ. Datorita diferentelor de redare dintre monitoare pentru o culoare exacta este necesar sa consultati un paletar "Emex by Romtehnochim"
            </p>

            <div class="w-full mt-16 h-full big-color ABC-ddd882" id="big">
                <div class="dialog-bubble">
                    Selectati o culoare pentru previzualizare.
                </div>
            </div>
            <p id="big-text" class="text-center"> RAL 1000 </p>
        </div>
        <div class="height-contrain culori-container">
            @foreach ($color_codes as $color_patten => $color)
                <div class="col align-center gap-xs">
                    <div class="color ABC-{{ $color }}" onclick="updateBigColor('{{ $color }}', '{{ $color_patten }}')" role="button" tabindex="0"></div>
                    <div class="text-center">{{ $color_patten }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
<div class="modal-ral" id="promotie_modal_1">
    <div class="modal-dialog">
        <div class="modal-header">
            <div>
                <img width="40" height="35" class="atentie-consum" src="{{ asset('resources/images/general/emex_warning.png') }}" alt="Atentie suprafete nerecomandate">
            </div>
            <p class="modal-title text-center">Atentie</p>
            <p class="text-center note mark">Aceasta cartela are doar rol informativ</p>
        </div>
        <div class="modal-content">
            <p class="text-center font-xl-ral">Pentru culori sau nuante folositi<br>doar cartele de culori standardizate,<br>printate pe suport fizic.</p>
            <button type="button" onclick="closeModalRal()" class="close" aria-hidden="true" aria-label="Inchide" id="close_promotie_modal">Am inteles</button>
        </div>
    </div>
</div>

<script>
    function updateBigColor(color, text) {
        document.getElementById('big').className = 'w-full mt-16 h-full big-color ABC-' + color;
        document.getElementById('big-text').innerText = text;
    }

    function closeModalRal() {
        document.getElementById('promotie_modal_1').classList.add('hide-modal');
        // document.getElementById('promotie_modal_1').style.display = 'none';
    }

</script>

@endsection
