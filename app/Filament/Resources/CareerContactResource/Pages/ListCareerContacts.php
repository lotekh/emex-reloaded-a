<?php

namespace App\Filament\Resources\CareerContactResource\Pages;

use App\Filament\Resources\CareerContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListCareerContacts extends ListRecords
{
    protected static string $resource = CareerContactResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

}
