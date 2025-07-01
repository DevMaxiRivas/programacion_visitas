<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum EnumVisitaEstado: int implements HasLabel, HasColor
{
    case PENDIENTE = 0;
    case COMPLETADA = 1;
    case CANCELADA = 2;

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDIENTE => 'Pendiente',
            self::COMPLETADA => 'Completada',
            self::CANCELADA => 'Cancelada',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PENDIENTE => 'warning',
            self::COMPLETADA => 'success',
            self::CANCELADA => 'danger',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDIENTE => '#0069D9',
            self::COMPLETADA => '#218838',
            self::CANCELADA => '#C82333',
            default => '#C82333',
        };
    }
}
{
    
}
