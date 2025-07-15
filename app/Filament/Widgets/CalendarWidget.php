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
use Illuminate\Support\Facades\Log;

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
                ActionsFilament\Action::make('Calendario por Vendedores')
                    ->url(route('filament.panel.pages.calendario-por-usuario-page', ['vendedor' => User::actual()->id]))
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
            return [
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Select::make('cliente_id')
                            ->relationship('cliente', 'razon_social')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(
                                fn(Get $get, callable $set) =>
                                $get('cliente_id') ?
                                    $set('vendedor_id', Cliente::find($get('cliente_id'))->vendedor_id) : null
                            )
                            ->required(),
                        Forms\Components\Hidden::make('vendedor_id'),
                        Forms\Components\DatePicker::make('fecha_visita')
                            ->minDate(now()->format('Y-m-d'))
                            ->required(),
                    ]),
                Forms\Components\RichEditor::make('indicaciones')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ]),
            ];
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
        Log::info("Fetch Info");
        Log::info(!empty($this->user) ? $this->user : 'No hay user');

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
