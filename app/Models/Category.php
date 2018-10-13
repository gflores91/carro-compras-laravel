<?php

namespace CCLV\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function marcas()
    {
        return $this->belongsToMany('CCLV\Models\Brand');
    }
}
