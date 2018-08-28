<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;



class LogoutController extends Controller
{
    public function logout(){
    	session::forget('email');
    	return Redirect::to('auth/login');

    }
}
