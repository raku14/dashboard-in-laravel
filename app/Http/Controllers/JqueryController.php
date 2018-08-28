<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JqueryController extends Controller
{
    public function value(Request $request){
    	echo $request->name;
    }
}
