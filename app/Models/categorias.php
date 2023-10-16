<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    public function subcategorias()
    {
        return $this->hasMany(subcategorias::class, 'categoria_id');
    }
}
