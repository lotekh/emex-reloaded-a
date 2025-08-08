<?php

namespace App\Filament\Resources;

use App\Filament\Components\UpdatedCuratorPicker;
use App\Filament\Resources\BlogArticleResource\Pages;
use App\Filament\Resources\BlogArticleResource\RelationManagers;
use App\Helpers\JSONLD;
use App\Helpers\SeoForm;
use App\Models\BlogArticle;
use App\Models\Tag;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\PathGenerators\DefaultPathGenerator;
use Awcodes\Curator\PathGenerators\UserPathGenerator;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;



class BlogArticleResource extends Resource
{
    protected static ?string $model = BlogArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function shouldRegisterNavigation($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('General Information')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->columnSpanFull()
                                    ->options(
                                        Tag::query()
                                            ->pluck('name', 'id')
                                            ->toArray()
                                    )
                                    ->createOptionForm(function () {
                                        return Tag::form();
                                    })
                                    ->createOptionUsing(function (array $data) {
                                        $tag = Tag::create($data);
                                        return $tag->name;
                                    })
                                    ->multiple()
                                    ->required(),
                                MarkdownEditor::make('body')
                                    ->required()
                                    ->columnSpanFull(),
                                UpdatedCuratorPicker::make('featured_image_id')
                                    ->relationship('featuredImage', 'featured_image_id')
                                    ->pathGenerator(DefaultPathGenerator::class)
                                    ->preserveFilenames(),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Is_Active')
                                    ->default(true)
                                    ->inline(false)
                            ]),
                        Tabs\Tab::make('SEO')
                        ->schema(SeoForm::make()),
                        Tabs\Tab::make('JSON-LD')
                            ->schema(JSONLD::make('blog'))
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(isIndividual: true),
                Tables\Columns\IconColumn::make('is_active') 
                    ->label('Is_Active')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListBlogArticles::route('/'),
            'create' => Pages\CreateBlogArticle::route('/create'),
            'edit' => Pages\EditBlogArticle::route('/{record}/edit'),
        ];
    }
}
