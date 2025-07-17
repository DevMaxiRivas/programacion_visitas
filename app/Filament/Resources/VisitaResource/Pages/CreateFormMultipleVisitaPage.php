<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Resources\Pages\Page;

class CreateFormMultipleVisitaPage extends Page
{
    protected static string $resource = VisitaResource::class;

    protected static string $view = 'filament.resources.visita-resource.pages.create-form-multiple-visita-page';

    protected static ?string $title = 'Crear Multiples Visitas';
}
