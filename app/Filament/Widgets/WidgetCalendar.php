<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Collection;
use Guava\Calendar\ValueObjects\CalendarEvent;

use \Guava\Calendar\Widgets\CalendarWidget;

use App\Models\Visita;
use App\Models\User;

use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;

use Illuminate\Support\Facades\Log;

use Filament\Forms;

class WidgetCalendar extends CalendarWidget
{
    protected ?string $locale = 'es';

    // protected static string $view = 'filament.widgets.widget-calendar';
    // protected string $calendarView = 'resourceTimeGridWeek';

    // Habilitamos el click en los eventos
    protected bool $eventClickEnabled = true;
    protected ?string $defaultEventClickAction = 'edit';

    // Habilitamos el click en las fechas
    protected bool $dateClickEnabled = true;

    public function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                CreateAction::make('createVisita')
                    ->model(Visita::class),
            ]),
        ];
    }

    public function getEventClickContextMenuActions(): array
    {
        return [
            $this->editAction(),
            $this->deleteAction(),
        ];
    }

    public function getEventContent(): null | string | array
    {
        return [
            Visita::class => view('components.calendar.events.visita'),
        ];
    }

    public function onEventClick(array $info = [], ?string $action = null): void
    {
        // do something on click
        // $info contains the event data:
        // $info['event'] - the event object
        // $info['view'] - the view object

        Log::info($info);
        Log::info($action);
    }


    public function onDateClick(array $info = []): void
    {

        Log::info($info);
        // Validate the data
        // $info contains the event data:
        // $info['date'] - the date clicked on
        // $info['dateStr'] - the date clicked on as a UTC string
        // $info['allDay'] - whether the date is an all-day slot
        // $info['view'] - the view object
        // $info['resource'] - the resource object
    }

    public function getOptions(): array
    {
        return [
            // 'nowIndicator' => true,
            // 'slotDuration' => '00:15:00'
        ];
    }

    public function getEvents(array $fetchInfo = []): Collection | array
    {
        if (User::actual()->rol == 'admin') {
            $visitas = Visita::all();
        } else {
            $visitas = Visita::where('vendedor_id', User::actual()->id)->get();
        }

        return $visitas->map(function ($visita) {
            return CalendarEvent::make()
                ->title($visita->cliente->razon_social)
                ->start($visita->fecha_visita)
                ->end($visita->fecha_visita)
                ->allDay()
                ->backgroundColor(Visita::COLORES_ESTADOS[$visita->estado])
            ;
        });
    }

    public function getSchema(?string $model = null): ?array
    {
        return match ($model) {
            Visita::class => [
                Forms\Components\Select::make('cliente_id')
                    ->label('Cliente')
                    ->relationship('cliente', 'razon_social')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('fecha_visita')
                    ->required()
                    ->label('Fecha de visita    '),
                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'completada' => 'Completada',
                        'cancelada' => 'Cancelada',
                    ])
                    ->default('pendiente')
                    ->required(),
                Forms\Components\RichEditor::make('indicaciones')
                    ->label('Indicaciones')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('url_archivos')
                    ->label('Archivos Adjuntos')
                    ->multiple()
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(10240) // 10 MB
                    ->enableReordering()
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->directory('visitas')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('url_imagenes')
                    ->label('Imagenes Adjuntos')
                    ->multiple()
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(10240) // 10 MB
                    ->enableReordering()
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->directory('visitas')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('observaciones')
                    ->label('Observaciones')
                    ->columnSpanFull(),
            ],
        };
    }
}
