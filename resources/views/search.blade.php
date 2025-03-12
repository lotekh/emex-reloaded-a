@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bundled/despre.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis"><a href="/">Rezultatele cautarii</a></li></ul>
@endsection

@section('content')
    <div id="main" class="search_results_main">
        {!! Blade::render($results) !!}
    </div>
@endsection
