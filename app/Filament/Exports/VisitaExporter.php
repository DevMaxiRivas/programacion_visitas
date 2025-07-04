<?php

namespace App\Filament\Exports;

use App\Enums\EnumVisitaEstado;
use App\Models\Visita;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class VisitaExporter extends Exporter
{
    protected static ?string $model = Visita::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('cliente.codigo')
                ->label('Código del Cliente'),
            ExportColumn::make('cliente.razon_social')
                ->label('Razon Social Cliente'),
            ExportColumn::make('vendedor.codigo_empleado')
                ->label('Código del Vendedor'),
            ExportColumn::make('vendedor.name')
                ->label('Vendedor'),
            ExportColumn::make('fecha_visita')
                ->label('Fecha de Visita'),
            // ExportColumn::make('estado')
            //     ->label('Estado')
            //     ->formatStateUsing(fn (int $state): string => match ($state) {
            //         EnumVisitaEstado::PENDIENTE => 'Pendiente',
            //         EnumVisitaEstado::COMPLETADA => 'Completada',
            //         EnumVisitaEstado::CANCELADA => 'Cancelada',
            //         default => 'Desconocido',
            //     }),
            ExportColumn::make('created_at')
                ->label('Fecha de Creación')
                ->formatStateUsing(fn (string $state): string => date('d-m-Y', strtotime($state))),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'La exportación de visitas ha finalizado y ' . number_format($export->successful_rows) . ' ' . str('filas')->plural($export->successful_rows) . ' se exportaron.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' fallaron en la exportación.';
        }

        return $body;
    }
}
