<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //

    protected $table = 'imagenes';
    protected $fillable = ['seccion', 'imagen'];
    public $timestamps = true;


    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class, 'seccion');
    }
}
