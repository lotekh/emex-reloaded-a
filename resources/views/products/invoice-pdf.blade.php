<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<style>
    @page {
     margin: 0px;
     margin-header: 0; 
	 margin-footer: 0; 
    }

    body { 
        font-family: DejaVu Sans, sans-serif; 
    }

    #summary_bill_container>* {
        width: calc(100% - 100px);
    }

    .col-6 {
        width: 50%;
        padding: 0;
    }

    .col-12 {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .col-9 {
        width: 75%;
    }

    .col-3 {
        width: 25%;
    }
    .col-8 {
        width: 66.66%;
    }
    .col-this-4 {
        max-width: 33.33%;
    }

    .blue-table {
        background-color: #001d4d;
        padding-top: 10px;
        padding-bottom: 10px;
        color: white;
    }

    .blue-table td {
        white-space: nowrap; 
        overflow: auto; 
    }


    .blue {
        background-color: #001d4d;
        color: white;
    }

    table {
        border: 0;
        border-collapse: separate;
    }

    .column-headline {
        color: #001d4d;
        border-bottom: 1px solid #001d4d;
    }

    .small-font {
        font-size: 12px
    }

    .company-data {
        margin-top: 30px;
    }

    .company-name {
        text-transform: uppercase;
        font-size: 14px;
        margin: 5px 0;
    }

    .margin-negative {
        position: absolute;
        top: 0;
        left: 0;
    }

    .table-borders {
        border-top: 1px solid grey;
        border-bottom: 1px solid grey;
        border-left: 0;
        border-right: 0;
        text-align: center;
        padding: 5px;
    }

    .table-borders-total {
        border-top: 1px solid grey;
        border-bottom: 1px solid grey;
        border-left: 0;
        border-right: 0;
    }

    .paddings {
        padding: 10px 5px;
    }

    .table-borders-none {
        border: 0;
        font-size: 16px;
        color: #001d4d;
    }

    .table-borders-main {
        border-top: 1px solid grey;
        border-bottom: 0;
        border-left: 0;
        border-right: 0;
    }
    p.id {
        font-size: 14px;
        font-weight: bold;
        /* margin: 20px 0 30px; */
    }
    .small-font p {
        margin: 0;
    }
    .company-name p {
        margin: 0;
    }
    .small-font {
        padding: 0;
        margin: 0;
    }
    #logo-img {
        margin-top: 15px;
    }

    .ta_r{
        text-align: right;
    }

    .ta_l{
        text-align: left;
    }

    .ta_c{
        text-align: center;
    }
    .pad-top-bot-0{
        padding-top: 0px;
        padding-bottom: 0px;
    }
</style>

