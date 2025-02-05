@extends('layout.layout')

@section('seo')
<title>Paletar de Culori Vopsea Lavabila - Paleta Culori</title>
<meta name="keywords" content="paletar, paleta, cartela culori, culori lavabila">
<meta name="description" content="Instrument online ⭐ Paleta de Culori pentru Vopsea Lavabila si Tencuieli Decorative. Paletar sau Cartela de culori ✅ Alege Culoarea din Mii de Nuante !">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Paletar de culori vopsele lavabile">
<meta property="og:image" content="https://emex.ro/images/social/Paleta-vopsele-lavabile-interior-exterior-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Paleta-vopsele-lavabile-interior-exterior-sm.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="628" />
<meta property="og:image:alt" content="Cartela de culori vopsele apa" />
<meta property="og:description" content="Pentru vopseaua lavabila sau tencuiala decorativa poti sa alegi nuanta dorita din mii de culori prezente in paletarul sau cartela de culori &#8220;Emex&#8221;.">
<meta property="og:url" content="https://emex.ro/cartela-culori-lavabile">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Romtehnochim">
<meta name="twitter:image" content="https://emex.ro/images/social/Paleta-vopsele-lavabile-interior-exterior-sm.jpg">
<meta name="twitter:image:alt" content="Catalog cartela de culori - Paleta lavabile">
<meta name="twitter:title" content="⭐ Paletar de culori lavabile">
<meta name="twitter:description" content="Alege nuanta dorita din mii de culori prezente intr-un paletar de culori online de vopsea lavabila si tencuiala decorativa.">
<meta name="twitter:url" content="https://emex.ro/cartela-culori-lavabile">
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bundled/culori-lavabile.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Toate Produsele</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Vopsele Lavabile si Tencuieli - Paleta de culori</li></ul>
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

    <div class="parent-grid h-full mt-16">

        <div class="col">
            <p class="info-container">
                Cartela are doar caracter orientativ. Datorita diferentelor dintre monitoare pentru o culoare exacta trebuie sa consultati un paletar fizic. <em>Intre loturi sunt posibile mici diferente de nuanta</em>.
            </p>
            <div class="w-full mt-16 h-full big-color ABC-0xf2e8f5" id="big">
                <div class="dialog-bubble">
                    Selectati o culoare pentru previzualizare.
                </div>
            </div>
            <p id="big-text" class="text-center"> A1 - a </p>
        </div>

        <div class="height-contrain">
            @php $incrementing = 0 @endphp
            @foreach ($final_colors as $k => $v)
                <div id="{{$k}}" class="culorilavabile-{{ $incrementing }}">
                    @foreach ($v as $color)
                        <div class="col align-center gap-xs">
                            <div role="button" class="color {{ 'ABC-' . $color['value'] }}" onclick="selectColor('{{ $color['value'] }}', '{{ $color['name'] }}')"></div>
                            <div class="text-center">{{ $color['name'] }}</div>
                        </div>
                    @endforeach
                </div>
                @php $incrementing++ @endphp
            @endforeach
        </div>
    </div>
</div>

<div class="modal-ral" id="promotie_modal">
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

            <button type="button" onclick="closeModalRal()" class="close" data-dismiss="modal" aria-hidden="true" id="close_promotie_modal" aria-label="Inchide">
                Am inteles
            </button>
        </div>
    </div>
</div>

<script>
    let currentTab = 0;

    function setCurrentTab(index){
        currentTab = index;
        updateUnderline();
        updateLavabileBoxes();
        updateCuloriContainers()
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

    function updateCuloriContainers() {
        document.querySelectorAll('[class*="culorilavabile-"]').forEach((element) => {
            // Extragem valoarea lui $incrementing din clasa elementului
            const classList = element.className.split(' ');
            let incrementingValue = null;

            classList.forEach(cls => {
                if (cls.startsWith('culorilavabile-')) {
                    incrementingValue = parseInt(cls.split('-')[1], 10); // Extragem valoarea lui $incrementing
                }
            });

            // Comparăm currentTab cu valoarea lui $incrementing
            if (incrementingValue === currentTab) {
                element.classList.add('culori-container');
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
                element.classList.remove('culori-container');
            }
        });
    }

    function selectColor(value, text) {
        document.getElementById('big').className = 'w-full mt-16 h-full big-color ABC-' + value;
        document.getElementById('big-text').textContent = text;
    }

    function closeModalRal() {
        document.getElementById('promotie_modal').classList.add('hide-modal');
        // document.getElementById('promotie_modal').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateUnderline(); 
        updateLavabileBoxes();
        updateCuloriContainers()
    });

</script>

@endsection