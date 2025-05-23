<?php

namespace App\Helpers;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class JSONLD
{
    public static function make($prefix = ''): array
    {
        $fields = [
            Textarea::make('jsonld.description')
                ->label('JSON-LD description')
                ->rows(10)
                ->columnSpan(3),
        ];

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