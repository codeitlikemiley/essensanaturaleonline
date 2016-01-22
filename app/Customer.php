<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function cart()
    {
        return $this->has('App\Cart');
    }
}
