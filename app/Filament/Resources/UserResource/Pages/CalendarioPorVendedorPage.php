<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\EnumsRoles;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Log;

class CalendarioPorVendedorPage extends Page
{
    protected static string $resource = UserResource::class;

    protected User $record;

    protected $vendedor;

    // protected function mount(): void
    // {
    //     $this->record = $this->getRecord();
    //     $this->lista_vendedores = User::where('rol', EnumsRoles::VENDEDOR->value)->get();
    // }

    protected static string $view = 'filament.resources.user-resource.pages.calendario-por-vendedor-page';

    // public static function render(User $record): \Illuminate\View\View
    // {
    //     return static::make()->record($record);
    // }

    public function cambiarVendedor()
    {
        Log::info($this->vendedor);
    }
}
