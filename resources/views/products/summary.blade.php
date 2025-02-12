@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/product.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/produse">Produse</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="#">Factura</a></li></ul>
@endsection

@section('content')

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
                        
                        @php
                            $proformaPath = $order->proforma ? $order->proforma->path : null;
                            $proformaUrl = asset('storage/' . $proformaPath);
                        @endphp
                        <a href="{{$proformaUrl}}" target="_blank">
                            <button id="descarca_proforma" class="btn btn-blue rounded-sm">Exporta ca PDF</button>
                        </a>
                        
                        
                        
                        @if ($order->payment_method != 'ramburs')
                            <a href="{{ route('secure-payment', [
                                'guid' => $order->guid,
                                'firstName' => $order->contact_person_first_name,
                                'lastName' => $order->contact_person_last_name,
                                'email' => $order->organization_email,
                                'orderNo' => $order->identifier,
                                'amount' => $order->total
                            ]) }}">
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

@endsection
