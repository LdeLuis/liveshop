<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    protected $table = 'tematicas';

    protected $fillable = [
        'tematica',
        'color',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
