<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'seccion', 
        'portada', 
        'slug'
    ];
    
    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
