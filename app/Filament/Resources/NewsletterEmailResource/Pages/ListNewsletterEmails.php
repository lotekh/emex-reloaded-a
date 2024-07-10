<?php

namespace App\Filament\Resources\NewsletterEmailResource\Pages;

use App\Filament\Resources\NewsletterEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsletterEmails extends ListRecords
{
    protected static string $resource = NewsletterEmailResource::class;

}
