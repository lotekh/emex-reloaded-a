<?php

namespace App\Helpers;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class JSONLD
{
    public static function make($prefix = ''): array
    {
        if($prefix == 'consumption_') {
            $fields = [
                Textarea::make('consumption_jsonld.description')
                    ->label('JSON-LD description')
                    ->rows(10)
                    ->columnSpan(3),
            ];
        }
        else {
            $fields = [
                Textarea::make('jsonld.description')
                    ->label('JSON-LD description')
                    ->rows(10)
                    ->columnSpan(3),
            ];
        }

        if($prefix == 'blog') {
            $fields = array_merge($fields, [
                TextInput::make('jsonld.alternativeHeadline')
                    ->label('JSON-LD Alternative Headline')
                    ->columnSpan(3),
            ]);
        }

        return $fields;
    }
}