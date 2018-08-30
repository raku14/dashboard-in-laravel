<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Redirect;
use DB;


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

   public function blogupdate($id){

   		echo $id;
   		
   }

   public function blogdelete($id){
   		$blog 	=	Blog::find($id);
   		$blog->delete();
   		return Redirect::to('auth');
   }
}
