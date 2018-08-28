<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;

class GetUserController extends Controller
{
    public function index(){
    	echo User::all();
    }
}
