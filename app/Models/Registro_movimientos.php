<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_movimientos extends Model
{
    use HasFactory;
    
    public function producto()
    {
        return $this->hasMany(Productos::class);
    }

}
