<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Redirect;
use DB;


class GalleryController extends Controller
{

    public function index(){
    	$uuid = Session('user_id'); 
    	$gallery = DB::table('gallery')->where('user_id', $uuid)->get()->toarray();

    	return view('jwtauth.gallery', compact('gallery'));
    }

    public function upload(Request $request){
    	$this->validate($request,[
    		'image' => 'required'
    	]);

    	$file = $request->file('image');
    	foreach ($file as  $file) 
    	{          
            $time = microtime('.') * 10000; 
            $imagename = $time.'.'.strtolower( $file->getClientOriginalExtension() );
            $destination = 'gallery';

            $filename = $time.$imagename;
            $file->move($destination, $filename);
            
            $gallery 	=	new Gallery;
    		$gallery->user_id 	=	Session('user_id');
    		$gallery->image 	= 	$filename;
    		$gallery->save();
    	}
    	return Redirect::to('auth/gallery');
    }

    public function delete($id){
    		echo $id;
    }
}	
