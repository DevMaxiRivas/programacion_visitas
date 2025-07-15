<?php

namespace App\Filament\Pages;

use App\Enums\EnumsRoles;
use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class CalendarioPorUsuarioPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.calendario-por-usuario-page';
    
    protected static ?string $title = 'Calendario';

    public User $vendedor;

    public $user;

    public $users;

    public $user_actual;

    public function mount(): void
    {
        $this->user_actual = User::actual();
        $this->users = User::where('rol', EnumsRoles::VENDEDOR->value)->get();
        $this->vendedor = 
            request()->query('vendedor') ?
            User::findOrFail(request()->query('vendedor')) 
            : User::actual();
    }
    public function cambiarUser()
    {
        return redirect(route('filament.panel.pages.calendario-por-usuario-page', ['vendedor' => $this->user ?? User::actual()->id]));
    }
}
