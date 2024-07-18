<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Infolist;

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
                Tables\Columns\TextColumn::make('user')
                    ->state(function (Model $record) {
                        return $record->user->first_name . ' ' . $record->user->last_name;
                    })
                    ->searchable(isIndividual: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_info')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->state(function (Model $record) {
                        return
                            $record->delivery_last_name . ' ' .
                            $record->delivery_first_name . ', ' .
                            $record->delivery_phone . ', ' .
                            $record->delivery_email . ', ' .
                            $record->delivery_address;
                    }),
                Tables\Columns\TextColumn::make('billing_info')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->state(function (Model $record) {
                        return
                            $record->person_last_name . ' ' .
                            $record->person_first_name . ', ' .
                            $record->person_email . ', ' .
                            $record->person_phone . ', ' .
                            $record->person_address . ', ' .
                            $record->delivery_address;
                    }),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
                        Infolists\Components\TextEntry::make('delivery_first_name'),
                        Infolists\Components\TextEntry::make('delivery_last_name'),
                        Infolists\Components\TextEntry::make('delivery_phone'),
                        Infolists\Components\TextEntry::make('delivery_email'),
                        Infolists\Components\TextEntry::make('delivery_city'),
                        Infolists\Components\TextEntry::make('delivery_address'),
                    ])
                    ->columnSpanFull(),

                Infolists\Components\Section::make('Billing Information')
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('person_first_name'),
                        Infolists\Components\TextEntry::make('person_last_name'),
                        Infolists\Components\TextEntry::make('person_email'),
                        Infolists\Components\TextEntry::make('person_address'),
                        Infolists\Components\TextEntry::make('payment_method'),
                    ])
                    ->columnSpanFull(),

                Infolists\Components\Section::make('Company Information')
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('organization_name'),
                        Infolists\Components\TextEntry::make('organization_vat_code'),
                        Infolists\Components\TextEntry::make('organization_bank'),
                        Infolists\Components\TextEntry::make('organization_bank_account'),
                        Infolists\Components\TextEntry::make('organization_city'),
                        Infolists\Components\TextEntry::make('organization_address'),
                        Infolists\Components\TextEntry::make('organization_phone'),
                        Infolists\Components\TextEntry::make('organization_email'),
                    ])
                    ->columnSpanFull(),

                Infolists\Components\Section::make('General Information')
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('identifier'),
                        Infolists\Components\TextEntry::make('is_paid'),
                        Infolists\Components\TextEntry::make('transport_price'),
                        Infolists\Components\TextEntry::make('transport_price_no_tva'),
                        Infolists\Components\TextEntry::make('total_no_tva'),
                        Infolists\Components\TextEntry::make('total'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
