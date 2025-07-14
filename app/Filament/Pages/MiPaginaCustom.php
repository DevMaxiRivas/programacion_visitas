<?php

namespace App\Filament\Pages;

use App\Enums\EnumsRoles;
use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class MiPaginaCustom extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Calendario de Eventos';
    protected static ?string $navigationGroup = 'Eventos';
    protected static string $view = 'filament.pages.mi-pagina-custom';
    protected static ?string $slug = 'calendario-eventos';

    protected static ?string $title = 'Calendario de Eventos';

    public $user;

    // public function mount(): void
    // {
    //     $this->user = auth()->user();
    // }

    public function render(): \Illuminate\View\View
    {
        return view($this->view,[
            'users' => User::where('rol', EnumsRoles::VENDEDOR->value)->get()
        ]);
    }

    public function cambiarUser()
    {
        Log::info($this->user);
    }
}
