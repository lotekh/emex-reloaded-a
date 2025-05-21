<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Comanda {{ $record->identifier }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        h1 { margin-bottom: 20px; }
        p { margin: 4px 0; }
    </style>
</head>
<body>
    <h1>Comanda #{{ $record->identifier }}</h1>

    {{-- USER --}}
    <p><strong>Utilizator:</strong>
        @if($record->user)
            {{ $record->user->first_name }} {{ $record->user->last_name }}
        @else
            Guest
        @endif
    </p>

    {{-- DELIVERY INFO --}}
    <p><strong>Informații de livrare:</strong><br>
        @php
            $delivery = json_decode($record->delivery_information, true);
        @endphp

        @if(is_array($delivery))
            @if(!empty($delivery['delivery_first_name']) || !empty($delivery['delivery_last_name']))
                Nume: {{ $delivery['delivery_first_name'] ?? '' }} {{ $delivery['delivery_last_name'] ?? '' }}<br>
            @endif
            @if(!empty($delivery['delivery_phone'])) Telefon: {{ $delivery['delivery_phone'] }}<br> @endif
            @if(!empty($delivery['delivery_email'])) Email: {{ $delivery['delivery_email'] }}<br> @endif
            @if(!empty($delivery['delivery_address'])) Adresă: {{ $delivery['delivery_address'] }}<br> @endif
            @if(!empty($delivery['delivery_county_id']))
                Județ: 
                {{ \App\Models\County::find($delivery['delivery_county_id'])->name ?? '—' }}<br>
            @endif
            @if(!empty($delivery['delivery_city_id']))
                Localitate:
                {{ \App\Models\City::find($delivery['delivery_city_id'])->name ?? '—' }}<br>
            @endif
        @else
            <em>Nu există informații de livrare.</em><br>
        @endif
    </p>

    {{-- BILLING INFO --}}
    <p><strong>Informații de facturare:</strong><br>
        @php
            $billing = json_decode($record->company_information, true);
        @endphp

        @if(is_array($billing))
            @if($record->billing_type == 0)
                {{-- Persoana fizica --}}
                Nume: {{ $billing['person_first_name'] ?? '' }} {{ $billing['person_last_name'] ?? '' }}<br>
                Telefon: {{ $billing['person_phone'] ?? '—' }}<br>
                Email: {{ $billing['person_email'] ?? '—' }}<br>
                Adresă: {{ $billing['person_address'] ?? '—' }}<br>
                Județ:
                    {{ \App\Models\County::find($billing['person_county_id'] ?? null)->name ?? '—' }}<br>
                Localitate:
                    {{ \App\Models\City::find($billing['person_city_id'] ?? null)->name ?? '—' }}<br>
            @else
                {{-- Persoana juridica --}}
                Nume firmă: {{ $billing['organization_name'] ?? '—' }}<br>
                CUI: {{ $billing['organization_cui'] ?? '—' }}<br>
                Telefon: {{ $billing['organization_phone'] ?? '—' }}<br>
                Email: {{ $billing['organization_email'] ?? '—' }}<br>
                Bancă: {{ $billing['organization_bank'] ?? '—' }}<br>
                Cont bancar: {{ $billing['organization_bank_account'] ?? '—' }}<br>
                Adresă: {{ $billing['organization_address'] ?? '—' }}<br>
                Județ:
                    {{ \App\Models\County::find($billing['organization_county_id'] ?? null)->name ?? '—' }}<br>
                Localitate:
                    {{ \App\Models\City::find($billing['organization_city_id'] ?? null)->name ?? '—' }}<br>
                Persoană de contact:
                    {{ $billing['contact_person_first_name'] ?? '' }} {{ $billing['contact_person_last_name'] ?? '' }}<br>
            @endif
        @else
            <em>Nu există informații de facturare.</em><br>
        @endif
    </p>

    {{-- PRODUCT VARIATIONS --}}
    @if ($record->productVariations->count())
        <br><strong>Produse comandate:</strong><br>
        @foreach ($record->productVariations as $prod)
            <p>
                <strong>{{ $loop->iteration }}.</strong> {{ $prod->name }}<br>
                Cantitate: {{ $prod->pivot->quantity }}<br>
                Preț unitar: {{ number_format($prod->pivot->price, 2) }} RON<br>
                Valoare totală: {{ number_format($prod->pivot->price * $prod->pivot->quantity, 2) }} RON<br>
            </p>
        @endforeach
    @endif

    {{-- PAYMENT & PRICES --}}
    <br>
    <p><strong>Tip livrare:</strong>
        @if ($record->delivery_type === 0)
            Livrare prin curier
        @elseif ($record->delivery_type === 1)
            Ridicare personală
        @else
            —
        @endif
    </p>
    <p><strong>Metodă de plată:</strong> {{ $record->payment_method ?? '—' }}</p>
    <p><strong>Total:</strong> {{ number_format($record->total ?? 0, 2) }} RON</p>
    <p><strong>Total fără TVA:</strong>
        {{ $record->total_no_tva ? number_format($record->total_no_tva, 2) . ' RON' : '—' }}
    </p>
    <p><strong>Cost transport:</strong>
        {{ $record->transport_price ? number_format($record->transport_price, 2) . ' RON' : '—' }}
    </p>
    <p><strong>Cost transport fără TVA:</strong>
        {{ $record->transport_price_no_tva ? number_format($record->transport_price_no_tva, 2) . ' RON' : '—' }}
    </p>
    <p><strong>Plătită:</strong> {{ $record->is_paid ? 'DA' : 'NU' }}</p>

</body>
</html>
