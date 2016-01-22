<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	  protected $table = 'products';
	  protected $guarded = ['id'];
  	protected $softDelete = true;
    protected $casts = [
        'options' => 'array',
    ];

  	public function orders()
  	{
    return $this->belongsToMany('App\Order', 'item_order');
  	}

  	public function itemOrders()
  	{
    return $this->hasMany('App\ItemOrder');
  	}

  	public function category()
  	{
    return $this->belongsTo('App\Category');
  	}
	
   	public static function findByName($name)
    {
        return self::where('name', $name)->firstOrFail();
    }

    public function reviews()
    {
    return $this->hasMany('App\Review');
    }

    public function recalculateRating()
    {
    $reviews = $this->reviews()->notSpam()->approved();
    $avgRating = $reviews->avg('rating');
    $this->rating_cache = round($avgRating,1);
    $this->rating_count = $reviews->count();
    $this->save();
    }
    
}
