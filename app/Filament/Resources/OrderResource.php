<?php

namespace App\Filament\Resources;

use App\Filament\Exports\OrderProductVariationExporter;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderProductVariation;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Tables\Enums\FiltersLayout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('identifier')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('user.last_name')
                    ->state(function (Model $record) {
                        if ($record->user === null) {
                            $billing_info = json_decode($record->company_information);
                            if ($record->billing_type == 1) {
                                return 'Guest: ' . $billing_info->organization_name ?? 'client';
                            } else {
                                return 'Guest: ' . trim(($billing_info->person_first_name ?? '') . ' ' . ($billing_info->person_last_name ?? ''));
                            }
                        }
                        return $record->user->first_name . ' ' . $record->user->last_name;
                    })
                    ->searchable(true, function (Builder $query, string $search): Builder {
                        $search = strtolower($search);

                        return $query->where(function (Builder $query) use ($search) {
                            $query->whereNotNull('user_id')
                                ->whereHas('user', function (Builder $subQuery) use ($search) {
                                    $subQuery->whereRaw('LOWER(first_name) LIKE ?', ["%{$search}%"])
                                        ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$search}%"]);
                                })
                                ->orWhere(function (Builder $query) use ($search) {
                                    $query->whereRaw('LOWER(company_information) LIKE ?', ["%{$search}%"]);
                                });
                        });
                    }, true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_address')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->state(function (Order $record) {
                        $delivery_info = json_decode($record->delivery_information);
                        return implode(', ', (array)$delivery_info);
                    })
                    ->label('Delivery info')
                    ->wrap()
                    ->extraAttributes(['class' => 'max-w-sm truncate']),
                Tables\Columns\TextColumn::make('billing_type')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->state(function (Order $record) {
                        $billing_info = json_decode($record->company_information);
                        return implode(', ', (array)$billing_info);
                    })
                    ->label('Billing info')
                    ->wrap()
                    ->extraAttributes(['class' => 'max-w-sm truncate']),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:i', 'Europe/Bucharest')
                    ->label('Created at'),
                Tables\Columns\TextColumn::make('company_info')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->state(function (Model $record) {
                        return
                            $record->organization_name . ', ' .
                            $record->organization_email . ', ' .
                            $record->organization_phone . ', ' .
                            $record->organization_address;
                    }),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_paid'),
                Tables\Columns\TextColumn::make('transport_price')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('transport_price_no_tva')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_no_tva')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_code_id')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->form([
                        Grid::make()
                            ->columns(2)
                            ->schema([
                                DatePicker::make('start_date'),
                                DatePicker::make('end_date'),
                            ])
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_date'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['end_date'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })->columnSpan(2),
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(4)
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Order $record) {
                        $billing = json_decode($record->company_information, true);

                        if ($record->billing_type == 1) {
                            $completeName = $billing['organization_name'] ?? 'client';
                        } else {
                            $completeName = trim(($billing['person_first_name'] ?? '') . ' ' . ($billing['person_last_name'] ?? ''));
                        }

                        $fileName = $record->identifier . '_' . $completeName . '.pdf';

                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf.order-admin', ['record' => $record])
                            )->stream();
                        }, $fileName);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(OrderProductVariationExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                    ])
                    ->label('Export order products')
                    ->modifyQueryUsing(function (Builder $query) {
                        return OrderProductVariation::query()->with('order')->with('productVariation')
                            ->whereIn('order_id', $query->pluck('id'));
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Delivery Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('delivery_first_name')
                            ->state(function (Order $record) {
                                $delivery_info = json_decode($record->delivery_information);
                                return $delivery_info->delivery_first_name ?? '';
                            }),
                        Infolists\Components\TextEntry::make('delivery_last_name')
                            ->state(function (Order $record) {
                                $delivery_info = json_decode($record->delivery_information);
                                return $delivery_info->delivery_last_name ?? '';
                            }),
                        Infolists\Components\TextEntry::make('delivery_phone')
                            ->state(function (Order $record) {
                                $delivery_info = json_decode($record->delivery_information);
                                return $delivery_info->delivery_phone ?? '';
                            }),
                        Infolists\Components\TextEntry::make('delivery_email')
                            ->state(function (Order $record) {
                                $delivery_info = json_decode($record->delivery_information);
                                return $delivery_info->delivery_email ?? '';
                            }),
                        Infolists\Components\TextEntry::make('delivery_city')
                            ->state(function (Order $record) {
                                $delivery_info = json_decode($record->delivery_information);
                                if (!isset($delivery_info->delivery_city_id)) {
                                    return '';
                                }
                                return City::find($delivery_info->delivery_city_id)->name;
                            }),
                        Infolists\Components\TextEntry::make('delivery_address')
                            ->state(function (Order $record) {
                                $delivery_info = json_decode($record->delivery_information);
                                return $delivery_info->delivery_address ?? '';
                            }),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Infolists\Components\Section::make('Billing Information')
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('person_first_name')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->person_first_name ?? '';
                            }),
                        Infolists\Components\TextEntry::make('person_last_name')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->person_last_name ?? '';
                            }),
                        Infolists\Components\TextEntry::make('person_email')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->person_email ?? '';
                            }),
                        Infolists\Components\TextEntry::make('person_address')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->person_address ?? '';
                            }),
                    ])
                    ->hidden(fn(Order $record) => $record->billingType == 1)
                    ->columnSpanFull(),

                Infolists\Components\Section::make('Company Information')
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('organization_name')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_name ?? '';
                            }),
                        Infolists\Components\TextEntry::make('organization_vat_code')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_vat_code ?? '';
                            }),
                        Infolists\Components\TextEntry::make('organization_bank')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_bank ?? '';
                            }),
                        Infolists\Components\TextEntry::make('organization_bank_account')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_bank_account ?? '';
                            }),
                        Infolists\Components\TextEntry::make('organization_city')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                if (!isset($billing_info->organization_city_id)) {
                                    return '';
                                }
                                return City::find($billing_info->organization_city_id)->name;
                            }),
                        Infolists\Components\TextEntry::make('organization_address')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_address ?? '';
                            }),
                        Infolists\Components\TextEntry::make('organization_phone')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_phone ?? '';
                            }),
                        Infolists\Components\TextEntry::make('organization_email')
                            ->state(function (Order $record) {
                                $billing_info = json_decode($record->company_information);
                                return $billing_info->organization_email ?? '';
                            }),
                    ])
                    ->hidden(fn(Order $record) => $record->billingType == 0)
                    ->columnSpanFull(),

                Infolists\Components\Section::make('Products')
                    ->schema([
                        Infolists\Components\TextEntry::make('product_info')
                            ->state(function (Order $record) {
                                $products = '';
                                foreach ($record->productVariations as $productVariation) {
                                    $products .= '<p>' . $productVariation->name . '  /  ' . $productVariation->pivot->quantity . ' BUC /  ' . $productVariation->pivot->price . ' RON' . '</p>';
                                }

                                return $products;
                            })->html(),
                    ]),

                Infolists\Components\Section::make('General Information')
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('identifier'),
                        Infolists\Components\TextEntry::make('is_paid'),
                        Infolists\Components\TextEntry::make('transport_price'),
                        Infolists\Components\TextEntry::make('transport_price_no_tva'),
                        Infolists\Components\TextEntry::make('total_no_tva'),
                        Infolists\Components\TextEntry::make('total'),
                        Infolists\Components\TextEntry::make('payment_method'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
