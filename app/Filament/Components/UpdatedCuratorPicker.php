<?php

namespace App\Filament\Components;

use App\Filament\Resources\OrganizedMediaResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\PathGenerators\DefaultPathGenerator;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\Facades\App;

class UpdatedCuratorPicker extends CuratorPicker {
    public function getEditAction(): Action
    {
        // return Action::make('edit')
        //     ->label(trans('curator::views.picker.edit'))
        //     ->icon('heroicon-s-pencil')
        //     ->color('gray')
        //     ->hidden(fn (CuratorPicker $component): bool => $component->isDisabled())
        //     ->url(function (array $arguments): string {
        //         return App::make(OrganizedMediaResource::class)
        //             ->getUrl('edit', ['record' => $arguments['id']]);
        //     }, true);
    }
}

