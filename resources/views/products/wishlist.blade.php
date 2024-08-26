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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($products as $product)
            // Obține selecțiile pentru ambalare și culoare
            const packagingSelect{{ $product->id }} = document.getElementById('packagingSelect{{ $product->id }}');
            const colorSelect{{ $product->id }} = document.getElementById('colorSelect{{ $product->id }}');
            const priceDisplay{{ $product->id }} = document.getElementById('priceDisplay{{ $product->id }}');
            const priceInput{{ $product->id }} = document.getElementById('priceInput{{ $product->id }}');
    
            // Încarcă toate variațiile pentru acest produs
            const variations{{ $product->id }} = @json($product->variations);
    
            function updateVariation{{ $product->id }}() {
                const selectedPackaging = packagingSelect{{ $product->id }}.value;
                const selectedColor = colorSelect{{ $product->id }}.value;
    
                // Găsește variația corectă pe baza ambalării și culorii selectate
                const variation = variations{{ $product->id }}.find(variation => 
                    variation.quantity == selectedPackaging && variation.colour == selectedColor
                );
    
                if (variation) {
                    // Actualizează prețul afișat și valoarea inputului hidden
                    priceDisplay{{ $product->id }}.textContent = variation.price;
                    priceInput{{ $product->id }}.value = variation.price;
                    // Poți actualiza și alte câmpuri dacă este necesar
                } else {
                    console.error('Nicio variație potrivită nu a fost găsită.');
                }
            }
    
            // Adaugă evenimente pentru când se schimbă ambalarea sau culoarea
            packagingSelect{{ $product->id }}.addEventListener('change', updateVariation{{ $product->id }});
            colorSelect{{ $product->id }}.addEventListener('change', updateVariation{{ $product->id }});
        @endforeach
    });
    </script>
    

