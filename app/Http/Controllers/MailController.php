<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Session;
use App\Jobs\SendEmailTest;

class MailController extends Controller
{
	public function index(){
		$details['email'] = ['sacrawat22@gmail.com', 'sachin.techindustan@gmail.com'];
   	 	dispatch(new SendEmailTest($details));
  	  	dd('done');
	}
	/*
	public function index(){
		return view('emails.sendmail');
	}
    public function send(Request $request){
    	$this->validate($request,[
    		'email'		=>	'required|email',
    		'subject'	=>	'required',
    		'body'		=> 	'required'
    	]);

    	$body		=	$request->body;


    	$data = array('name'=>"Techindustan", "body" => $body);
		/* Mail::send('emails.mail', $data, function($message) {
	    
	    $message->from('sachin.techindustan@gmail.com','Sachin Rawat');
	    $message->to(Input::get('email'))
	            ->subject(Input::get('subject'));
		});  

		Session::flash('mail', 'Mail Sent');
		return redirect('mail');
		
    } */
}
