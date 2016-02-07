<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    protected $guarded = ["id"];
	protected $table = "remittances";
    protected $dates = ['created_at', 'updated_at'];
	protected $mopType  = "App\Remittance";
    public function orderPayment()
    {
        return $this->morphMany('App\Order', 'mop');
    }
}
