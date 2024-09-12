@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cartela-ral-culori.css') }}">
    <link rel="stylesheet" href="{{ asset('css/culori.css') }}">
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
            <p id="big-text" class="text-center"> A1 - a </p>
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
    
<div class="modal" id="promotie_modal_1">
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

    // document.addEventListener('DOMContentLoaded', function() {
    //     document.getElementById('promotie_modal').classList.remove('hide-modal');
    // });
</script>
@endsection
