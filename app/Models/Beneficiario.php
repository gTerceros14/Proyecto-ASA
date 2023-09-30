<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    public function salida()
    {
        return $this->belongsToMany(Salida_movimientos::class,'salidas','id_beneficiario','id_salida_movimientos');
    }
}
