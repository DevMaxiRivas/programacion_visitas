<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
        'url_imagenes',
        'observaciones',
        'indicaciones',
        'estado'
    ];

    protected$casts = [
        'url_archivos' => 'array',
        'nombres_archivos_originales' => 'array',
        'url_imagenes' => 'array',
        'nombres_imagenes_originales' => 'array',
    ];

    const ESTADOS = [
        'pendiente' => 0,
        'completada' => 1,
        'cancelada' => 2,
    ];

    const COLORES_ESTADOS = [
        0 => '#0069D9',
        1 => '#218838',
        2 => '#C82333',
    ];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }
}
