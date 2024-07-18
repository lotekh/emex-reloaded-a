<?php

namespace App\Helpers;

use Filament\Forms\Components\Textarea;

class JSONLD
{
    public static function make($prefix = ''): array
    {
        return [
            Textarea::make($prefix . 'jsonld')
                ->label('JSON-LD')
                ->rows(10)
                ->columnSpan(3),
        ];
    }
}