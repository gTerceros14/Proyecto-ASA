<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_alimentos extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->hasMany(Productos::class,'id_productos');
    }

}
