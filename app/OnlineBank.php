<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineBank extends Model
{	
    protected $guarded = ["id"];
	protected $table = "online_banks";
    protected $dates = ['created_at', 'updated_at', 'date_paid'];
	protected $mopType  = "App\OnlineBank";
    public function orderPayment()
    {
        return $this->morphMany('App\Order', 'mop');
    }
}
