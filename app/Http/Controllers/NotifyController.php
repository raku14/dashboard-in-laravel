<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;

class NotifyController extends Controller
{
      public function seen(){
        $post_id =  $_GET['id'];
        $blog = Blog::find($post_id);
        $blog->seen = 1;
        $blog->save();


       $blog =  DB::table('blog')
		        ->join('manager', 'manager.id', '=', 'blog.user_id')
		 		->where('blog.id', '=',  $post_id )
		        ->get();
	
       return view('jwtauth.notify', compact('blog'));
    }
   
    	
}
