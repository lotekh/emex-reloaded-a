<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Table;
use Symfony\Component\Console\Input\Input;

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
                ->form([
                    Forms\Components\Select::make('product_id')
                    ->searchable()
                    ->label('Product slug')
                    ->getSearchResultsUsing(fn (string $search): array => Product::where('slug', 'like', "{$search}%")->limit(10)->pluck('slug', 'id')->toArray())
                    ->required(),
                ])
                ->mutateFormDataUsing(function (array $data): array {
                    $productIdToAttach = $data['product_id'];
                    $category = Category::find($this->ownerRecord->id); // Use the $record passed to the closure
            
                    $currentMaxOrder = $category->products()->max('categories_products.order') ?? 0;
                    $newOrder = $currentMaxOrder + 1;
            
                    $category->products()->attach([
                        $productIdToAttach => ['order' => $newOrder],
                    ]);
            
                    // Return an empty array to prevent Filament's default attach logic
                    return ['product_id' => null, 'recordId' => 'product_id'];
                })
            ])
            ->defaultPaginationPageOption(25)
            ->reorderable('order');
    }
}
