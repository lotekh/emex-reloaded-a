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
        const packagingSelect{{ $product->id }} = document.getElementById('packagingSelect{{ $product->id }}');
        const colorSelect{{ $product->id }} = document.getElementById('colorSelect{{ $product->id }}');
        const priceDisplay{{ $product->id }} = document.getElementById('priceDisplay{{ $product->id }}');
        const priceInput{{ $product->id }} = document.getElementById('priceInput{{ $product->id }}');

        function updateVariation{{ $product->id }}() {
            const productId = {{ $product->id }};
            const selectedPackaging = packagingSelect{{ $product->id }}.value;
            const selectedColor = colorSelect{{ $product->id }}.value;

            fetch('{{ route('product.getVariation') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: selectedPackaging,
                    color: selectedColor
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    priceDisplay{{ $product->id }}.textContent = data.variation.price;
                    priceInput{{ $product->id }}.value = data.variation.price;
                    // Update other fields if needed
                } else {
                    console.error('Error:', data.error);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        packagingSelect{{ $product->id }}.addEventListener('change', updateVariation{{ $product->id }});
        colorSelect{{ $product->id }}.addEventListener('change', updateVariation{{ $product->id }});
    @endforeach
});
</script>

