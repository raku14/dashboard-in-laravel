<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manager;
use Validator;
use Response;
use JWTAuth;
use JWTFactory;
use Hash;


class APIRegisterController extends Controller
{
	public function index(){
		return View('jwtauth.register');
	}

    public function register(Request $request){
    	$this->validate($request, [
    		'firstname'     =>	'required',
            'lastname'      =>  'required',
    		'email'         =>	'required|email|unique:manager',
            'mobile'        =>  'required|regex:/[0-9]/|size:10',
    		'password'      =>	'required'
    	]);
    	
    	$manager 	=	new Manager;
    	$manager->firstname 	=	$request->firstname;
        $manager->lastname      =   $request->lastname;
    	$manager->email 	    =	$request->email;
        $manager->gender        =   $request->gender;
        $manager->dob           =   $request->dob;
        $manager->mobile        =   $request->mobile;
        $manager->role          =   $request->role;
    	$manager->password 	    =	Hash::make( $request->password );
        //$manager->photo         =   'user.png';
    	$manager->save();
    	$manager 	=	Manager::first();
    	$token 		=	JWTAuth::fromUser($manager);

    	//return Response::json(compact('token'));
    	$request->session()->flash('success', 'Registration Successfull. Now you can LogIn');
    	return redirect ('auth/login');
    }
}
