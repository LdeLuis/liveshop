<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'titulo',
        'descripcion',
        'portada',
        'link_whatsapp',
        'link_facebook',
        'link_instagram',
        'activo',
        'oculto',
        'tematica_id',
    ];

    public function tematica()
    {
        return $this->belongsTo(Tematica::class);
    }
}
