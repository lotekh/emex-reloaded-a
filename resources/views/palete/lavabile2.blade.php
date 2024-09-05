@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cartela-lavabile-culori.css') }}">
<link rel="stylesheet" href="{{ asset('css/culori.css') }}">
@endsection

@section('content')
<div class="main-container col culori">
    <h2 class="text-center font-400" id="rt">Vopsele Lavabile si Tencuieli - Paleta de culori</h2>
    <div class="selector-row mt-16">
        @php $incrementing = 0 @endphp
        @foreach ($final_colors as $k => $v)
            <a class="col" data-toggle="tab" role="button" tabindex="0" onclick="setCurrentTab({{ $incrementing }});">
                <div id="lavabile-box-{{$incrementing}}" class="fatade-{{ $k }}-tab tab-card text-white {{ $incrementing == 0 ? 'rounded-start-xs' : '' }} {{ $incrementing == count($final_colors) - 1 ? 'rounded-end-xs' : '' }}">
                    {{ $k }}
                </div>
                <div id="underline-{{$incrementing}}-{{$k}}">
                </div>
            </a>
            @php $incrementing++ @endphp
        @endforeach
    </div>
</div>

<script>
    let currentTab = 0;

    function setCurrentTab(index){
        currentTab = index;
        updateUnderline();
        updateLavabileBoxes();
    }

    function updateUnderline() {
        document.querySelectorAll('[id^="underline-"]').forEach((tab) => {
            // Extrage index-ul și valoarea k din id-ul fiecărui tab
            const idParts = tab.id.split('-');
            const tabIndex = parseInt(idParts[1], 10); // indexul din id-ul div-ului
            const tabK = idParts[2]; // valoarea $k din id-ul div-ului

            if (tabIndex === currentTab) {
                tab.classList.remove('hidden');
                tab.classList.add('underline', `fatade-${tabK}-tab`);
            } else {
                tab.classList.add('hidden');
                tab.classList.remove('underline', `fatade-${tabK}-tab`);
            }
        });
    }

    function updateLavabileBoxes() {
        document.querySelectorAll('[id^="lavabile-box-"]').forEach((box, boxIndex) => {
            if (boxIndex === currentTab) {
                box.classList.add('active', 'text-dark');
                box.classList.remove('text-white');
            } else {
                box.classList.remove('active', 'text-dark');
                box.classList.add('text-white');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateUnderline(); 
        updateLavabileBoxes();
    });

</script>

@endsection