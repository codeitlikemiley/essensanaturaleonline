<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{	
    protected $guarded = ["id"];
	protected $table = "banks";
    protected $dates = ['created_at', 'updated_at'];
	protected $mopType  = "App\Bank";
    public function orderPayment()
    {
        return $this->morphMany('App\Order', 'mop');
    }
}
