@extends('layout.layout')

@section('content')
<div id="main" class="main-container">
    <div class="container">
        <h1>Rezultatele cautarii</h1>
    </div>
    <div class="container" id="search_results2">
        <div id="search_results_row2">
            {{$results}}
        </div>
    </div>
</div>
@endsection