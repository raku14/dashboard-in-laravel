<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    	'name', 'role',
    ];

    protected $table = 'employee';

    public function roles(){
    	return $this->belongsToMany('App\Role', '');
    }
}
