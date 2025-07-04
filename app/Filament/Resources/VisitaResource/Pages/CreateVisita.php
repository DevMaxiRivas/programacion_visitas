<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVisita extends CreateRecord
{
    protected static string $resource = VisitaResource::class;

    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'rol:admin', // Middleware to check if the visit can be modified
    ];

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}
