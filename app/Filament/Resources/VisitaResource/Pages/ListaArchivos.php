<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Resources\Pages\Page;

use App\Models\Visita;

class ListaArchivos extends Page
{
    protected static string $resource = VisitaResource::class;
    
    public Visita $record;

    protected static string $view = 'filament.resources.visita-resource.pages.lista-archivos';

    // protected static ?string $title = 'Lista de Archivos';

    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static ?string $navigationGroup = 'Visitas';

    // protected static ?int $navigationSort = 2;
    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'visitas.visibles', // Middleware para ver si el usuario puede visualizar el contenido de la visita
    ];


    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('volver')
                ->label('Volver')
                ->url(VisitaResource::getUrl('view', ['record' => $this->record]))
                ->requiresConfirmation(false),
        ];
    }
}
