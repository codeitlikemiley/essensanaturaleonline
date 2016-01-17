<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public static function findByName($name)
    {
        return self::where('name', $name)->firstOrFail();
    }
    
}
