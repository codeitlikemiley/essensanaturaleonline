<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
	  protected $table = "item_orders";
 	  protected $guarded = ["id"];
  	protected $softDelete = true;
    protected $total;
    protected $casts = [
        'options' => 'array',
    ];

    public function product()	
    {
        return $this->belongsTo('App\Product');
    }
    public function order()
  	{
    return $this->belongsTo("App\Order");
  	}
    public function getTotalAttribute()
    {
    return $this->qty * $this->price;
    }

    
}
