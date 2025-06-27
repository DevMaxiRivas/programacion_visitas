<?php

namespace App\Filament\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

use App\Filament\Resources\VisitaResource;
use App\Models\Visita;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions;

use Filament\Forms;

class CalendarWidget extends FullCalendarWidget
{

    public Model | string | null $model = Visita::class;

    protected function obtenerAccionesPorRole(): array
    {
        if (User::actual()->rol == 'admin') {
            return [
                Actions\ViewAction::make()
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
        if (User::actual()->rol == 'admin') {
            return [
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Select::make('cliente_id')
                            ->relationship('cliente', 'razon_social')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\DatePicker::make('fecha_visita'),
                        Forms\Components\RichEditor::make('indicaciones')
                            ->columnSpanFull(),
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

    public function fetchEvents(array $fetchInfo): array
    {
        return Visita::query()
            ->where('fecha_visita', '>=', $fetchInfo['start'])
            ->where('fecha_visita', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn(Visita $visita) => [
                    'title' => $visita->cliente->razon_social,
                    'start' => $visita->fecha_visita,
                    'end' => $visita->fecha_visita,
                    'url' => VisitaResource::getUrl(name: 'edit', parameters: ['record' => $visita]),
                    'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }
}
