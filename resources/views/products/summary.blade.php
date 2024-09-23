@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/produs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
@endsection

@section('content')
{{-- @php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\URL;

    $invoice = $order->initial_bill;
    $pos = strpos($invoice, 'resources');
    $invoice = './emex/' . substr($invoice, $pos);
    $invoice = str_replace("\\", '/', $invoice);

    if ($order->billing_type) {
        $company_name = $order->organization_name;
    } else {
        $company_name = $order->person_last_name . ' ' . $order->person_first_name;
    }

    $user = Auth::user();
    $email = $user ? $user->email : '';

    $order_no = 'RTCH-N-' . $order->identifier;
    $amount = number_format($order->total, 2, '.', '');

    if ($order->billing_type) {
        $url = url('/secure-payment') . '?guid=' . $order->guid . '&firstName=' . $order->contact_person_first_name . '&lastName=' . $order->contact_person_last_name . '&companyName=' . $company_name . '&email=' . $order->organization_email . '&orderNo=' . $order_no . '&amount=' . $amount;
    } else {
        $url = url('/secure-payment') . '?guid=' . $order->guid . '&firstName=' . $order->person_first_name . '&lastName=' . $order->person_last_name . '&email=' . $order->person_email . '&orderNo=' . $order_no . '&amount=' . $amount;
    }

    $conversion_value = 0;
    foreach ($orders_products as $product) {
        if ($product['name'] != 'Transport' and $product['name'] != 'Cost Ramburs') {
            $conversion_value += $product['price_no_tva'] * $product['quantity'];
        }
    }
    $conversion_value = number_format(round($conversion_value, 2), 2, '.', ',');
@endphp --}}

{{-- <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        'event': 'purchase',
        'transaction_id': '{{ $order->id }}',
        'value': '{{ $conversion_value }}',
        'currency': 'RON'
    });
</script> --}}

<style>
    #summary_bill_container>* {
        width: calc(100% - 100px);
    }
    #summary_header {
        background-color: #438DF1;
        padding: 12px 16px;
        color: white;
    }
</style>

<div class="main-container">
    <div class="container" style="display: flex; flex-direction: column; align-items: center">
        {{-- @if ($order->payment_method == 'card')
            <div class="counter-container">Vei fi redirecționat intr-o noua pagina catre portalul de plata in <span id="redirect_counter">5</span> secunde.</div>
        @endif --}}
        @if ($valid_link == 1)
            <div class="flex justify-center w-full">
                <div style="width: 900px" class="flex col align-start">
                    <div class="flex justify-between align-center w-full wrap gap-md" id="summary_header">
                        <div class="flex col mr-8">
                            <span class="title">FACTURA PROFORMA</span>
                            <span class="details">Data scadenta: {{ date('d-m-Y', strtotime(' + 5 days')) }}</span>
                        </div>
                        <div class="second">
                            <span class="value">{{ number_format($order->total, 2, '.', ',') }}</span>
                            <span class="currency"> Lei</span>
                        </div>
                        <a href="{{ url('site/download-initial-bill', ['identifier' => $order->identifier]) }}">
                            <button id="descarca_proforma" class="btn btn-blue rounded-sm">Exporta ca PDF</button>
                        </a>
                        @if ($order->payment_method != 'ramburs')
                            <a href="{{ url('/') }}">
                                <button id="pay_now_btn" class="btn btn-blue rounded-sm" style="background-color: #19AE0C">PLATESTE ACUM</button>
                            </a>
                        @endif
                    </div>
                    <div id="summary_bill_container" style="width: 900px; height: 1200px; border: 1px solid lightgrey;">
                        @include('products.invoice2', [
                            'order' => $order,
                            'county' => $county,
                            'city' => $city,
                            'orders_products' => $orders_products
                        ])
                    </div>
                </div>
            </div>
        @elseif ($valid_link == 0)
            <div class="container">
                <div class="alert alert-warning">
                    Linkul a expirat!
                </div>
            </div>
        @else
            <div class="container">
                <div class="alert alert-warning">
                    Va rugam, autentificati-va pentru a putea vedea sumarul comenzii.
                </div>
            </div>
        @endif
    </div>
</div>

{{-- @if ($order->payment_method == 'card')
    <script>
        function GoBackWithRefresh() {
            window.location = '{{ $url }}';
        }

        var counter = 5;

        if (screen.width > 1000) {
            var timer = setInterval(function() {
                counter--;
                document.getElementById('redirect_counter').innerHTML = counter;
                if (counter == 0) {
                    GoBackWithRefresh();
                    clearInterval(timer);
                }
            }, 1000);
        }
    </script>
@endif --}}

@endsection
