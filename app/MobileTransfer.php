<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileTransfer extends Model
{
    protected $guarded = ["id"];
	protected $table = "mobile_transfers";
    protected $dates = ['created_at', 'updated_at', 'date_paid'];
	protected $mopType  = "App\MobileTransfer";
    public function orderPayment()
    {
        return $this->morphMany('App\Order', 'mop');
    }
}
