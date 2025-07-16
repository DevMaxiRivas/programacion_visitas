<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCliente extends CreateRecord
{
    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'rol:admin', // Middleware to check if the visit can be modified
    ];

    protected static string $resource = ClienteResource::class;
}
