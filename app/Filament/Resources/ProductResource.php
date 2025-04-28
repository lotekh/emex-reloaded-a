<?php

namespace App\Filament\Resources;

use App\Filament\Components\UpdatedCuratorPicker;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\SimilarProductsRelationManager;
use App\Helpers\JSONLD;
use App\Helpers\SeoForm;
use App\Models\Product;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\PathGenerators\DefaultPathGenerator;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('General Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('plain_name')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sub_title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ean')
                                    ->maxLength(13),
                                Forms\Components\TextInput::make('sku')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('mpn')
                                    ->maxLength(20),
                                MarkdownEditor::make('description')
                                    ->columnSpanFull(),
                                MarkdownEditor::make('usage_details')
                                    ->columnSpanFull(),
                                MarkdownEditor::make('technical_details')
                                    ->columnSpanFull(),
                                UpdatedCuratorPicker::make('technical_file_id')
                                    ->label('Technical file')
                                    ->relationship('technicalFile', 'technical_file_id')
                                    ->pathGenerator(DefaultPathGenerator::class)
                                    ->preserveFilenames(),
                                DatePicker::make('available_since')
                                    ->label('Available since')
                                    ->placeholder('Select a date')
                                    ->displayFormat('Y-m-d'),
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\Toggle::make('has_palette')
                                            ->default(true),
                                        Forms\Components\Toggle::make('has_instructions')
                                            ->default(true),
                                        Forms\Components\Toggle::make('has_calculus')
                                            ->default(true),
                                        Forms\Components\Toggle::make('has_technical_file')
                                            ->default(true),
                                        Forms\Components\Toggle::make('has_hardener')
                                            ->default(true),
                                        Forms\Components\Toggle::make('is_package'),
                                    ]),
                                Forms\Components\Toggle::make('active')
                                    ->required()
                                    ->columnSpan(1),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        UpdatedCuratorPicker::make('large_image_id')
                                            ->label('Webp Large Image')
                                            ->relationship('largeImage', 'large_image_id')
                                            ->pathGenerator(DefaultPathGenerator::class)
                                            ->preserveFilenames(),
                                        UpdatedCuratorPicker::make('small_image_id')
                                            ->label('Webp Small Image')
                                            ->relationship('smallImage', 'small_image_id')
                                            ->pathGenerator(DefaultPathGenerator::class)
                                            ->preserveFilenames(),
                                        UpdatedCuratorPicker::make('png_large_image_id')
                                            ->label('Png Large Image')
                                            ->relationship('pngLargeImage', 'png_large_image_id')
                                            ->pathGenerator(DefaultPathGenerator::class)
                                            ->preserveFilenames(),
                                        UpdatedCuratorPicker::make('png_small_image_id')
                                            ->label('Png Small Image')
                                            ->relationship('pngSmallImage', 'png_small_image_id')
                                            ->pathGenerator(DefaultPathGenerator::class)
                                            ->preserveFilenames(),
                                    ]),
                            ]),
                        Tabs\Tab::make('Category')
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('category_page_title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('category_page_link_title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('h2_contact_title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('h3_contact_title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('price_disclaimer')
                                    ->columnSpanFull()
                                    ->maxLength(500),
                                MarkdownEditor::make('category_page_description')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('SEO')
                            ->schema(SeoForm::make()),
                        Tabs\Tab::make('JSON-LD')
                            ->schema(JSONLD::make()),
                        Tabs\Tab::make('Consumption')
                            ->schema([
                                Forms\Components\TextInput::make('consumption.surface_name'),
                                Forms\Components\TextInput::make('consumption.surface_types'),
                                Forms\Components\TextInput::make('consumption.surface_type_name')
                            ]),

                        Tabs\Tab::make('Consumption SEO')
                            ->schema(SeoForm::make(prefix: 'consumption_')),
                        Tabs\Tab::make('Consumption JSON-LD')
                            ->schema(JSONLD::make(prefix: 'consumption_')),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plain_name')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return html_entity_decode($state);
                    }),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('category_page_link_title')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('viewVariations')
                    ->label('View variations')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route('filament.admin.resources.product-variations.index', [
                        'tableSearch' => $record->slug 
                    ]), true),
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
            SimilarProductsRelationManager::class,
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
