<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $fillable = [
        'elemento', 
        'texto', 
        'imagen', 
        'url', 
        'contenido', 
        'activo', 
        'orden', 
        'seccion'
    ];
    
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
}
