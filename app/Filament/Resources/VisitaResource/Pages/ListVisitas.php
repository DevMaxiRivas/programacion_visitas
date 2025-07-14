<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Enums\EnumVisitaEstado;
use App\Filament\Exports\VisitaExporter;
use App\Filament\Resources\VisitaResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

use App\Models\Visita;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class ListVisitas extends ListRecords
{
    protected static string $resource = VisitaResource::class;

    
    public function obtenerAccionesCabeceraPorRol(): array
    {
        if (User::actual()->rol->is_admin()) {
            // $fechaInicioMes = now()->modify('first day of this month');
            // $fechaInicioMesSiguiente = now()->modify('first day of next month');

            // Log::info('Fecha Inicio Mes: ' . $fechaInicioMes->format('Y-m-d'));
            // Log::info('Fecha Inicio Mes Siguiente: ' . $fechaInicioMesSiguiente->format('Y-m-d'));
            return [
                Actions\CreateAction::make(),
                Actions\ExportAction::make()
                    ->label('Exportar Visitas del Mes')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->exporter(VisitaExporter::class)
                    // ->modifyQueryUsing(
                    //     fn(Builder $query)
                    //     => $query->whereBetween('fecha_visita', $fechaInicioMes->format('Y-m-d'), $fechaInicioMesSiguiente->format('Y-m-d'))
                    // )
                //     ,
                // Actions\Action::make('calendario')
                // ->label('Calendario')
                // ->url(VisitaResource::getUrl('calendario'))
                // ,
            ];
        } else {
            return [];
        }
    }

    protected function getHeaderActions(): array
    {
        return $this->obtenerAccionesCabeceraPorRol();
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Todos'),
            'pendiente' => Tab::make()->query(fn($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::PENDIENTE)),
            'completada' => Tab::make()->query(fn($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::COMPLETADA)),
            'cancelada' => Tab::make()->query(fn($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::CANCELADA)),
            'reprogramada' => Tab::make()->query(fn($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::REPROGRAMADA)),
        ];
    }
}
