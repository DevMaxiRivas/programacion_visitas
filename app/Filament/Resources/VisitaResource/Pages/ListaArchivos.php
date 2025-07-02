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

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         // Add any header actions if needed
    //     ];
    // }
}
