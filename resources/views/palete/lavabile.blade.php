@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/produs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/culori.css') }}">
@endsection

@section('content')
<div class="main-container col culori">
    <h2 class="text-center font-400" id="rt">Vopsele Lavabile si Tencuieli - Paleta de culori</h2>
    <div class="selector-row mt-16">
        @php $incrementing = 0; @endphp
        @foreach ($final_colors as $k => $v)
            <a class="col" role="button" tabindex="0" onclick="setTab({{ $incrementing }});">
                <div class="tab-card text-white fatade-{{ $k }}-tab {{ $incrementing == 0 ? 'rounded-start-xs' : '' }} {{ $incrementing == count($final_colors) - 1 ? 'rounded-end-xs' : '' }} @if($incrementing != 0) hidden @endif" id="tab-{{ $incrementing }}">
                    {{ $k }}
                </div>
                <div class="underline fatade-{{ $k }}-tab @if($incrementing != 0) hidden @endif" id="underline-{{ $incrementing }}"></div>
            </a>
            @php $incrementing++; @endphp
        @endforeach
    </div>

    <div class="parent-grid h-full mt-16">
        <div class="col">
            <p class="info-container">
                Aceasta cartela are doar caracter orientativ. Datorita diferentelor de redare dintre monitoare pentru o culoare exacta este necesar sa consultati un paletar
                "Emex by Romtehnochim".
            </p>

            <div class="w-full mt-16 h-full big-color ABC-0xf2e8f5" id="big-color">
                <div class="dialog-bubble">
                    Selectati o culoare pentru previzualizare.
                </div>
            </div>
            <p id="big-text" class="text-center"> A1 - a </p>
        </div>
        <div class="height-contrain">
            @php $incrementing = 0; @endphp
            @foreach ($final_colors as $k => $colors)
                <div class="culori-container @if($incrementing != 0) hidden @endif" id="color-container-{{ $incrementing }}">
                    @foreach ($colors as $color)
                        <div class="col align-center gap-xs">
                            <div role="button" class="color ABC-{{ $color['value'] }}" onclick="setColor('{{ $color['value'] }}', '{{ $color['name'] }}');" tabindex="0"></div>
                            <div class="text-center">{{ $color['name'] }}</div>
                        </div>
                    @endforeach
                </div>
                @php $incrementing++; @endphp
            @endforeach
        </div>
    </div>
</div>

<div class="modal" id="promotie_modal">
    <div class="modal-dialog">
        <div class="modal-header">
            <div>
                <img width="40" height="35" class="atentie-consum" src="{{ asset('resources/images/general/emex_warning.png') }}" alt="Atentie suprafete nerecomandate">
            </div>
            <p class="modal-title text-center">Atentie !</p>
            <p class="text-center note mark">
                Aceasta cartela are doar rol informativ
            </p>
        </div>
        <div class="modal-content">
            <p class="text-center font-xl-ral">
                Pentru culori sau nuante folositi<br>doar cartele de culori standardizate,<br>printate pe suport fizic.
            </p>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close_promotie_modal" onclick="closeWarningModal();">
                Am inteles
            </button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function setTab(tabIndex) {
        document.querySelectorAll('.culori-container').forEach(function(el, index) {
            if (index === tabIndex) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        });
        
        document.querySelectorAll('.tab-card').forEach(function(el, index) {
            if (index === tabIndex) {
                el.classList.remove('text-white');
                el.classList.add('text-dark');
            } else {
                el.classList.add('text-white');
                el.classList.remove('text-dark');
            }
        });
    }

    function setColor(colorClass, colorName) {
        document.getElementById('big-color').className = 'w-full mt-16 h-full big-color ABC-' + colorClass;
        document.getElementById('big-text').innerText = colorName;
    }

    function closeWarningModal() {
        document.getElementById('promotie_modal').classList.add('hide-modal');
        setTab(0); // reset to first tab
    }
</script>
@endsection
