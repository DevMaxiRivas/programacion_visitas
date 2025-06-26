<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Collection;
use Guava\Calendar\ValueObjects\CalendarEvent;

use \Guava\Calendar\Widgets\CalendarWidget;

use App\Models\Visita;
use App\Models\User;

class WidgetCalendar extends CalendarWidget
{
    // protected static string $view = 'filament.widgets.widget-calendar';
    // protected string $calendarView = 'resourceTimeGridWeek';

    public function getOptions(): array
{
    return [
        // 'nowIndicator' => true,
        // 'slotDuration' => '00:15:00'
    ];
}
 
public function getEvents(array $fetchInfo = []): Collection | array
    {
        if(User::actual()->rol == 'admin'){
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
}
