<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum EnumsRoles: string implements HasLabel, HasColor
{
    case ADMIN = 'admin';
    case VENDEDOR = 'vendedor';

    public function getLabel(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrador',
            self::VENDEDOR => 'Vendedor',
        };
    }
    
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ADMIN => 'danger',
            self::VENDEDOR => 'success',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ADMIN => '#007BFF',
            self::VENDEDOR => '#6C757D',
            default => '#6C757D',
        };
    }

    public function is_admin(): bool
    {
        return $this === self::ADMIN;
    }

}
    
{
    //
}
