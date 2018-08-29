<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Redirect;

class BlogController extends Controller
{
   public function blogpost(Request $request){
   	 	$this->validate($request, [
                'title'     =>  'required',
                'content'   =>  'required'
        ]);

        $blog   =   new blog();
        $blog->user_id 		=   Session('user_id');   
        $blog->title        =   $request->title;
        $blog->content      =   $request->content;
        $blog->save();

        Session()->flash('blog', 'Posted');
        return Redirect::to('auth'); 
   }

   public function blogupdate(){
   		echo '<pre>';
   		print_r($_POST);
   }
}
