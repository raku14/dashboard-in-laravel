<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use DB;
use Datatables;


class FriendController extends Controller
{
    public function index(){
    	$data = Manager::whereNotIN('id', array(session('user_id')) )->get();
        return Datatables::of($data)
        		->editColumn('mergeColumn',function($data){
        			return $data->firstname.' '.$data->lastname;
        		})
        		->addColumn('action', function($data){
        			return '<a href="#" class="btn btn-success" style="width: 200px;">Request Send</a>';
        		})
        		->make(true);
    }

    public function create(){
    	return view('jwtauth.friend');
    }
}
