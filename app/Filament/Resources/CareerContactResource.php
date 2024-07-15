<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerContactResource\Pages;
use App\Filament\Resources\CareerContactResource\RelationManagers;
use App\Models\CareerContact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerContactResource extends Resource
{
    protected static ?string $model = CareerContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth'),
                Forms\Components\TextInput::make('gender')
                    ->maxLength(1),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('postal_code')
                    ->maxLength(6),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('ip')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('postal_code')
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('city')
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('ip')
                    ->sortable()
                    ->searchable(isIndividual: true),
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
            'index' => Pages\ListCareerContacts::route('/'),
            'view' => Pages\ViewCareerContact::route('/{record}'),
        ];
    }
}
