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
                <div class="fatade-{{ $k }}-tab tab-card text-white {{ $loop->first ? 'rounded-start-xs' : '' }} {{ $loop->last ? 'rounded-end-xs' : '' }}" [class]="vopsele.currentTab != {{ $loop->index }} ? 'fatade-{{ $k }}-tab tab-card text-white {{ $loop->first ? 'rounded-start-xs' : '' }} {{ $loop->last ? 'rounded-end-xs' : '' }}' : 'fatade-{{ $k }}-tab active tab-card text-dark {{ $loop->first ? 'rounded-start-xs' : '' }} {{ $loop->last ? 'rounded-end-xs' : '' }}'">
                    {{ $k }}
                </div>
                <div id="underline-{{ $loop->index }}" class="hidden underline fatade-{{ $k }}-tab"></div>
            </a>
        @endforeach
    </div>
    
    
    <div class="parent-grid h-full mt-16">
        <div class="col">
            <p class="info-container">
                Aceasta cartela are doar caracter orientativ. Datorita diferentelor de redare dintre monitoare pentru o culoare exacta este necesar sa consultati un paletar
                "Emex by Romtehnochim".
            </p>
    
            <div class="w-full mt-16 h-full big-color ABC-0xf2e8f5" [class]="vopsele.currentClass + ' h-full w-full mt-16 big-color'" id="big">
                <div class="dialog-bubble">
                    Selectati o culoare pentru previzualizare.
                </div>
            </div>
            <p id="big-text" class="text-center" [text]="vopsele.currentText"> A1 - a </p>
        </div>
        <div class="height-contrain">
            @foreach ($final_colors as $k => $v)
                <div id="colors-{{ $loop->index }}" class="culori-container" style="display: none;">
                    @foreach ($v as $color)
                        <div class="col align-center gap-xs">
                            <div role="button" class="color ABC-{{ $color['value'] }}" onclick="selectColor('{{ $color['name'] }}', '{{ $color['value'] }}')">
                            </div>
                            <div class="text-center">{{ $color['name'] }}</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    
</div>

<script>
    let currentTab = 0;

    function selectTab(index) {
        // Ascunde toate seturile de culori
        document.querySelectorAll('.culori-container').forEach((el) => {
            el.style.display = 'none';
        });

        // Afișează doar setul de culori selectat
        document.getElementById(`colors-${index}`).style.display = 'block';

        // Resetează toate tab-urile
        document.querySelectorAll('.tab-card').forEach((tab) => {
            tab.classList.remove('active');
            tab.classList.remove('text-dark');
            tab.classList.add('text-white');
        });

        // Activează tab-ul selectat
        const selectedTab = document.querySelector(`.tab-card:nth-child(${index + 1})`);
        selectedTab.classList.add('active');
        selectedTab.classList.add('text-dark');
        selectedTab.classList.remove('text-white');

        currentTab = index;
    }

    function selectColor(name, value) {
        // Modifică clasa și textul pentru culoarea selectată
        const bigColor = document.getElementById('big');
        bigColor.className = `big-color ABC-${value}`;

        const bigText = document.getElementById('big-text');
        bigText.textContent = name;
    }

    // Afișează prima categorie la încărcarea paginii
    window.onload = function() {
        selectTab(0);
    };
</script>

@endsection
