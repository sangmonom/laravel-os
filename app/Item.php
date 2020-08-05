<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $fillable=['codeno','name','photo','price','discount','description','brand_id','subcategory_id'];

     public function orders()
		{
			return $this->belongsToMany('App\Order')
				->withPivot('qty')
				->withTimestamps();
		}
}


