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
    protected static ?string $navigationLabel = 'Calendario de Visitas';
    protected static string $view = 'filament.pages.mi-pagina-custom';

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
        Log::info($this->user);
        Log::info($this->users);
        Log::info($this->vendedor);
    }
    public function cambiarUser()
    {
        // Log::info($this->vendedor);
        Log::info($this->user);
        // Log::info(route('panel.calendario.por.vendedor', ['vendedor' => $this->user ?? User::actual()->id]));
        // return redirect(route('panel.calendario.por.vendedor', ['vendedor' => $this->user ?? User::actual()->id]));
        return redirect(
            config('app.url') . '/panel/mi-pagina-custom?vendedor=' . $this->user ?? User::actual()->id
        );
    }
}
