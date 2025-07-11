<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum EnumVisitaEstado: int implements HasLabel, HasColor
{
    case PENDIENTE = 0;
    case COMPLETADA = 1;
    case CANCELADA = 2;
    case REPROGRAMADA = 3;

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDIENTE => 'Pendiente',
            self::COMPLETADA => 'Completada',
            self::CANCELADA => 'Cancelada',
            self::REPROGRAMADA => 'Reprogramada',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PENDIENTE => 'warning',
            self::COMPLETADA => 'success',
            self::CANCELADA => 'danger',
            self::REPROGRAMADA => 'warning',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDIENTE => '#0069D9',
            self::COMPLETADA => '#218838',
            self::CANCELADA => '#C82333',
            self::REPROGRAMADA => '#0069D9',
            default => '#C82333',
        };
    }
}
{
    
}
