<?php

namespace App\Filament\Resources\OfferRequestResource\Pages;

use App\Filament\Resources\OfferRequestResource;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewOfferRequest extends ViewRecord
{
    protected static string $resource = OfferRequestResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

}
