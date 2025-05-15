<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->searchable()
                    ->label('Product slug')
                    ->getSearchResultsUsing(fn (string $search): array => Product::where('slug', 'like', "{$search}%")->limit(10)->pluck('slug', 'id')->toArray())
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('plain_name')
            ->columns([
                Tables\Columns\TextColumn::make('plain_name')
                ->formatStateUsing(function ($state) {
                    return html_entity_decode($state);
                }),
                Tables\Columns\TextColumn::make('order'),
            ])
            ->defaultSort('order')
            ->headerActions([
                Tables\Actions\AttachAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                
                    $category = Category::find($this->ownerRecord->id);
                    $max = $category->products()->max('categories_products.order');
                    $data['order'] = $max ? $max + 1 : 1;
                
                    return $data;
                })
            ])
            ->defaultPaginationPageOption(25)
            ->reorderable('order');
    }
}
