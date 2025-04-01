@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/plata.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis"><a href="#">Plata</a></li></ul>
@endsection


@section('content')
<div class="main-container flex col align-center payment">
    @if (!isset($dataAll))
        <h3 class="redirect">Vă rugăm să așteptați. Sunteți redirecționat către pagina securizată de plată ...</h3>
        <form action="https://secure.euplatesc.ro/tdsprocess/tranzactd.php" method="post" id="payment">
            @foreach ($dataAll as $key => $value)
                <input name="{{ $key }}" value="{{ $value }}" type="hidden">
            @endforeach
        </form>
        <script>
            window.onload = function() {
                window.setTimeout(function() {
                    document.getElementById("payment").submit();
                }, 2000);
            };
        </script>
    @else
        <h1 class="text-center">Plată online securizată</h1>
        <div class="flex grid grid-5 gap-lg">
            <div class="flex section payment-container col-span-2">
                <div class="card flex col p-16 align-center rounded-xs">
                    <h2 class="m-0 mb-8 mt-16">Detalii tranzacție</h2>
                    <p class="text-center mb-32">Plata se poate face doar în baza facturii proforma emise de Romtehnochim, prin pagina securizată a băncii procesatoare.</p>
                    <form action="https://secure.euplatesc.ro/tdsprocess/tranzactd.php" method="post" class="flex col align-center w-full">
                        @csrfWithoutAutocomplete
                        @foreach ($dataAll as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        @php
                            dd($dataAll);
                        @endphp

                        {{-- <input type="hidden" name="amount" value="{{ $dataAll['amount'] }}">
                        <input type="hidden" name="curr" value="{{ $dataAll['curr'] }}">
                        <input type="hidden" name="invoice_id" value="{{ $dataAll['invoice_id'] }}">
                        <input type="hidden" name="order_desc" value="{{ $dataAll['order_desc'] }}">
                        <input type="hidden" name="merch_id" value="{{ $dataAll['merch_id'] }}">
                        <input type="hidden" name="timestamp" value="{{ $dataAll['timestamp'] }}">
                        <input type="hidden" name="nonce" value="{{ $dataAll['nonce'] }}">
                        <input type="hidden" name="fp_hash" value="{{ $dataAll['fp_hash'] }}"> --}}

                        <input type="hidden" name="guid" value="{{ $order->guid }}">
            
                        <div class="flex gap-md w-full">
                            <div class="form-group mb-16">
                                <label for="last_name">Nume</label>
                                <input type="text" name="last_name" class="form-control @error('last_name') red_input @enderror" 
                                    value="{{ old('last_name', $lastName) }}" required>
                                @error('last_name')
                                    <p class="error_message">{{ $message }}</p>
                                @enderror
                                {{-- <label for="lname">Nume</label>
                                <input type="text" name="lname" class="form-control @error('lname') red_input @enderror" 
                                    value="{{ old('lname', $lastName) }}" required>
                                @error('lname')
                                    <p class="error_message">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <div class="form-group mb-16">
                                <label for="first_name">Prenume</label>
                                <input type="text" name="first_name" class="form-control @error('first_name') red_input @enderror" 
                                    value="{{ old('first_name', $firstName) }}" required>
                                @error('first_name')
                                    <p class="error_message">{{ $message }}</p>
                                @enderror
                                {{-- <label for="fname">Prenume</label>
                                <input type="text" name="fname" class="form-control @error('fname') red_input @enderror" 
                                    value="{{ old('fname', $firstName) }}" required>
                                @error('fname')
                                    <p class="error_message">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
            
                        @if ($order->billing_type == 1)
                        <div class="form-group mb-16">
                            <label for="company_name">Firmă</label>
                            <input type="text" name="company_name" class="form-control @error('company_name') red_input @enderror" 
                                value="{{ old('company_name', json_decode($order->company_information, true)['organization_name'] ?? '') }}">
                            @error('company_name')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif
            
                        <div class="form-group mb-16">
                            <label for="EMAIL">Email-ul dvs</label>
                            <input type="email" name="EMAIL" class="form-control @error('email') red_input @enderror" 
                                value="{{ old('email', $email) }}" required>
                            @error('email')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
            
                        <div class="form-group mb-16">
                            <label for="ORDER">Nr Factură</label>
                            <input type="text" name="ORDER" class="form-control @error('orderNo') red_input @enderror" 
                                value="{{ old('orderNo', $order->identifier) }}" required>
                            @error('orderNo')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
            
                        <div class="form-group mb-16">
                            <label for="AMOUNT">Suma</label>
                            <input type="text" name="AMOUNT" class="form-control @error('amount') red_input @enderror" 
                                value="{{ old('amount', number_format($order->total, 2)) }}" readonly required>
                            @error('amount')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
            
                        <input type="submit" class="btn btn-blue mb-16 w-fit" value="Plătește">
                    </form>
                </div>
            </div>
            

            <div class="flex col section px-16 align-center col-span-3">
                <h2 class="m-0 mb-8 mt-32">Sumar comandă</h2>
                <div class="w-full scrollable-x">
                    <table class="mb-8 styled desktop-cart w-full" id="cart-secure-payment">
                        <thead>
                            <tr>
                                <th>Nume produs</th>
                                <th>Cantitate</th>
                                <th>Cost (TVA inclus)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordered_products as $ordered_product)
                            <tr>
                                <td class="name">
                                    @php
                                        $imageUrl = $ordered_product->product->smallImage 
                                            ? asset('storage/' . $ordered_product->product->smallImage->path) 
                                            : asset('images/default-placeholder.png'); 
                                        $pngSmallImageUrl = $ordered_product->product->pngSmallImage 
                                            ? asset('storage/' . $ordered_product->product->pngSmallImage->path) 
                                            : asset('images/default-placeholder.png');
                                    @endphp

                                    <a href="{{ url($ordered_product->product->slug) }}" class="flex align-center">
                                        <picture>
                                            <source type="image/webp" srcset="{{ $imageUrl }}"/>
                                            <img src="{{ $pngSmallImageUrl }}" width="90" height="90" alt="{{ $ordered_product->product->smallImage ? $ordered_product->product->smallImage->alt : '' }}" title="{{ $ordered_product->product->smallImage ? $ordered_product->product->smallImage->title : '' }}" id="image-cart-secure-payment">
                                        </picture>
                                        <h3 class="normal-weight ml-8">{{ $ordered_product->name }}</h3>
                                    </a>
                                </td>
                                <td>{{ $ordered_product->pivot->quantity }}</td>
                                <td class="blue bold">{{ number_format($ordered_product->price * $ordered_product->pivot->quantity, 2) }} Ron</td>
                            </tr>
                            @endforeach
                            {{-- Add transport, if it exists --}}
                            @if ($order->transport_price && $order->transport_price > 0)
                            <tr>
                                <td class="name">
                                    <h3 class="normal-weight ml-8">Transport</h3>
                                </td>
                                <td>1</td>
                                <td class="blue bold">{{ number_format($order->transport_price, 2) }} Ron</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="flex align-center justify-end mt-16 w-full total-general-plata">
                    <span>Total general:</span>
                    <span class="blue bold total ml-8">{{ number_format($order->total, 2) }} Ron</span>
                </div>
                <div class="info mb-16">
                    După efectuarea plății, veți primi un email de confirmare, iar comanda va fi procesată în cel mai scurt timp.<br>
                    Vă mulțumim!
                </div>
            </div>
        </div>
    @endif
</div>
@endsection