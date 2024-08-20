@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
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
