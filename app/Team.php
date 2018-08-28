<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    public function players(){
    	return $this->hasMany('App\Player');
    }

    public function goals(){
    	return $this->hasManyThrough('App\Goal', 'App\Player');
    }
}
