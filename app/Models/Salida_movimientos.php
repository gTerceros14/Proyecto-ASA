<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida_movimientos extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo(Productos::class,'id_productos');
    }
    public function beneficiario()
    {
        return $this->belongsToMany(Beneficiario::class,'salidas','id_salida_movimientos','id_beneficiario');
    }
}
