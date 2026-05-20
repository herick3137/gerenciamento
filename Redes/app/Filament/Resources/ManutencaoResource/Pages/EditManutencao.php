<?php

namespace App\Filament\Resources\ManutencaoResource\Pages;

use App\Filament\Resources\ManutencaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManutencao extends EditRecord
{
    protected static string $resource = ManutencaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
