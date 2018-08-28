<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'topic', 'auther',
    ];

    protected $table = 'post';

    public function comments(){
    	return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
