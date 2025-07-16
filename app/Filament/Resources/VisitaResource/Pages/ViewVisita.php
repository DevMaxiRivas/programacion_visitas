<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use App\Models\User;
use App\Models\Visita;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Log;

class ViewVisita extends ViewRecord
{
    protected static string $resource = VisitaResource::class;

    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'visitas.visibles', // Middleware para ver si el usuario puede visualizar el contenido de la visita
    ];

    protected function getHeaderActions(): array
    {
        $acciones = [
            Actions\Action::make('volver')
                ->label('Volver')
                ->url(VisitaResource::getUrl('index'))
                ->requiresConfirmation(false),
            Actions\Action::make('descargar_archivos')
                ->label('Listado de Archivos')
                ->url(VisitaResource::getUrl('lista_archivos', ['record' => $this->record]) ?? '#')
                ->color('primary')
                ->requiresConfirmation(false)
        ];

        if (User::actual()->rol->is_admin() || $this->record->es_editable()) {
            array_push($acciones, Actions\EditAction::make());
        }

        return $acciones;
    }
}
