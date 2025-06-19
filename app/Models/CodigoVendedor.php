<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodigoVendedor extends Model
{
    protected $table = 'codigos_vendedores';
    protected $fillable = [
        'vendedor_id',
        'codigo',
    ];
}
