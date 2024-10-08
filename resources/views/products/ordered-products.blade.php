@extends('layout.layout')

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#">Produse adaugate</a></li></ul>
@endsection

@section('content')
<div class="main-container mb-32" id="cart">
  <div class="flex justify-between mb-16">
    <h1>
      Cos ({{ count($ordered_products) }} produs{{ count($ordered_products) == 1 ? '' : 'e' }})
    </h1>
    @if(!empty($ordered_products))
      <form method="POST" action="{{ route('orders.empty') }}" style="display: none;">
        @csrf
        <button id="delete-all" class="flex align-center grey-button" type="submit">
            <img width="18" height="18" src="{{ asset('resources/new_design/icons/bin-grey.svg') }}">
            <span class="ml-8">Sterge tot</span>
        </button>
    </form>
    
    <button class="flex align-center grey-button" onclick="document.getElementById('delete-all').click();">
        <img width="18" height="18" src="{{ asset('resources/new_design/icons/bin-grey.svg') }}">
        <span class="ml-8">Sterge tot</span>
    </button>
    
    @endif
  </div>

  @if(empty($ordered_products))
    <p>Cosul tau este gol.</p>
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
            <th class="text-center">Cantitate</th>
            <th class="text-center">Ambalare</th>
            <th class="text-center">Culoare</th>
            <th>Pret unitar (TVA inclus)</th>
            <th>Cost (TVA inclus)</th>
          </tr>
        </thead>
        <tbody>
          
          @php $totalPrice = 0; @endphp
          @foreach ($ordered_products as $ordered_product)
              @php
                  // Folosim cantitatea comandată din sesiune, nu cea din stoc
                  $totalIndividualPrice = floatval($ordered_product->price) * intval($ordered_product->ordered_quantity);
                  $totalPrice += $totalIndividualPrice;
              @endphp
              <tr>
                  <td>
                      <a href="{{ url($ordered_product->product->slug) }}" class="flex align-center">
                          <div>
                              <img layout="fixed" width="90px" height="90px" src="{{ $ordered_product->product->featuredImage ? asset('storage/' . $ordered_product->product->featuredImage->path) : asset('/images/default-placeholder.png') }}" alt="{{ strip_tags($ordered_product->product->name) }}">
                          </div>
                          {{-- Get the product name until the first '-' sign --}}
                          <h3 class="normal-weight">{{ \Illuminate\Support\Str::before($ordered_product->name, ' -') }}</h3>
                      </a>
                  </td>
                  <td class="text-center">{{ $ordered_product->ordered_quantity }}</td>
                  <td class="text-center">{{ $ordered_product->quantity }} {{$ordered_product->measurementUnit->name}}</td>
                  <td class="text-center">{{ $ordered_product->colour }}</td>
                  <td class="price">{{ number_format($ordered_product->price, 2) }} Lei</td>
                  <td class="price">
                      <div class="flex justify-between">
                          <p class="price">{{ number_format($totalIndividualPrice, 2) }} Lei</p>
                          <form method="POST" action="{{ route('orders.removeProduct') }}">
                              @csrf
                              <input type="hidden" name="product_variation_id" value="{{ $ordered_product->id }}">
                              <button aria-label="Sterge produsul"><img src="{{ asset('resources/new_design/icons/bin.svg') }}" width="18" height="18"></button>
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
        <p class="mb-8"><span class="bold">Cost total: </span>{{ number_format($totalPrice, 2) }} Lei, TVA inclus.</p>
        <p><span class="green-mark italic">Toate preturile se refera la culori standard.</span></p>
        <p><span class="green-mark italic">Pentru nuante RAL sau destinatii speciale, va rugam sa ne contactati.</span></p>
        <em class="red-mark">Produsele pot fi livrate dupa circa 3 zile lucratoare, necesare procesului tehnologic.</em>
      </div>
      <div class="flex col-md mt-16 gap-xs justify-center align-end">
        <a class="row align-center" href="{{ url('/produse') }}">
          <button class="btn btn-blue rounded-xl medium-width">Continua cumparaturile</button>
        </a>
        <a class="row align-center" href="{{ route('checkout.form') }}">
          <button class="btn btn-blue rounded-xl medium-width">Finalizeaza comanda</button>
        </a>
      </div>
    </div>
  @endif
</div>
@endsection
