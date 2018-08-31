<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
	use Traits\Uuids;
	
    protected $table = 'manager';

    public $incrementing = false;

    protected $fillable = [
    	'name', 'email', 'password',
    ];

     protected $hidden = [
        'password', 'remember_token',
    ];
}
 