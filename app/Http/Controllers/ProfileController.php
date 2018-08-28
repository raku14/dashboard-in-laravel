<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ProfileController extends Controller
{
    public function profile(){
    	$email =  session('email');
    	$user = DB::table('manager')->where('email', $email)->get();
       	$role = DB::table('role')->get();
       	$gender = DB::table('gender')->get();
       return view('jwtauth.profile', compact('user', 'role', 'gender'));
    }
}
