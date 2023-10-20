<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabla_solicitudes extends Model
{
    use HasFactory;

    public function subcategoria()
    {
        return $this->belongsTo(subcategorias::class, 'subcategoria_id');
    }
    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'categoria_id');
    }
}
