<?php

namespace CCLV\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
            'titulo','descripcion','condicion','precio','oferta'
        ];
    
    public function marca()
    {
        return $this->belongsToMany('CCLV\Models\Brand');
    }

    public function imagenes()
    {
        return $this->hasMany('CCLV\Models\Image');
    }
}
