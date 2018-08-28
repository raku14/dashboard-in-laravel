<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'post_id', 'comment',
    ];

    protected $table = 'comment';

    public function posts(){
    	return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
