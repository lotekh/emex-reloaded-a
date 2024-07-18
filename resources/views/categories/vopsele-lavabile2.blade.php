@extends('layout.layout')

@section('content')

<?php
$base_url = url('/');
$current_page = 1;
$per_page = 6;
$numsPerPage = [6, 12, 24, 48];
$total_results = 17;
$total_pages = ceil($total_results / $per_page);
?>

<div class="col main-container">
    <div id="cdr">
        <h1>Vopsele Lavabile</h1>
        <p><span class="alineat_span"></span>Romtehnochim produce vopsea lavabila, in proportie de peste 90% profesionala, cu grad ridicat de acoperire si rezistenta superioara la factori corozivi sau de mediu, cu aplicabilitate industriala si caracteristici superioare ale peliculei, cum ar fi elasticitate, lavabilitate ridicata, rezistenta la patare, etc.<br> <span class="alineat_span"></span>Exista si o grupa de produse economice, sub denumirea generica “Neomatt”, care desi au caracteristici bune de pelicula, sunt cautate sub denumirea de <em>var lavabil</em>. Acestea au un pret scazut, dar la un raport foarte bun calitate/ pret.<br> <span class="alineat_span"></span>Produsele din categoria <strong><em>“Vopsea lavabila”</em></strong> sunt non-toxice datorita formularii low-COV sau COV-free, adica fie au continut foarte scazut de compusi organici volatili, fie nu au deloc. Oricum, in general, marja in care acestia se regasesc in vopselele lavabile “Emex” nu depaseste un maxim de 10%, in cazuri speciale. </p>
    </div>
    <div class="flex justify-between align-center categories-header gap-lg mt-32">
        <div class="flex col">
            <p class="mr-8 mb-8">Produse pe pagina:</p>
            <div class="flex row">
                @foreach ($numsPerPage as $num)
                    <a href="?per_page={{ $num }}">
                        <button class="btn btn-empty rounded-sm {{ $per_page == $num ? 'active' : '' }} mr-8">
                            {{ $num }}
                        </button>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex col align-end">
            <p class="m-0 mb-8">
                <strong>{{ $total_results }}</strong> produse gasite
            </p>

            <!-- pagination -->
            <ul class="row align-center justify-center pagination gap-md">
                <li>
                    <form method="get" action="{{ url()->current() }}">
                        @csrf
                        <input type="hidden" name="category_name" value="vopsele-lavabile" />
                        <input type="hidden" name="per_page" value="{{ $per_page }}" />
                        <button aria-label="Inapoi" type="submit" {{ $current_page <= 1 ? 'disabled' : '' }} value="{{ $current_page - 1 }}" name="current_page_number">
                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4716 3.52858C10.7319 3.78892 10.7319 4.21103 10.4716 4.47138L6.94297 7.99998L10.4716 11.5286C10.7319 11.7889 10.7319 12.211 10.4716 12.4714C10.2112 12.7317 9.78911 12.7317 9.52876 12.4714L5.52876 8.47138C5.26841 8.21103 5.26841 7.78892 5.52876 7.52858L9.52876 3.52858C9.78911 3.26823 10.2112 3.26823 10.4716 3.52858Z" />
                            </svg>
                        </button>
                    </form>
                </li>
                @for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 3); $i++)
                    <li>
                        <form method="get" action="{{ url()->current() }}">
                            @csrf
                            <input type="hidden" name="category_name" value="vopsele-lavabile" />
                            <input type="hidden" name="per_page" value="{{ $per_page }}" />
                            <button class="{{ $i == $current_page ? 'active' : '' }}" type="submit" value="{{ $i }}" name="current_page_number" aria-label="Pagina {{ $i }}">
                                {{ $i }}
                            </button>
                        </form>
                    </li>
                @endfor
                <li>
                    <p class="all-pages">
                        din {{ $total_pages }}
                    </p>
                </li>
                <li>
                    <form method="get" action="{{ url()->current() }}">
                        @csrf
                        <input type="hidden" name="category_name" value="vopsele-lavabile" />
                        <input type="hidden" name="per_page" value="{{ $per_page }}" />
                        <button aria-label="Inainte" type="submit" {{ $current_page >= $total_pages ? 'disabled' : '' }} value="{{ $current_page + 1 }}" name="current_page_number">
                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.52876 3.52857C5.78911 3.26823 6.21122 3.26823 6.47157 3.52857L10.4716 7.52858C10.7319 7.78891 10.7319 8.21105 10.4716 8.47138L6.47157 12.4714C6.21122 12.7317 5.78911 12.7317 5.52876 12.4714C5.26841 12.211 5.26841 11.7889 5.52876 11.5286L9.05736 7.99998L5.52876 4.47139C5.26841 4.21103 5.26841 3.78893 5.52876 3.52857Z" />
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="my-32 grid grid-3 gap-xl" id="clw">
        <div>
            @include('components.product-card')
        </div>
    </div>

    <!-- pagination -->
    <ul class="row align-center justify-center pagination gap-md">
        <li>
            <form method="get" action="{{ url()->current() }}">
                @csrf
                <input type="hidden" name="category_name" value="vopsele-lavabile" />
                <input type="hidden" name="per_page" value="{{ $per_page }}" />
                <button aria-label="Inapoi" type="submit" {{ $current_page <= 1 ? 'disabled' : '' }} value="{{ $current_page - 1 }}" name="current_page_number">
                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4716 3.52858C10.7319 3.78892 10.7319 4.21103 10.4716 4.47138L6.94297 7.99998L10.4716 11.5286C10.7319 11.7889 10.7319 12.211 10.4716 12.4714C10.2112 12.7317 9.78911 12.7317 9.52876 12.4714L5.52876 8.47138C5.26841 8.21103 5.26841 7.78892 5.52876 7.52858L9.52876 3.52858C9.78911 3.26823 10.2112 3.26823 10.4716 3.52858Z" />
                    </svg>
                </button>
            </form>
        </li>
        @for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 3); $i++)
            <li>
                <form method="get" action="{{ url()->current() }}">
                    @csrf
                    <input type="hidden" name="category_name" value="vopsele-lavabile" />
                    <input type="hidden" name="per_page" value="{{ $per_page }}" />
                    <button class="{{ $i == $current_page ? 'active' : '' }}" type="submit" value="{{ $i }}" name="current_page_number" aria-label="Pagina {{ $i }}">
                        {{ $i }}
                    </button>
                </form>
            </li>
        @endfor
        <li>
            <p class="all-pages">
                din {{ $total_pages }}
            </p>
        </li>
        <li>
            <form method="get" action="{{ url()->current() }}">
                @csrf
                <input type="hidden" name="category_name" value="vopsele-lavabile" />
                <input type="hidden" name="per_page" value="{{ $per_page }}" />
                <button aria-label="Inainte" type="submit" {{ $current_page >= $total_pages ? 'disabled' : '' }} value="{{ $current_page + 1 }}" name="current_page_number">
                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.52876 3.52857C5.78911 3.26823 6.21122 3.26823 6.47157 3.52857L10.4716 7.52858C10.7319 7.78891 10.7319 8.21105 10.4716 8.47138L6.47157 12.4714C6.21122 12.7317 5.78911 12.7317 5.52876 12.4714C5.26841 12.211 5.26841 11.7889 5.52876 11.5286L9.05736 7.99998L5.52876 4.47139C5.26841 4.21103 5.26841 3.78893 5.52876 3.52857Z" />
                    </svg>
                </button>
            </form>
        </li>
    </ul>
</div>

{{-- @include('widgets.sidebar-contact', ['secondary_title' => $category->name]) --}}

@endsection