<div id="summary_bill_container">

    <table class="col-12" style="margin: 0 50px; padding: 0">
        <tr class="col-12" style="padding: 0">
            <td class="col-6">
                <table>
                    <tr>
                        <td>
                            <img id="logo-img" src="{{ public_path('resources/new_design/general/Logo-factura-prof.png') }}">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 40px">
                    
                        </td>
                    </tr>
                </table>
            </td>
            <td class="col-6">
                <table class="col-12">
                    <tr>
                        <td style="padding: 5px"></td>
                    </tr>
                    <tr class="col-12">
                        <td class="col-8" style="padding-bottom: 3px">
                            <h2>Proforma</h2>
                            <p>Data emiterii:</p>
                            <p> {{ \Carbon\Carbon::parse($order['created_at'])->format('d-m-Y') }} </p>
                        </td>
                        <td class="col-6" style="padding-bottom: 5px">
                            <p class="id">{{ 'RTCH-N-' . $order['identifier'] }}</p>
                            <p>Cota TVA: 19%</p>
                        </td>
                    </tr>
                </table>
                <table style="width: 95%; padding-left:10px; padding-right:10px;">
                    <tr class="col-12">
                        <td class="col-12">
                            <table class="col-12">
                                <tr class="col-12">
                                    <td class="blue-table col-12" style="line-height: 1;">
                                        <table class="col-12">
                                            <tr class="col-12">
                                                <td class="col-6 blue pad-top-bot-0">TOTAL PLATA</td>
                                                <td class="col-6 blue pad-top-bot-0">{{ number_format($order['total'], 2, '.', ',') }} lei</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="col-12" style="margin: 0 50px 15px">
        <tr class="col-12">
            <td class="col-6">
                <table class="col-12">
                    <tr class="col-12">
                        <td class="col-6 column-headline">Furnizor</td>
                        <td class="col-6"></td>
                        <td class="col-6"></td>
                    </tr>
                </table>
            </td>
            <td class="col-6">
                <table class="col-12">
                    <tr class="col-12">
                        <td class="col-6 column-headline">Client</td>
                        <td class="col-6"></td>
                        <td class="col-6">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="col-12">
            <td class="col-6 company-name">
                <p>Romtehnochim srl</p>
            </td>
            <td class="col-6 company-name">
                @php
                $companyInformation = json_decode($order->company_information, true);
                @endphp

                @if ($order['billing_type'] == 0)  {{-- Persoană fizică --}}
                    @if ($companyInformation && isset($companyInformation['person_last_name']) && isset($companyInformation['person_first_name']))
                        <p>{{ $companyInformation['person_first_name'] . ' ' . $companyInformation['person_last_name'] }}</p>
                    @else
                        <p>Informații client nelogat</p>
                    @endif
                @elseif ($order['billing_type'] == 1)  {{-- Persoană juridică --}}
                    @if ($companyInformation && isset($companyInformation['organization_name']))
                        <p>{{ $companyInformation['organization_name'] }}</p>
                    @else
                        <p>Informații client nelogat</p>
                    @endif
                @endif

            </td>
        </tr>

        <tr class="col-12 small-font">
            <td class="col-6 small-font">
                <p>CUI: RO4643777</p>
                <p>Nr Reg Com: J40/21214/1993</p>
                <p>Sediul: Str. Neajlovului nr 82 sect 1 Bucuresti</p>
                <p>IBAN: RO62 RZBR 0000 0600 1463 6674</p>
                <p>Banca: Raiffeisen</p>
            </td>
            <td class="col-6 small-font" style="vertical-align: top">
                @if ($order['billing_type'] == 0)
                    <p>Judet: {{ $billingCountyName }}</p>
                    <p>Localitate: {{ $billingCityName }}</p>
                    <p>Adresa: {{ $address}}</p>
                @else
                <p>CUI: {{ $companyInformation['organization_cui'] }}</p>
                <p>Adresa: {{ $address}}, {{ $billingCityName }}, jud. {{ $billingCountyName }}</p>
                <p>IBAN: {{ strtoupper($companyInformation['organization_bank_account']) }}</p>
                <p>Banca: {{ $companyInformation['organization_bank'] }}</p>
                @endif
            </td>
        </tr>
    </table>

    <table style="border-collapse: collapse; font-size: 14px; margin: 0 50px;" class="table-borders-main">
        <tr>
            <td style="font-weight: bold;" class="ta_c table-borders paddings">#</td>
            <td style="font-weight: bold;" class="ta_l table-borders">Denumirea produselor sau serviciilor</td>
            <td style="font-weight: bold;" class="ta_c table-borders">Cantitate</td>
            <td style="font-weight: bold;" class="ta_r table-borders">Pret unitar</td>
            <td style="font-weight: bold;" class="ta_r table-borders">Valoare</td>
            <td style="font-weight: bold;" class="ta_r table-borders">TVA</td>
        </tr>
        @php $i = 0; $sum_no_tva = 0; $sum_tva = 0; @endphp

        @foreach ($orders_products as $key => $product)
            @php $i++; @endphp
            <tr>
                <td style="padding: 10px 5px" class="ta_c table-borders">{{ $i }}</td>
                <td style="padding: 5px 20px 5px 8px;" class="ta_l table-borders">{{ $product['name'] }}</td>
                <td style="padding: 10px 5px" class="ta_c table-borders">{{ $product->pivot->quantity }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($product->pivot->price_no_vat, 2), 2, '.', ',') }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($product->pivot->price_no_vat * $product->pivot->quantity, 2), 2, '.', ',') }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($product->pivot->price - $product->pivot->price_no_vat, 2) * $product->pivot->quantity, 2, '.', ',') }}</td>
            </tr>
        @endforeach

        {{-- Transport --}}
        
        @if ($order->transport_price)
            @php $i++; @endphp
            <tr>
                <td style="padding: 10px 5px" class="ta_c table-borders">{{ $i }}</td>
                <td style="padding: 5px 20px 5px 8px;" class="ta_l table-borders">Transport</td>
                <td style="padding: 10px 5px" class="ta_c table-borders">1</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($order->transport_price_no_tva, 2), 2, '.', ',') }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($order->transport_price_no_tva, 2), 2, '.', ',') }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($order->transport_price - $order->transport_price_no_tva, 2), 2, '.', ',') }}</td>
            </tr>
        @endif

        {{-- Ramburs --}}
        @if ($order->delivery_type == 0 && $order->payment_method == "ramburs") 
            @php $i++; @endphp
            @php
                $deliveryInformation = json_decode($order->delivery_information, true);
            @endphp
            <tr>
                <td style="padding: 10px 5px" class="ta_c table-borders">{{ $i }}</td>
                <td style="padding: 5px 20px 5px 8px;" class="ta_l table-borders">Ramburs</td>
                <td style="padding: 10px 5px" class="ta_c table-borders">1</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($deliveryInformation['ramburs_value'], 2), 2, '.', ',') }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($deliveryInformation['ramburs_value'], 2), 2, '.', ',') }}</td>
                <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($deliveryInformation['ramburs_tva'], 2), 2, '.', ',') }}</td>
            </tr>
        @endif

        <tr>
            <td colspan="4" style="text-align: right; padding: 10px 5px; font-weight: bold" class="table-borders-total">Total</td>
            <td style="text-align: center; padding: 10px 5px" class="table-borders-total">{{ number_format(round($order->total_no_tva, 2), 2, '.', ',') }}</td>
            <td style="text-align: center; padding: 10px 5px" class="table-borders-total">{{ number_format(round($order['total'] - $order['total_no_tva'], 2), 2, '.', ',') }}</td>
        </tr>
        <tr style="margin-bottom: 0">
            <td colspan="4" style="text-align: right; padding: 10px 5px; font-weight: bold" class="table-borders-none">Total General</td>
            <td colspan="2" style="text-align: center; padding: 10px 5px; font-weight: bold" class="ta_r table-borders-none">{{ number_format($order['total'], 2, '.', ',') }} lei</td>
        </tr>
        
    </table>

    <br>

    <div style="float: right; margin-top: 7px; padding-right: 35px; max-width:200px;">
        @if($order['payment_method'] != 'ramburs')
            <a href="/secure-payment?guid={{$order->guid}}&orderNo={{$order->identifier}}&amount={{$order->total}}">
                <img src="{{ public_path('resources/images/Buton-Plata-Online.png') }}">
            </a>
        @endif
    </div>

</div>
