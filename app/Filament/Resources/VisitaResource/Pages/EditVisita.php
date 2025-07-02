<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Filament\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisita extends EditRecord
{
    protected static string $resource = VisitaResource::class;

    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'visitas.modificables', // Middleware to check if the visit can be modified
    ];
    // protected static string | array $middlewares = [
    //     'auth', // Middleware for authentication on this page
    //     'visitas.modificables', // Middleware to check if the visit can be modified
    // ];

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->record]);
    }
}
