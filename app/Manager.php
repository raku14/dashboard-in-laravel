<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Manager extends Model
{
    use Notifiable;
    
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
 