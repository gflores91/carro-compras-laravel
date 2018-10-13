<?php

namespace CCLV\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id','rutaimagen'
    ];

    public function producto()
    {
        return $this->belongsTo('CCLV\Models\Product');
    }
}
