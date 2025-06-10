<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterEmailResource\Pages;
use App\Filament\Resources\NewsletterEmailResource\RelationManagers;
use App\Models\NewsletterEmail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class NewsletterEmailResource extends Resource
{
    protected static ?string $model = NewsletterEmail::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function shouldRegisterNavigation($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('page_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ip')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('page_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip')
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
            'index' => Pages\ListNewsletterEmails::route('/'),
            'view' => Pages\ViewNewsletterEmail::route('/{record}'),
        ];
    }
}
