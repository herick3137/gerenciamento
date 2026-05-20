<?php

namespace App\Filament\Resources\ManutencaoResource\Pages;

use App\Filament\Resources\ManutencaoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManutencaos extends ListRecords
{
    protected static string $resource = ManutencaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
