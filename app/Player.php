<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
   protected $table = 'player';

   public function goals(){
   		return $this->hasMany('App\Goal');
   }

   public function team(){
   		return $this->belongsTo('App\Team');
   }
}
