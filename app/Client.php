<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Traits\Uuids;
    public $incrementing = false;

    protected $table = 'client';
    protected $fillable = [
    	'name', 'email',
    ];
}
