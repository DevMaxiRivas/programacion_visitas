<?php

namespace App\Filament\Widgets;

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

class CalendarWidget extends FullCalendarWidget

{

    public Model | string | null $model = Visita::class;

    protected function obtenerAccionesPorRole(): array
    {
        if (User::actual()->rol->is_admin()) {
            return [
                Actions\CreateAction::make()
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


    protected function obtenerQueryVisitasPorRole(array $fetchInfo): \Illuminate\Database\Eloquent\Builder
    {
        $query = Visita::query()
            ->where('fecha_visita', '>=', $fetchInfo['start'])
            ->where('fecha_visita', '<=', $fetchInfo['end'])
            ->orWhere('fecha_visita_reprogramada', '>=', $fetchInfo['start'])
            ->where('fecha_visita_reprogramada', '<=', $fetchInfo['end'])
            ;
        // $query = Visita::query()
        //     ->whereBetween('fecha_visita', $fetchInfo['start'], $fetchInfo['end'])
        //     ->orWhereBetween('fecha_visita_reprogramada', $fetchInfo['start'], $fetchInfo['end'])
        //     ;

        Log::info('Query: ' . $query->toSql());
        Log::info($query->getBindings());

        if (!User::actual()->rol->is_admin()) {
            return $query->where('vendedor_id', User::actual()->id);
        }

        return $query;
    }

    public function fetchEvents(array $fetchInfo): array
    {
        return $this->obtenerQueryVisitasPorRole($fetchInfo)
            ->get()->map(
                // fn(Visita $visita) => [
                //     'title' => $visita->cliente->razon_social,
                //     'start' => $visita->fecha_visita_reprogramada ?? $visita->fecha_visita,
                //     'end' => $visita->fecha_visita_reprogramada ?? $visita->fecha_visita,
                //     'url' => VisitaResource::getUrl(name: 'view', parameters: ['record' => $visita]),
                //     'color' => $visita->estado->color(),
                // ]

                function (Visita $visita) {
                    if (!empty($visita->fecha_visita_reprogramada)) {
                        Log::info('Visita: ' . $visita->id);
                        Log::info($visita->fecha_visita_reprogramada);
                    } else {
                        Log::info($visita);
                    }

                    return [
                        'title' => $visita->cliente->razon_social,
                        'start' => $visita->fecha_visita_reprogramada ?? $visita->fecha_visita,
                        'end' => $visita->fecha_visita_reprogramada ?? $visita->fecha_visita,
                        'url' => VisitaResource::getUrl(name: 'view', parameters: ['record' => $visita]),
                        'color' => $visita->estado->color(),
                    ];
                }
            )
            ->all();
    }
}
