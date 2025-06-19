<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'razon_social',
        'codigo',
        'vendedor_id',
    ];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function scopeWithVendedor($query)
    {
        return $query->with('vendedor');
    }

    public function visitas()
    {
        return $this->hasMany(Visita::class, 'cliente_id');
    }
}
