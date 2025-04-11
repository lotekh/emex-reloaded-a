@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bundled/wishlist.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="-ml-4 ellipsis"><a href="#">Produse dorite</a></li></ul>
@endsection


@section('content')

<div class="main-container mb-32" id="wishlist-page">
    <h1>Produse adaugate in wishlist</h1>

    @if(count($products))
        <div class="flex col">
            @foreach($products as $ind => $product)
                @if(!empty($product))
                    <x-product-list-item :key="$ind" :product="$product"
                     :hideRating="false" :lazyloading="$ind >= 3" />
                @endif
            @endforeach
        </div>
    @else
        <p>Wishlist-ul tau este gol.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($products as $product)
            const packagingSelect{{ $product->id }} = document.getElementById('packagingSelect{{ $product->id }}');
            const colorSelect{{ $product->id }} = document.getElementById('colorSelect{{ $product->id }}');
            const priceDisplay{{ $product->id }} = document.getElementById('priceDisplay{{ $product->id }}');
            const variationInput{{ $product->id }} = document.getElementById('variationInput{{ $product->id }}');
    
            const variations{{ $product->id }} = @json($product->variations);
    
            function updateVariation{{ $product->id }}() {
                const selectedPackaging = packagingSelect{{ $product->id }}.value;
                const selectedColor = colorSelect{{ $product->id }}.value;

                const variation = variations{{ $product->id }}.find(variation => 
                    variation.quantity == selectedPackaging && variation.colour == selectedColor
                );
                
                if (variation) {
                    priceDisplay{{ $product->id }}.textContent = variation.price.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                    variationInput{{ $product->id }}.value = variation.id;
                } else {
                    console.error('Nicio variație potrivită nu a fost găsită.');
                }
            }

            packagingSelect{{ $product->id }}.addEventListener('change', updateVariation{{ $product->id }});
            colorSelect{{ $product->id }}.addEventListener('change', updateVariation{{ $product->id }});
        @endforeach
    });
</script>
    
@endsection




