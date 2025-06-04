<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = 'tallas';
    protected $fillable = ['seccion', 'talla', 'cantidad'];
    public $timestamps = true;
}
