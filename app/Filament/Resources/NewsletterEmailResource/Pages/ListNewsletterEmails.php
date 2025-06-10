<?php

namespace App\Filament\Resources\NewsletterEmailResource\Pages;

use App\Filament\Resources\NewsletterEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListNewsletterEmails extends ListRecords
{
    protected static string $resource = NewsletterEmailResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }


}
