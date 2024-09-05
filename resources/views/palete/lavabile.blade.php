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
                <div 
                    class="fatade-{{ $k }}-tab tab-card text-white 
                           {{ $loop->first ? 'rounded-start-xs active text-dark' : '' }} 
                           {{ $loop->last ? 'rounded-end-xs' : '' }}" 
                    id="tab-{{ $loop->index }}">
                    {{ $k }}
                </div>
                <div id="underline-{{ $loop->index }}" class="underline fatade-{{ $k }}-tab {{ $loop->first ? '' : 'hidden' }}"></div>
            </a>
        @endforeach
    </div>
    
    <div class="parent-grid h-full mt-16">
        <div class="col">
            <p class="info-container">
                Aceasta cartela are doar caracter orientativ. Datorita diferentelor de redare dintre monitoare pentru o culoare exacta este necesar sa consultati un paletar "Emex by Romtehnochim".
            </p>

            <div class="w-full mt-16 h-full big-color ABC-0xf2e8f5" id="big">
                <div class="dialog-bubble">
                    Selectati o culoare pentru previzualizare.
                </div>
            </div>
            <p id="big-text" class="text-center"> A1 - a </p>
        </div>
        <div class="height-contrain">
            @foreach ($final_colors as $k => $v)
                <div id="colors-{{ $loop->index }}" class="culori-container {{ $loop->first ? '' : 'hidden' }}">
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
        // Ascunde toate paletele de culori
        document.querySelectorAll('.culori-container').forEach(container => {
            container.classList.add('hidden');
        });

        // Afișează doar culorile din tab-ul selectat
        document.getElementById('colors-' + index).classList.remove('hidden');

        // Ascunde toate subliniaturile
        document.querySelectorAll('.underline').forEach(underline => {
            underline.classList.add('hidden');
        });

        // Afișează subliniatura pentru tab-ul activ
        document.getElementById('underline-' + index).classList.remove('hidden');

        // Schimbă clasa activă pentru tab-uri
        document.querySelectorAll('.tab-card').forEach(tab => {
            tab.classList.remove('active', 'text-dark');
            tab.classList.add('text-white');
        });

        let activeTab = document.getElementById('tab-' + index);
        activeTab.classList.add('active', 'text-dark');
        activeTab.classList.remove('text-white');
    }

    function selectColor(value, text) {
        // Schimbă culoarea și textul de previzualizare
        document.getElementById('big').className = 'w-full mt-16 h-full big-color ABC-' + value;
        document.getElementById('big-text').textContent = text;
    }

    // Inițializează tab-ul și culorile corespunzătoare la încărcarea paginii
    document.addEventListener('DOMContentLoaded', function() {
        selectTab(0); // Selectează primul tab la încărcarea paginii
    });
</script>

@endsection
