@extends('layout.layout')

@section('content')
<div class="main-container mb-32" id="cart">
    <div class="flex justify-between mb-16">
        <h1>
            Cos ({{ $ordered_products->count() }} produs{{ $ordered_products->count() !== 1 ? "e" : "" }})
        </h1>
        @if($ordered_products->count() > 0)
            <button class="flex align-center grey-button">
                <div>
                    <img width="18" height="18" src="{{ asset('resources/new_design/icons/bin-grey.svg') }}" alt="bin">
                </div>
                <a class="ml-8" href="{{ route('orders.emptyCart') }}">
                    Sterge tot
                </a>
            </button>
        @endif
    </div>

    @if($ordered_products->isEmpty())
        Cosul tau este gol.

        <div class="flex col align-end wrap mt-8">
            <a class="dropdown-item row align-center mb-8" href="{{ url('/produse') }}">
                <button class="btn btn-blue rounded-xl medium-width">Continua cumparaturile</button>
            </a>
        </div>
    @else
        <div class="w-full scrollable-x">
            <table class="mb-8 styled desktop-cart w-full">
                <thead>
                    <tr>
                        <th>Nume produs</th>
                        <th>Cantitate</th>
                        <th>Ambalare</th>
                        <th>Culoare</th>
                        <th>Pret unitar (TVA inclus)</th>
                        <th>Cost (TVA inclus)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordered_products as $ordered_product)
                        <tr>
                            <td>
                                <a href="{{ url($ordered_product->productVariation->product->slug) }}" class="flex align-center">
                                    <div>
                                        <img layout="fixed" width="90px" height="90px" src="{{ $ordered_product->productVariation->product->getSimilarProductImageUrl() }}" alt="{{ strip_tags($ordered_product->productVariation->product->name) }}">
                                    </div>
                                    <h3 class="normal-weight">{{ $ordered_product->productVariation->name }}</h3>
                                </a>
                            </td>
                            <td>
                                <div class="quantity-selector flex">
                                    <form method="POST" action="{{ route('orders.addProduct') }}">
                                        @csrf
                                        <input type="hidden" name="product_variation_id" value="{{ $ordered_product->productVariation->id }}">
                                        <input type="hidden" name="quantity" value="-1">
                                        <button type="submit" aria-label="Scade cantitatea">-</button>
                                    </form>
                                    {{ $ordered_product->quantity }}
                                    <form method="POST" action="{{ route('orders.addProduct') }}">
                                        @csrf
                                        <input type="hidden" name="product_variation_id" value="{{ $ordered_product->productVariation->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" aria-label="Creste cantitatea">+</button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $ordered_product->productVariation->quantity }} {{ $ordered_product->productVariation->measurementUnit->name }}</td>
                            <td>{{ $ordered_product->productVariation->colour }}</td>
                            <td class="price">{{ $ordered_product->price }} Lei</td>
                            <td class="price">
                                <div class="flex justify-between">
                                    <p class="price">{{ number_format($ordered_product->total_price, 2) }} Lei</p>
                                    <form method="POST" action="{{ route('orders.removeProduct') }}">
                                        @csrf
                                        <input type="hidden" name="order_product_id" value="{{ $ordered_product->id }}">
                                        <button aria-label="Sterge produsul">
                                            <img src="{{ asset('resources/new_design/icons/bin.svg') }}" width="18" height="18">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="grid grid-5 mt-8">
            <div class="col-span-4">
                <p class="mb-8"><span class="bold">Cost total: </span>{{ number_format($order->total_price, 2) }} Ron, TVA inclus.</p>
                <p><span class="green-mark italic">Toate preturile se refera la culori standard.</span></p>
                <p><span class="green-mark italic">Pentru nuante RAL sau destinatii speciale, va rugam sa ne contactati, din pagina de contact sau din pagina produsului dorit.</span></p>
                <em class="red-mark">Produsele pot fi livrate dupa circa 3 zile lucratoare, necesare procesului tehnologic.</em>
            </div>
            <div class="flex col-md mt-16 gap-xs justify-center align-end">
                <a class="row align-center" href="{{ url('/produse') }}">
                    <button class="btn btn-blue rounded-xl medium-width">Continua cumparaturile</button>
                </a>
                <a class="row align-center" href="{{ route('orders.checkout') }}">
                    <button class="btn btn-blue rounded-xl medium-width">Finalizeaza comanda</button>
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
