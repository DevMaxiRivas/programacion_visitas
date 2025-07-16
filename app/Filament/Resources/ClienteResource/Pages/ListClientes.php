<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Imports\ClienteImporter;
use App\Filament\Resources\ClienteResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListClientes extends ListRecords
{
    protected static string $resource = ClienteResource::class;

    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'rol:admin', // Middleware to check if the visit can be modified
    ];

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->label('Importar Clientes')
                ->importer(ClienteImporter::class)
        ];
    }
}
