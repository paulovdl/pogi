<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'name', 'price', 'cartQuantity', 'size', 'code',
    ];

    public function product(){
        return $this->belongsto('App\Product','code');
    }
}
