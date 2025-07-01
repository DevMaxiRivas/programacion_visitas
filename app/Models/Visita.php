<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Enums\EnumVisitaEstado;

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

    protected$casts = [
        'url_archivos' => 'array',
        'nombres_archivos_originales' => 'array',
        'url_imagenes' => 'array',
        'nombres_imagenes_originales' => 'array',
        'estado' => EnumVisitaEstado::class,
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
