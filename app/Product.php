<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sh_id',
        'product_json'
      ];
      public function shshop()
    {
    	return $this->belongsTo('App\Shshop');
    }
}
