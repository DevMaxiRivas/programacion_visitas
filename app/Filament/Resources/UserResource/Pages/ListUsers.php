<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Enums\EnumsRoles;
use App\Filament\Imports\UserImporter;
use Filament\Resources\Components\Tab;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = 'Usuarios';

    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'rol:admin', // Middleware to check if the visit can be modified
    ];

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\ImportAction::make()
                ->label('Importar Usuarios')
                ->importer(UserImporter::class),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Todos'),
            'administradores' => Tab::make()->query(fn ($query) => User::obtener_usuarios_por_rol($query, EnumsRoles::ADMIN)),
            'vendedores' => Tab::make()->query(fn ($query) => User::obtener_usuarios_por_rol($query, EnumsRoles::VENDEDOR)),
        ];
    }
}
