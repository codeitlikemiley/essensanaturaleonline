<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
 
    public function cartItems()
    {
        return $this->hasMany('App\CartItem');
    }
}
