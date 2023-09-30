<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_producto',
        'cantidad',
        'id_categoria',
        'id_talla',
        'id_categoria_Alimentos'
    ];

    public function categorias()
    {
        return $this->belongsTo(Categorias::class);
    }

    public function tallas()
    {
        return $this->belongsTo(Tallas::class);
    }
    public function categoria_alimentos()
    {
        return $this->belongsTo(Categoria_alimentos::class);
    }
    public function salida_movimientos()
    {
        return $this->hasMany(Salida_movimientos::class,'id_productos');
    }
    public function registro_movimiento()
    {
        return $this->hasMany(Registro_movimientos::class, 'id_productos');
    }
    
}
