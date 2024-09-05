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
                           {{ $loop->first ? 'rounded-start-xs' : '' }} 
                           {{ $loop->last ? 'rounded-end-xs' : '' }}" 
                    [class]="vopsele.currentTab != {{ $loop->index }} ? 
                              'fatade-{{ $k }}-tab tab-card text-white 
                               {{ $loop->first ? 'rounded-start-xs' : '' }} 
                               {{ $loop->last ? 'rounded-end-xs' : '' }}' : 
                              'fatade-{{ $k }}-tab active tab-card text-dark 
                               {{ $loop->first ? 'rounded-start-xs' : '' }} 
                               {{ $loop->last ? 'rounded-end-xs' : '' }}'">
                    {{ $k }}
                </div>
                <div [class]="vopsele.currentTab != {{ $loop->index }} ? 
                               'hidden' : 
                               'underline fatade-{{ $k }}-tab'"></div>
            </a>
        @endforeach
    </div>
    

    <div class="parent-grid h-full mt-16">
        <div class="col">
            <p class="info-container">
                Aceasta cartela are doar caracter orientativ. Datorita diferentelor de redare dintre monitoare pentru o culoare exacta este necesar sa consultati un paletar "Emex by Romtehnochim".
            </p>

            <div class="w-full mt-16 h-full big-color ABC-0xf2e8f5" [class]="vopsele.currentClass + ' h-full w-full mt-16 big-color'" id="big">
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
    // function selectTab(index) {
    //     document.querySelectorAll('.culori-container').forEach((container, idx) => {
    //         container.classList.toggle('hidden', idx !== index);
    //     });
    //     document.querySelectorAll('.underline').forEach((underline, idx) => {
    //         underline.classList.toggle('hidden', idx !== index);
    //     });
    // }

    function selectTab(index) {
    document.querySelectorAll('.underline').forEach(underline => {
        underline.classList.add('hidden');
    });

    document.getElementById('underline-' + index).classList.remove('hidden');

    // Schimbă clasa activă pentru tab-uri
    document.querySelectorAll('.tab-card').forEach(tab => {
        tab.classList.remove('active', 'text-dark');
        tab.classList.add('text-white');
    });

    let activeTab = document.querySelectorAll('.tab-card')[index];
    activeTab.classList.add('active', 'text-dark');
    activeTab.classList.remove('text-white');

    // Stochează starea curentă a tab-ului (optional)
    // vopsele.currentTab = index;
}


    function selectColor(value, text) {
        document.getElementById('big').className = 'w-full mt-16 h-full big-color ABC-' + value;
        document.getElementById('big-text').textContent = text;
    }
</script>
@endsection