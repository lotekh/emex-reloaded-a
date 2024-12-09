<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferRequestResource\Pages;
use App\Filament\Resources\OfferRequestResource\RelationManagers;
use App\Models\OfferRequest;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\PathGenerators\DefaultPathGenerator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfferRequestResource extends Resource
{
    protected static ?string $model = OfferRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('surface')
                    ->maxLength(255),
                Forms\Components\TextInput::make('usage')
                    ->maxLength(255),
                Forms\Components\TextInput::make('application')
                    ->maxLength(255),
                Forms\Components\Toggle::make('interior_exterior'),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                CuratorPicker::make('file_id')
                    ->label('File')
                    ->relationship('file', 'file_id')
                    // ->pathGenerator(DefaultPathGenerator::class)
                    ->preserveFilenames(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surface')
                    ->searchable(),
                Tables\Columns\TextColumn::make('usage')
                    ->searchable(),
                Tables\Columns\TextColumn::make('application')
                    ->searchable(),
                Tables\Columns\IconColumn::make('interior_exterior')
                    ->boolean(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
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
            'index' => Pages\ListOfferRequests::route('/'),
            'view' => Pages\ViewOfferRequest::route('/{record}'),
        ];
    }
}
