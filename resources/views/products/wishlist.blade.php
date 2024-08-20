@extends('layouts.app')

@section('breadcrumbs')
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}">Acasa</a></li>
        <li><a href="{{ url('/produse') }}">Produse</a></li>
        <li class="active">Produse dorite</li>
    </ul>
@endsection

@section('content')
<div class="main-container mb-32" id="wishlist-page">
    <h1>Produse adaugate in wishlist</h1>

    @if(count($products))
        <div class="flex col">
            @foreach($products as $ind => $product)
                @if(!empty($product))
                    <x-product-list-item :key="$ind" :product="$product" :hideRating="false" />
                @endif
            @endforeach
        </div>
    @else
        <p>Wishlist-ul tau este gol.</p>
    @endif
</div>
@endsection
