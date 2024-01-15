<?php

namespace App\Filament\Resources\ListesResource\Pages;

use App\Filament\Resources\ListesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListes extends EditRecord
{
    protected static string $resource = ListesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
