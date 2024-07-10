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
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('delivery_type')
                    ->boolean(),
                Tables\Columns\TextColumn::make('delivery_last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('delivery_first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('delivery_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('delivery_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_type')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('person_last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('person_first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('person_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('person_county_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('person_city_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('person_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('person_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_vat_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_bank')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_bank_account')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_county_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('organization_city_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('organization_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('identifier')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean(),
                Tables\Columns\TextColumn::make('transport_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('transport_price_no_tva')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_no_tva')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_code_id')
                    ->numeric()
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
            'create' => Pages\CreateOrder::route('/create'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('name'),
                Infolists\Components\TextEntry::make('email'),
                Infolists\Components\TextEntry::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
