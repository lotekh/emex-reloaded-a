<?php

namespace App\Filament\Exports;

use App\Models\OrderProductVariation;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;


class OrderProductVariationExporter extends Exporter
{
    protected static ?string $model = OrderProductVariation::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('order.transport_price_no_tva')
                ->formatStateUsing(function ($state, $record) {
                    $user = $record->order->user;

                    if($user) {
                        return $user->last_name;
                    }
                    else {
                        $billingInfo = json_decode($record->order->company_information, true);

                        if($billingInfo && isset($billingInfo['person_last_name'])) {
                            return $billingInfo['person_last_name'];
                        } else if($billingInfo && isset($billingInfo['organization_name'])) {
                            return $billingInfo['organization_name'];
                        }
                        else {
                            return '';
                        }
                    }
                })
                ->label('Nume'),
            ExportColumn::make('order.total_no_tva')
                ->label('Prenume')
                ->formatStateUsing(function ($state, $record) {
                    $user = $record->order->user;

                    if($user) {
                        return $user->first_name;
                    }
                    else {
                        $billingInfo = json_decode($record->order->company_information, true);

                        if($billingInfo && isset($billingInfo['person_first_name'])) {
                            return $billingInfo['person_first_name'];
                        } else if($billingInfo && isset($billingInfo['organization_name'])) {
                            return $billingInfo['organization_name'];
                        }
                        else {
                            return '';
                        }
                    }
                }),
            ExportColumn::make('productVariation.name')
                ->label('Email')
                ->formatStateUsing(function ($state, $record) {
                    $user = $record->order->user;

                    if($user) {
                        return $user->email;
                    }
                    else {
                        $billingInfo = json_decode($record->order->company_information, true);

                        if($billingInfo && isset($billingInfo['person_email'])) {
                            return $billingInfo['person_email'];
                        } else if($billingInfo && isset($billingInfo['organization_email'])) {
                            return $billingInfo['organization_email'];
                        }
                        else {
                            return '';
                        }
                    }
                }),
            ExportColumn::make('productVariation.ean')
                ->label('Telefon')
                ->formatStateUsing(function ($state, $record) {
                    $user = $record->order->user;

                    if($user) {
                        return $user->phone;
                    }
                    else {
                        $billingInfo = json_decode($record->order->company_information, true);

                        if($billingInfo && isset($billingInfo['person_phone'])) {
                            return $billingInfo['person_phone'];
                        } else if($billingInfo && isset($billingInfo['organization_phone'])) {
                            return $billingInfo['organization_phone'];
                        }
                        else {
                            return '';
                        }
                    }
                }),
            ExportColumn::make('order.company_information')
                ->label('Adresa de facturare')
                ->formatStateUsing(function ($state) {
                    $state = json_decode($state, true);
                    return implode(',', (array)$state);
                }),
            ExportColumn::make('order.delivery_information')
                ->label('Adresa de livrare')
                ->formatStateUsing(function ($state) {
                    $state = json_decode($state, true);
                    return implode(',', (array)$state);
                }),
            ExportColumn::make('order.guid')
                ->label('CUI')
                ->formatStateUsing(function ($state, $record) {
                    $organizationInfo = json_decode($record->order->company_information, true);
                    if(isset($organizationInfo['organization_cui']))
                        return $organizationInfo['organization_cui'];
                    else {
                        return '';
                    }
                }),
            ExportColumn::make('productVariation.short_name')
                ->label('Produs'),
            ExportColumn::make('quantity')
                ->label('Cantitate'),
            ExportColumn::make('productVariation.colour')
                ->label('Culoare'),
            ExportColumn::make('productVariation.quantity')
                ->label('Ambalaj')
                ->formatStateUsing(function ($state, $record) {
                    $measurementUnit = $record->productVariation->measurementUnit->name;
                    return $state . ' ' . $measurementUnit;
                }),
            ExportColumn::make('price')
                ->label('Pret')
                ->formatStateUsing(fn (string $state): string => number_format($state, 2)),
            ExportColumn::make('mentions')
                ->label('Mentiuni'),
            ExportColumn::make('order.transport_price')
                ->label('Taxa transport')
                ->formatStateUsing(fn (string $state): string => number_format($state, 2)),
            ExportColumn::make('order.total')
                ->label('Cost ramburs')
                ->formatStateUsing(function ($state, $record) {
                    $rambursValue = round(($record->order->total_no_tva + $record->order->transport_price) * 3 / 100, 2);
                    $rambursTva = round($rambursValue * 19 / 100, 2);

                    return number_format($rambursValue + $rambursTva, 2);
                }),
            ExportColumn::make('order.identifier')
                ->label('Numar proforma'),
            ExportColumn::make('order.payment_method')
                ->label('Metoda de plata'),
            ExportColumn::make('order.created_at')
                ->label('Data plasarii')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your order product variation export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
