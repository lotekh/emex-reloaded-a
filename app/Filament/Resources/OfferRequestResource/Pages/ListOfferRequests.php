<?php

namespace App\Filament\Resources\OfferRequestResource\Pages;

use App\Filament\Resources\OfferRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListOfferRequests extends ListRecords
{
    protected static string $resource = OfferRequestResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }


}
