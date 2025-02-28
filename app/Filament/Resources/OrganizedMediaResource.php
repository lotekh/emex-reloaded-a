<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizedMediaResource\Pages;
use App\Models\Media;
use App\Models\Product;
use Awcodes\Curator\Components\Forms\CuratorEditor;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Awcodes\Curator\Components\Forms\Uploader;
use Awcodes\Curator\Resources\MediaResource;
use Filament\Forms\Components\Select;

class OrganizedMediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(trans('curator::forms.sections.file'))
                            ->hiddenOn('edit')
                            ->schema([
                                Select::make('type')
                                ->options([
                                    'images' => 'Image',
                                    'technical-files' => 'Technical file',
                                ])
                                ->required(),
                                MediaResource::getUploaderField()
                                    ->required(),
                            ]),
                        Forms\Components\Tabs::make('image')
                            ->hiddenOn('create')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make(trans('curator::forms.sections.preview'))
                                    ->schema([
                                        Forms\Components\ViewField::make('preview')
                                            ->view('curator::components.forms.preview')
                                            ->hiddenLabel()
                                            ->dehydrated(false)
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                $component->state($record);
                                            }),
                                    ]),
                                Forms\Components\Tabs\Tab::make(trans('curator::forms.sections.curation'))
                                    ->visible(fn ($record) => is_media_resizable($record->type) && config('curator.tabs.display_curation'))
                                    ->schema([
                                        Forms\Components\Repeater::make('curations')
                                            ->label(trans('curator::forms.sections.curation'))
                                            ->hiddenLabel()
                                            ->reorderable(false)
                                            ->itemLabel(fn ($state): ?string => $state['curation']['key'] ?? null)
                                            ->collapsible()
                                            ->schema([
                                                CuratorEditor::make('curation')
                                                    ->hiddenLabel()
                                                    ->buttonLabel(trans('curator::forms.curations.button_label'))
                                                    ->required()
                                                    ->lazy(),
                                            ]),
                                    ]),
                                Forms\Components\Tabs\Tab::make(trans('curator::forms.sections.upload_new'))
                                    ->visible(config('curator.tabs.display_upload_new'))
                                    ->schema([
                                        MediaResource::getUploaderField()
                                            ->helperText(trans('curator::forms.sections.upload_new_helper')),
                                    ]),
                            ]),
                        Forms\Components\Section::make(trans('curator::forms.sections.details'))
                            ->schema([
                                Forms\Components\ViewField::make('details')
                                    ->view('curator::components.forms.details')
                                    ->hiddenLabel()
                                    ->dehydrated(false)
                                    ->columnSpan('full')
                                    ->afterStateHydrated(function ($component, $state, $record) {
                                        $component->state($record);
                                    }),
                            ]),
                        Forms\Components\Section::make(trans('curator::forms.sections.exif'))
                            ->collapsed()
                            ->visible(fn ($record) => $record && $record->exif)
                            ->schema([
                                Forms\Components\KeyValue::make('exif')
                                    ->hiddenLabel()
                                    ->dehydrated(false)
                                    ->addable(false)
                                    ->deletable(false)
                                    ->editableKeys(false)
                                    ->columnSpan('full'),
                            ]),
                    ])
                    ->columnSpan([
                        'md' => 'full',
                        'lg' => 2,
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(trans('curator::forms.sections.meta'))
                            ->schema(
                                MediaResource::getAdditionalInformationFormSchema()
                            ),
                    ])->columnSpan([
                        'md' => 'full',
                        'lg' => 1,
                    ]),
            ])->columns([
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('url')
                ->width(100)
                ->height(100)
                ->label('Preview'),
                TextColumn::make('path'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizedMedia::route('/'),
            'create' => Pages\CreateOrganizedMedia::route('/create'),
            'edit' => Pages\EditOrganizedMedia::route('/{record}/edit'),
        ];
    }
}
