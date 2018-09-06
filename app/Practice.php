<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Practice extends Model
{
	use Notifiable;
    protected $table = 'practices';

   
}
