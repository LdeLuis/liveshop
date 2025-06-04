<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoCaracteristicas extends Model
{
    protected $table = 'catalogo_caracteristicas';

    protected $fillable = [
        'caracteristica',
        'catalogo_id',
    ];

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }
}
