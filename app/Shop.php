<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

	protected $table = 'shop';
	

    public function products(){
    	return $this->belongsToMany('App\Product');
    }
}
