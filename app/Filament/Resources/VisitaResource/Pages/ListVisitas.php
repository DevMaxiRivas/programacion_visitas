<?php

namespace App\Filament\Resources\VisitaResource\Pages;

use App\Enums\EnumVisitaEstado;
use App\Filament\Resources\VisitaResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

use App\Models\Visita;

class ListVisitas extends ListRecords
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'pendiente' => Tab::make()->query(fn ($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::PENDIENTE)),
            'completada' => Tab::make()->query(fn ($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::COMPLETADA)),
            'cancelada' => Tab::make()->query(fn ($query) => Visita::obtener_visitas_por_estado($query, EnumVisitaEstado::CANCELADA)),
        ];
    }
}
