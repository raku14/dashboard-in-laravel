<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    
    protected $fillable = [
    		'phone_user_id', 'brand',
    ];

    protected $table = 'phone';

    public function phone_user(){
    	return $this->belongsTo('App\Phone_users', 'phone_user_id', 'id');
    }
}
