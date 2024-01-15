<?php

namespace App\Filament\Resources\ListesResource\Pages;

use App\Filament\Resources\ListesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListes extends ListRecords
{
    protected static string $resource = ListesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
