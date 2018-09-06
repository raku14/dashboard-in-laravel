<?php

namespace App\Http\Controllers;
use App\Blog;
use DB;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
     public function index(){
     	
     	$blog = DB::table('blog')
		        ->join('manager', 'manager.id', '=', 'blog.user_id')
		        ->select(['blog.id', 'blog.title', 'manager.firstname'])
		 		->where('seen', '0' )
		        ->get();
     	//$blog = Blog::where('seen', 0)->get();
     	return response()->json($blog);
   }

}
