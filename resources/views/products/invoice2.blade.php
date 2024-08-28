@php
    $company_name = $order['billing_type'] ? $order['organization_name'] : $order['person_last_name'] . ' ' . $order['person_first_name'];
    $order_no = 'RTCH-N-' . $order['identifier'];
    $amount = number_format($order['total'], 2, '.', '');

    if ($order['billing_type']) {
        $plata_url = url('/secure-payment') . '?guid=' . $order['guid'] . '&firstName=' . $order['contact_person_first_name'] . '&lastName=' . $order['contact_person_last_name'] . '&companyName=' . $company_name . '&email=' . $order['organization_email'] . '&orderNo=' . $order_no . '&amount=' . $amount;
    } else {
        $plata_url = url('/secure-payment') . '?guid=' . $order['guid'] . '&firstName=' . $order['person_first_name'] . '&lastName=' . $order['person_last_name'] . '&email=' . $order['person_email'] . '&orderNo=' . $order_no . '&amount=' . $amount;
    }
@endphp

<style>
    /* CSS-ul tău de stilizare */
    @page {
        margin: 0px;
        margin-header: 0;
        margin-footer: 0;
    }
    .col-6 { width: 50%; padding: 0; }
    .col-12 { width: 100%; margin: 0; padding: 0; }
    .col-9 { width: 75%; }
    .col-3 { width: 25%; }
    .col-8 { width: 66.66%; }
    .col-this-4 { max-width: 33.33%; }
    .blue-table { background-color: #001d4d; padding-top: 10px; padding-bottom: 10px; color: white; }
    .blue { background-color: #001d4d; color: white; }
    table { border: 0; }
    .column-headline { color: #001d4d; border-bottom: 1px solid #001d4d; }
    .small-font { font-size: 12px; }
    .company-data { margin-top: 30px; }
    .company-name { text-transform: uppercase; font-size: 14px; margin: 5px 0; }
    .margin-negative { position: absolute; top: 0; left: 0; }
    .table-borders { border-top: 1px solid grey; border-bottom: 1px solid grey; text-align: center; padding: 5px; }
    .table-borders-total { border-top: 1px solid grey; border-bottom: 1px solid grey; }
    .paddings { padding: 10px 5px; }
    .table-borders-none { border: 0; font-size: 16px; color: #001d4d; }
    .table-borders-main { border-top: 1px solid grey; border-bottom: 0; }
    .ta_r { text-align: right; }
    .ta_l { text-align: left; }
    .ta_c { text-align: center; }
    .small-font p { margin: 0; }
    .company-name p { margin: 0; }
    #logo-img { margin-top: 15px; }
</style>

<table class="col-12" style="margin: 0 50px; padding: 0">
    <tr class="col-12" style="padding: 0">
        <td class="col-6">
            <table>
                <tr>
                    <td>
                        <img id="logo-img" src="{{ asset('resources/new_design/general/logo.png') }}">
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
                    <td class="col-8" style="padding-bottom: 9px">
                        <h2>Proforma</h2>
                        <p>Data emiterii: {{ $order['created_at'] }}</p>
                    </td>
                    <td class="col-6" style="padding-bottom: 5px">
                        <p class="id">{{ 'RTCH-N-' . $order['identifier'] }}</p>
                        <p>Cota TVA: 19%</p>
                    </td>
                </tr>
            </table>
            <table style="width: 95%;">
                <tr class="col-12">
                    <td class="col-12">
                        <table class="col-12">
                            <tr class="col-12">
                                <td class="blue-table col-12">
                                    <table class="col-12">
                                        <tr class="col-12">
                                            <td class="col-8 blue">TOTAL PLATA</td>
                                            <td class="col-this-4 blue">{{ number_format($order['total'], 2, '.', ',') }} lei</td>
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
                </tr>
            </table>
        </td>
        <td class="col-6">
            <table class="col-12">
                <tr class="col-12">
                    <td class="col-6 column-headline">Client</td>
                    <td class="col-6"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="col-12">
        <td class="col-6 company-name">
            <p>Romtehnochim srl</p>
        </td>
        <td class="col-6 company-name">
            @if ($order['billing_type'] == 0)
                <p>{{ $order['person_first_name'] . ' ' . $order['person_last_name'] }}</p>
            @else
                <p>{{ $order['organization_name'] }}</p>
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
                <p>Judet: {{ $county }}</p>
                <p>Localitate: {{ $city }}</p>
                <p>Adresa: {{ $order['person_address'] }}</p>
            @else
                <p>CUI: {{ $order['organization_cui'] }}</p>
                <p>Adresa: {{ $order['organization_address'] . ', ' . $city . ', jud. ' . $county }}</p>
                <p>IBAN: {{ strtoupper($order['organization_bank_account']) }}</p>
                <p>Banca: {{ $order['organization_bank'] }}</p>
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
            <td style="padding: 10px 5px" class="ta_c table-borders">{{ $product['quantity'] }}</td>
            <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($product['price_no_tva'], 2), 2, '.', ',') }}</td>
            <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($product['price_no_tva'] * $product['quantity'], 2), 2, '.', ',') }}</td>
            <td style="padding: 10px 5px" class="ta_r table-borders">{{ number_format(round($product['price'] - $product['price_no_tva'], 2) * $product['quantity'], 2, '.', ',') }}</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="4" style="text-align: right; padding: 10px 5px; font-weight: bold" class="table-borders-total">Total</td>
        <td style="text-align: center; padding: 10px 5px" class="table-borders-total">{{ number_format(round($order['total_no_tva'], 2), 2, '.', ',') }}</td>
        <td style="text-align: center; padding: 10px 5px" class="table-borders-total">{{ number_format(round($order['total'] - $order['total_no_tva'], 2), 2, '.', ',') }}</td>
    </tr>
    <tr style="margin-bottom: 0">
        <td colspan="4" style="text-align: right; padding: 10px 5px; font-weight: bold" class="table-borders-none">Total General</td>
        <td colspan="2" style="text-align: center; padding: 10px 5px; font-weight: bold" class="ta_r table-borders-none">{{ number_format($order['total'], 2, '.', ',') }} lei</td>
    </tr>
    <tr style="margin: 0">
        <td colspan="6" style="text-align: right; padding: 10px 5px" class="table-borders-none">
            @if($order['payment_method'] != 'ramburs')
            <a href="{{ $plata_url }}">
                <img src="{{ asset('resources/images/Buton-Plata-Online.png') }}">
            </a>
            @endif
        </td>
    </tr>
</table>
