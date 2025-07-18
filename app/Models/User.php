<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

use App\Enums\EnumsRoles;

// use Spatie\Permission\Traits\HasRoles;

// Filament
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    // use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cuil',
        'codigo_empleado',
        'email_verified_at',
        'rol'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'rol' => EnumsRoles::class, // Cast the 'rol' attribute to the EnumsRoles enum
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function visitas()
    {
        return $this->hasMany(Visita::class, 'vendedor_id');
    }

    public static function actual()
    {
        return auth()->user();
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'vendedor_id');
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return !empty(self::actual()->rol);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return config('app.url') . '/imagenes/perfiles/profile.png';
    }

    public static function obtener_usuarios_por_rol($query, $rol)
    {
        return $query->where('rol', $rol);
    }

    public function tiene_algun_rol($roles): bool
    {   
        return is_array($roles)
            ? in_array($this->rol->value, $roles)
            : $this->rol === $roles;
    }
}
