<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'categoria',
        'portada',
        'color',
        'activo',
    ];

    public function catalogos()
    {
        return $this->hasMany(Catalogo::class);
    }
}
