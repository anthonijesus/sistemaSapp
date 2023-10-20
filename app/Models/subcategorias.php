<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategorias extends Model
{
    use HasFactory;
    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'categoria_id');
    }
    public function tabla_sol()
    {
        return $this->hasMany(tabla_solicitudes::class, 'subcategoria_id');
    }
}
