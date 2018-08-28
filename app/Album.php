<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "album";
    
    public function photos(){
    	return $this->hasMany('App\Photo', 'album_id', 'id');
    }
    
    public function users(){
    	return $this->belongsTo('App\Phone_users', 'user_id', 'id');
    }
}
