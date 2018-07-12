<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantType extends Model
{
    protected $table='restaurant_type';

    public function restaurants(){
    	return $this->hasMany(Restaurant::class);
    }
}
