<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Enums\EnumVisitaEstado;
use Illuminate\Support\Facades\Log;

class Visita extends Model
{
    use HasFactory;

    protected $table = 'visitas';

    protected $fillable = [
        'vendedor_id',
        'cliente_id',
        'fecha_visita',
        'hora_visita',
        'url_archivos',
        'nombres_archivos_originales',
        'url_imagenes',
        'nombres_imagenes_originales',
        'observaciones',
        'indicaciones',
        'estado'
    ];

    protected $casts = [
        'url_archivos' => 'array',
        'nombres_archivos_originales' => 'array',
        'url_imagenes' => 'array',
        'nombres_imagenes_originales' => 'array',
        'estado' => EnumVisitaEstado::class,
    ];

    protected $dates = [
        'fecha_visita',
    ];

    protected $timezone = 'America/Argentina/Buenos_Aires';

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function lista_imagenes(): array
    {
        return $this->nombres_imagenes_originales ?? [];
    }
    public function lista_archivos(): array
    {
        return $this->nombres_archivos_originales ?? [];
    }

    public function es_visible(): bool
    {
        // Verifica si la visita es visible para el usuario actual
        if (User::actual()->id === $this->vendedor_id) {
            return true;
        }

        // Si la visita no es del vendedor actual, no es visible
        return false;
    }

    public function es_editable(): bool
    {
        // Verifica si la visita está pendiente o en proceso
        if (
            User::actual()->id === $this->vendedor_id &&
            $this->estado->value === EnumVisitaEstado::PENDIENTE &&
            now()->format('Y-m-d') >= $this->fecha_visita
        ) {
            return true;
        }

        // Si la visita ya está completada o cancelada, no es editable
        return false;
    }

    public static function obtener_visitas()
    {
        $query = Visita::query();

        // Filtra las visitas por estado aprobado
        if (User::actual()->rol->is_admin()) {
            return $query;
        }

        return $query->where('vendedor_id', User::actual()->id);
    }

    public static function contar_visitas_pendientes()
    {
        $query = Visita::where('estado', EnumVisitaEstado::PENDIENTE);

        if (User::actual()->rol->is_admin()) {
            return $query->count();
        }

        return $query->where('vendedor_id', User::actual()->id)->count();
    }

    public static function obtener_visitas_por_estado($query, $estado)
    {
        return $query->where('estado', $estado);
    }
}
