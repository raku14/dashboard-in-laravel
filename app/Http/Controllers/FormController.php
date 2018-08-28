<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
     public function show(){
      return view('login');
   }
   public function validateform(Request $request){
     // print_r($request->all());
      $this->validate($request,[
         'username'	=>	'required|max:8',
         'password'	=>	'required',
         'email'	=>	'required|email',
         'contact'	=>	'required|regex:/[0-9]/|size:10'
      ]);
      echo $request->username;
      echo '<br>';
      echo $request->password;
      echo '<br>';
      echo $request->email;
      echo '<br>';
      echo $request->contact;

   }


    public function createuser()
    {
            $data=DB::table('users')->get();
            return response($data, 200)
                  ->header('Content-Type', 'Application/json');
    }
 
}
