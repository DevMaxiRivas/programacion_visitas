<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\UserResource;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

use App\Filament\Resources\VisitaResource;
use App\Models\Cliente;
use App\Models\Visita;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions;

use Filament\Forms;
use Filament\Forms\Get;
// use Illuminate\Support\Facades\Log;

use Filament\Actions as ActionsFilament;

class CalendarWidget extends FullCalendarWidget

{
    public Model | string | null $model = Visita::class;

    public $user;

    protected function obtenerAccionesPorRole(): array
    {
        if (User::actual()->rol->is_admin()) {
            return [
                Actions\CreateAction::make(),
                ActionsFilament\Action::make('Crear Multiples')
                    ->url(VisitaResource::getUrl('crear_multiples')),
                ActionsFilament\Action::make('Calendario por Vendedores')
                    ->url(route('filament.panel.pages.calendario-por-usuario', ['vendedor' => User::actual()->id]))
            ];
        } else {
            return [];
        }
    }

    protected function headerActions(): array
    {
        return $this->obtenerAccionesPorRole();
    }

    protected function modalActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    // protected function viewAction(): Action
    // {
    //     return Actions\ViewAction::make();
    // }

    protected function obtenerFormularioPorRol(): array
    {
        if (User::actual()->rol->is_admin()) {
            return Visita::obtener_componentes_formulario_rapido();
        } else {
            return [];
        }
    }

    public function getFormSchema(): array
    {
        return $this->obtenerFormularioPorRol();
    }


    protected function obtenerQueryVisitasPorRole(array $fetchInfo, User $user): \Illuminate\Database\Eloquent\Builder
    {
        $query = Visita::query();

        if (!$user->rol->is_admin()) {
            $query = $query->where('vendedor_id', $user->id);
        }

        $query = $query->where('fecha_visita', '>=', $fetchInfo['start'])
            ->where('fecha_visita', '<=', $fetchInfo['end'])
            ->orWhere('fecha_visita_reprogramada', '>=', $fetchInfo['start'])
            ->where('fecha_visita_reprogramada', '<=', $fetchInfo['end'])
            ;

        return $query;
    }

    public function fetchEvents(array $fetchInfo): array
    {
        // La variable user se utiliza para obtener las visitas del usuario actual sino se especifica uno
        // Si es admin se obtiene todas las visitas

        return $this->obtenerQueryVisitasPorRole($fetchInfo, $this->user ?? User::actual())
            ->get()->map(
                fn(Visita $visita) => [
                    'title' => $visita->cliente->razon_social,
                    'start' => $visita->fecha_visita_reprogramada ?? $visita->fecha_visita,
                    'end' => $visita->fecha_visita_reprogramada ?? $visita->fecha_visita,
                    'url' => VisitaResource::getUrl(name: 'view', parameters: ['record' => $visita]),
                    'color' => $visita->estado->color(),
                ]
            )
            ->all();
    }
}
