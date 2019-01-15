<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shshop extends Model
{
    protected $fillable = [
        'shop_id',
        'shop_name'
      ];
      public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
