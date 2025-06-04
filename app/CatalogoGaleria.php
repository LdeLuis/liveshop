<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoGaleria extends Model
{
    protected $table = 'catalogo_galerias';

    protected $fillable = [
        'imagen',
        'catalogo_id',
    ];

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }
}
