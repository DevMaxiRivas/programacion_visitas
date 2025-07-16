<?php

namespace App\Filament\Pages;

use App\Enums\EnumsRoles;
use App\Models\User;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class CalendarioPorUsuarioPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.calendario-por-usuario-page';
    
    protected static ?string $title = 'Calendario';

    protected static string | array $routeMiddleware = [
        'auth', // Middleware for authentication on this page
        'rol:admin', // Middleware to check if the visit can be modified
    ];

    public User $vendedor;
    public $vendedores;
    public $vendedor_seleccionado;

    public $user_actual;

    public function mount(): void
    {
        $this->user_actual = User::actual();
        $this->vendedores = User::where('rol', EnumsRoles::VENDEDOR->value)->get();
        $this->vendedor = 
            request()->query('vendedor') ?
            User::findOrFail(request()->query('vendedor')) 
            : User::actual();
    }
    public function cambiarUser()
    {
        if(empty($this->vendedor_seleccionado)) 
            return redirect(route('filament.panel.pages.calendario-por-usuario-page'));

        return redirect(route('filament.panel.pages.calendario-por-usuario-page', ['vendedor' => $this->vendedor_seleccionado]));
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make(self::getNavigationLabel())
                ->hidden(fn() => !User::actual()->rol->is_admin())  // Ocultar si el usuario no es admin
                ->icon(self::$navigationIcon)
                ->url(self::getUrl()),
        ];
    }


}
