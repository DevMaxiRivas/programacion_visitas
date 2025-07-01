<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Resources\Pages\Page;

class ListaArchivos extends Page
{
    protected static string $resource = VisitaResource::class;

    protected static string $view = 'filament.resources.visita-resource.pages.lista-archivos';
}
