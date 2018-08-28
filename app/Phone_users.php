<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone_users extends Model
{
    protected $fillable = [
    		'name', 'phone',
    ];

    protected $table = 'phone_user';

    public function albums(){
    	return $this->hasMany('App\Album', 'user_id', 'id');
    }
  
}
