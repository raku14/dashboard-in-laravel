<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';

    public function albums(){
    	return $this->belongsTo('App\Album', 'album_id', 'id');
    }
  	
}
