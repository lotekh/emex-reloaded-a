<?php

namespace App\Filament\Resources\NewsletterEmailResource\Pages;

use App\Filament\Resources\NewsletterEmailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsletterEmail extends EditRecord
{
    protected static string $resource = NewsletterEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
