<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SimilarProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'similarProducts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('similar_product_id')
                    ->searchable()
                    ->label('Product slug')
                    ->getSearchResultsUsing(fn (string $search): array => Product::where('slug', 'like', "{$search}%")->limit(10)->pluck('slug', 'id')->toArray())
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->formatStateUsing(function ($state) {
                    return html_entity_decode(strip_tags($state));
                }),
                Tables\Columns\TextColumn::make('order'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order')
            ->defaultPaginationPageOption(25)
            ->reorderable('order');
    }
}
