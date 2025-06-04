<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table = 'catalogos';

    protected $guarded = [
        'id',
    ];

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'seccion'); // Relación con la tabla 'imagenes'
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class);
    }

    public function caracteristicas()
    {
        return $this->hasMany(CatalogoCaracteristicas::class);
    }

    public function galeria()
    {
        return $this->hasMany(CatalogoGaleria::class);
    }
}
