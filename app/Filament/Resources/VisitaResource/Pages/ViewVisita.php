<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVisita extends ViewRecord
{
    protected static string $resource = VisitaResource::class;



    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('volver')
            ->label('Volver')
            ->url(VisitaResource::getUrl('index'))
                ->color('secondary')
                ->requiresConfirmation(false),
                Actions\EditAction::make(),
                Actions\Action::make('descargar_archivos')
                ->label('Descargar Archivos')
                // ->url(fn () => route('visitas.archivos', ['visita' => $this->record->id]))
                ->url("#")
                ->color('primary')
                ->requiresConfirmation(false)
        ];
    }
}
