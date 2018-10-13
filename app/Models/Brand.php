<?php

namespace CCLV\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function productos()
    {
        return $this->belongsToMany('CCLV\Models\Product');
    }

    public function categoria()
    {
        return $this->belongsToMany('CCLV\Models\Category');
    }
}
