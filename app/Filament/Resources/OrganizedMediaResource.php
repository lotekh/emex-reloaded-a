<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizedMediaResource\Pages;
use App\Filament\Resources\OrganizedMediaResource\Pages\CreateOrganizedMedia;
use App\Models\Media;
use App\Models\Product;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Awcodes\Curator\PathGenerators\DefaultPathGenerator;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class OrganizedMediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // CuratorColumn::make('url')
                // ->width(100)
                // ->height(100)
                // ->label('Preview'),
                TextColumn::make('url')
                ->formatStateUsing(function ($state, $record) {
                    if($state) {
                        $state = $record->getSignedUrl([
                            'w' => 100,
                            'h' => 100,
                            'fit' => 'crop',
                            // 'fm' => 'webp'
                        ]);
                        return "<img src='{$state}' style='width: 100px; height: 100px; object-fit: cover;'>";
                    }
                    return null;
                })
                ->html(),

                TextColumn::make('path'),
                TextColumn::make('width'),
                TextColumn::make('height'),
            ])
            ->filters([
                    SelectFilter::make('ext')
                        ->options([
                            'jpg' => 'JPG',
                            'png' => 'PNG',
                            'webp' => 'WEBP',
                            'pdf' => 'PDF',
                        ])
                        ->label('Extension'),
                    Filter::make('name')
                        ->form([
                            TextInput::make('value')
                                ->placeholder('Nume fisier')
                                ->label('Nume fisier')
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query->where('path', 'like', '%' . $data['value'] . '%');
                        }),
                    SelectFilter::make('product')
                        ->options(Product::all()->pluck('slug', 'id')->toArray())
                        ->label('Product slug')
                        ->searchable()
                        ->query(function (Builder $query, array $data): Builder {
                            if($data['value']) {
                                $product = Product::find($data['value']);
                                $files = [
                                    $product->og_image_id,
                                    $product->consumption_og_image_id,
                                    $product->twitter_image_id,
                                    $product->consumption_twitter_image_id,
                                    $product->small_image_id,
                                    $product->large_image_id,
                                    $product->technical_file_id,
                                    $product->png_small_image_id,
                                    $product->png_large_image_id,
                                ];
                                return $query->whereIn('id', $files);
                            }
                            return $query;
                        }),
                ], layout: FiltersLayout::AboveContent)
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

    public static function getRedirectUrl(): ?string
    {
        // Redirect to a specific route after deleting the resource
        return route('filament.admin.resources.organized-media.index');  // Redirect to the index page of posts
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizedMedia::route('/'),
            'create' => CreateOrganizedMedia::route('/create'),
            'edit' => Pages\EditOrganizedMedia::route('/{record}/edit'),
        ];
    }
}
