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

   public function blogupdate(Request $request){
   		
   		$key = 'text'.$_POST['txt_key'];
   		$content = $_POST["$key"];
   		
   		$id 	= 	$_POST['post_id'];
   		$blog 	=	Blog::find($id);
   		$blog->content 	=	$content;
   		$blog->save();

   		Session()->flash('post_update', 'Post Updated');
   		return Redirect::to('auth');
   		 
   }

   public function blogdelete($id){
   		$blog 	=	Blog::find($id);
   		$blog->delete();
   		Session()->flash('post_delete', 'Deleted');
   		return Redirect::to('auth');
   }
}
