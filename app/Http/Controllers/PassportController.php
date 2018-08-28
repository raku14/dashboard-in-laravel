<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Passport;
use Input;
use Redirect;
use Session;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //get all the data
        $passport = Passport::all();

        //load the view and pass the data
        return View::make('passports.index')->with('passports', $passport);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load the create form (app/views/passports/create.blade.php)
        return View::make('passports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'number'     => 'required|numeric',
            'date'       => 'required|date'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('passports/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $passport = new Passport;
            $passport->name       = Input::get('name');
            $passport->email      = Input::get('email');
            $passport->number     = Input::get('number');
            $passport->date     = Input::get('date');
            $passport->save();

            // redirect
            Session::flash('message', 'Successfully created passport!');
            return Redirect::to('passports');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the passport
        $passport = Passport::find($id);

        //show the view 
        return View::make('passports.show')->with('passport', $passport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the passport
        $passport = Passport::find($id);

        // show the edit form and pass the passport
        return View('passports.edit')->with('passport', $passport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //validate
        $rules = array(
            'name'      =>  'required',
            'email'     =>  'required|email|unique:passport,email,'.$id,
            'number'    =>  'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('passports/'.$id. '/edit')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        }
        else{
            //store
            $passport           =   Passport::find($id);
            $passport->name     =   Input::get('name');
            $passport->email    =   Input::get('email') ;
            $passport->number   =   Input::get('number');
            $passport->date     =   Input::get('date');
            $passport->save();

            // redirect
            Session::flash('message', 'Successfully updated passport!');
            return Redirect::to('passports');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // delete
        $passport = Passport::find($id);
        $passport->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the passport');
        return Redirect::to('passports');
    }
}
