<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Comanda {{ $record->identifier }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { margin-bottom: 20px; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Comanda #{{ $record->identifier }}</h1>

    <p><strong>User:</strong>
        @if($record->user)
            {{ $record->user->first_name }} {{ $record->user->last_name }}
        @else
            Guest
        @endif
    </p>

    <p><strong>Delivery Info:</strong><br>
    @php
        $delivery = json_decode($record->delivery_information, true);
    @endphp

    @if(is_array($delivery))
        @foreach($delivery as $key => $value)
            {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}<br>
        @endforeach
    @else
        <em>Nu există informații de livrare.</em><br>
    @endif
    </p>

    <p><strong>Billing Info:</strong><br>
    @php
        $billing = json_decode($record->company_information, true);
    @endphp

    @if(is_array($billing))
        @foreach($billing as $key => $value)
            {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}<br>
        @endforeach
    @else
        <em>Nu există informații de facturare.</em><br>
    @endif
    </p>


    <p><strong>Payment Method:</strong> {{ $record->payment_method }}</p>
    <p><strong>Total:</strong> {{ number_format($record->total, 2) }} RON</p>
    <p><strong>Transport Price:</strong> {{ number_format($record->transport_price, 2) }} RON</p>
    <p><strong>Transport Price (fără TVA):</strong> {{ number_format($record->transport_price_no_tva, 2) }} RON</p>
    <p><strong>Total (fără TVA):</strong> {{ number_format($record->total_no_tva, 2) }} RON</p>
    <p><strong>Is Paid:</strong> {{ $record->is_paid ? 'DA' : 'NU' }}</p>
</body>
</html>
