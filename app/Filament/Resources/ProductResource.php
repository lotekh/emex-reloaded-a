<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('plain_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sub_title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('category_page_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('category_page_link_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('category_page_title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('usage_details')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('technical_details')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\Toggle::make('has_palette')
                    ->required(),
                Forms\Components\Toggle::make('has_instructions')
                    ->required(),
                Forms\Components\Toggle::make('has_calculus')
                    ->required(),
                Forms\Components\Toggle::make('has_technical_file')
                    ->required(),
                Forms\Components\Toggle::make('has_hardener')
                    ->required(),
                Forms\Components\TextInput::make('h2_contact_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('h3_contact_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price_disclaimer')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('available_since'),
                Forms\Components\Toggle::make('is_package'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('plain_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_page_link_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_page_title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_palette')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_instructions')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_calculus')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_technical_file')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_hardener')
                    ->boolean(),
                Tables\Columns\TextColumn::make('h2_contact_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('h3_contact_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_disclaimer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('available_since')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_package')
                    ->boolean(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
