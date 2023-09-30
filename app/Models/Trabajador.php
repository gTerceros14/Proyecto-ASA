<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    public $table = 'trabajadores';
    use HasFactory;

    public function cargo()
    {
        return $this->belongsTo(Cargos::class,'id_cargo');
    }
    
}
