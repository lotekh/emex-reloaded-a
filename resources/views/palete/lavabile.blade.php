@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cartela-lavabile-culori.css') }}">
<link rel="stylesheet" href="{{ asset('css/culori.css') }}">
@endsection

@section('content')
<div class="main-container col culori">
    <h2 class="text-center font-400" id="rt">Vopsele Lavabile si Tencuieli - Paleta de culori</h2>
    <div class="selector-row mt-16">
        @foreach ($final_colors as $k => $v)
            <a class="col" role="button" tabindex="0" onclick="selectTab({{ $loop->index }})">
                <div class="tab-card text-white {{ $loop->first ? 'rounded-start-xs' : '' }} {{ $loop->last ? 'rounded-end-xs' : '' }}">
                    {{ $k }}
                </div>
                <div id="underline-{{ $loop->index }}" class="hidden underline"></div>
            </a>
        @endforeach
    </div>

    <div class="parent-grid h-full mt-16">
        <div class="col">
            <p class="info-container">
                Aceasta cartela are doar caracter orientativ. Datorita diferentelor de redare dintre monitoare pentru o culoare exacta este necesar sa consultati un paletar "Emex by Romtehnochim".
            </p>

            <div id="big-color" class="w-full mt-16 h-full big-color">
                <div class="dialog-bubble">
                    Selectati o culoare pentru previzualizare.
                </div>
            </div>
            <p id="big-text" class="text-center"> A1 - a </p>
        </div>
        <div class="height-contrain">
            @foreach ($final_colors as $k => $v)
                <div id="colors-{{ $loop->index }}" class="culori-container hidden">
                    @foreach ($v as $color)
                        <div class="col align-center gap-xs">
                            <div role="button" class="color {{ 'ABC-' . $color['value'] }}" onclick="selectColor('{{ $color['value'] }}', '{{ $color['name'] }}')"></div>
                            <div class="text-center">{{ $color['name'] }}</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function selectTab(index) {
        document.querySelectorAll('.culori-container').forEach((container, idx) => {
            container.classList.toggle('hidden', idx !== index);
        });
        document.querySelectorAll('.underline').forEach((underline, idx) => {
            underline.classList.toggle('hidden', idx !== index);
        });
    }

    function selectColor(value, text) {
        document.getElementById('big-color').className = 'w-full mt-16 h-full big-color ABC-' + value;
        document.getElementById('big-text').textContent = text;
    }
</script>
@endsection
