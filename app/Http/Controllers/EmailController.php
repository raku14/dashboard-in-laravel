<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendJob;

class EmailController extends Controller
{
    public function sendEmail(){
    	dispatch(new SendJob());
        echo 'email sent';
    }
}
