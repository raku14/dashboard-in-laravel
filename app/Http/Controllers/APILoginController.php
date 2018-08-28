<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use JWTFactory;
use App\Manager;
use Illuminate\Support\Facades\Auth;
use DB;
use Config;
use Redirect;
use Session;

class APILoginController extends Controller
{


    public function index(){
    	return View('jwtauth.login');
    }

    public function login(Request $request){

		Config::set('jwt.user', 'App\Manager'); 
		Config::set('auth.providers.users.table', 'manager');
    
    	$this->validate($request, [
    		'email'		=>	'required|email',
    		'password'	=>	'required'
    	]);

    	
    	$credentials = $request->only('email', 'password');

    	try{
    		if(! $token = JWTAuth::attempt($credentials)){
    			//return response()->json(['error' => 'invalid_credentials'], 401);
                 session()->flash('invalid', 'Invalid credentials');
                 return redirect::to('auth/login');
    		}
    	}catch( JWTException $e ){
    		return response()->json(['error' => 'could_not_create_token'], 500);
    	}
    	
    	//return  response()->json(compact('token'));
    	session()->put('email', $request->email);  // user email session
        
    	//return View('jwtauth.home', compact('data'));
    	return redirect::to('auth');
    }

}
