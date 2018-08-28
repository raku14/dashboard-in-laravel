<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use DB;
use Validator;
use Input;
use Redirect;
use Session;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $email =  session('email');
            $user = DB::table('manager')->where('email', $email)->get(['id', 'firstname', 'lastname','email', 'photo'])->toarray();
       
        Session()->put('user_id', $user[0]->id );  // user id
        $first = ucfirst($user[0]->firstname);
        $last = ucfirst($user[0]->lastname);
        // user name session
        session()->put('first', $first);
        session()->put('last', $last); 
          
        session()->put('photo', $user[0]->photo);  //user photo session
        return view('jwtauth.home');               // home.blade.php 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id =  session('user_id');
        $user = DB::table('manager')->where('id', $id)->get();
        $role = DB::table('role')->get();
        $gender = DB::table('gender')->get();
        return view('jwtauth.create', compact('user', 'role', 'gender')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request, [
            'firstname'     =>  'required',
            'lastname'      =>  'required',
            'gender'    =>  'required',
            'dob'       =>  'required',
            'role'      =>  'required',
            'mobile'    =>  'required|regex:/[0-9]/|size:10',
            'photo'     =>  'mimes:jpeg,jpg,png'
        ]);
        
        if(!$request->photo == '')
        {
            
            // image upload
            $file = $request->file('photo');
            
            $time = microtime('.') * 10000; 
            $imagename = $time.'.'.strtolower( $file->getClientOriginalExtension() );
            $destination = 'profile';

            $filename = $time.$imagename;
            $file->move($destination, $filename);
            Session()->put('photo', $filename);    
        }
       
        // update
        $manager    =   Manager::find($id);
        $manager->firstname     =   $request->firstname;
        $manager->lastname      =   $request->lastname;
        $manager->gender        =   $request->gender;
        $manager->dob           =   $request->dob;
        $manager->mobile        =   $request->mobile;
        $manager->role          =   $request->role;
        if(Session::has('photo'))
        {
            $manager->photo     =    Session()->get('photo') ;
        }
        $manager->save(); 

        Session()->put('first', ucfirst( $manager->firstname ) );
        Session()->put('last', ucfirst( $manager->lastname ) );
        Session()->flash('update', 'Update Successfull.');
       return Redirect::to('auth/create'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
