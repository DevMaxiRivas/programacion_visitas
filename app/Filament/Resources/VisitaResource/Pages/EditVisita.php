<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisita extends EditRecord
{
    protected static string $resource = VisitaResource::class;

    protected function obtenerAccionesPorRole(): array
    {
        if (User::actual()->rol == 'admin') {
            return [
                Actions\DeleteAction::make(),
            ];
        } else {
            return [];
        }
    }

    protected function getHeaderActions(): array
    {
        return $this->obtenerAccionesPorRole();
    }
}
