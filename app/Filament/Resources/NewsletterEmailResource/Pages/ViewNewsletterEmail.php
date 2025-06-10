<?php

namespace App\Filament\Resources\NewsletterEmailResource\Pages;

use App\Filament\Resources\NewsletterEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewNewsletterEmail extends ViewRecord
{
    protected static string $resource = NewsletterEmailResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

}
