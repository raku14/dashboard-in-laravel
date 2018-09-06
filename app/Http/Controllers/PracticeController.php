<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class PracticeController extends Controller
{
    public function index(){
    	$user = User::all()->toarray();
    	$collection = collect($user);

    	// filter return value
    	$filter = $collection->filter(function($value, $key){
    		if($value['id'] == 2){
    			return true;
    		}
    	});
    	$filter->all();
    	
    	// search() return key 
    	$search = $collection->search(function($value, $key){
    		return $value['name'] == 'gautam' ;
    	});
    	
    	// chunk() split the collection into multiper smaller collection of given size.
    	$chunk = $collection->chunk(10)->toarray();

    	//$dump = $collection->whereIn('id', [2, 6])->dump();

    	$map = $collection->map(function($value, $key){
    		$value['id'] +=0;
    		return $value;
    	});
    	$map->all();

    	// zipped() add array in collection
    	$zipped = $collection->zip([2, 3, 4]);
    	$zipped->all();

    	// whereNotIn() skip given array.
    	$where = $collection->whereNotIn('id', [2, 3, 4, 5]);
    	$where->all();

    	// max() return maximum id
    	$max = $collection->max('id');

    	// pluck() extract values of one column.
    	$pluck = $collection->pluck('email', 'id');
    	$pluck->all();

    	// each() similar to foreach
    	$each = $collection->each(function($value, $key){
    		if($key == 5){
    			return false;
    		}
    		$value['name']. '<br>';
    	});
    	

    	$tap = $collection->whereNotIn('id', 2)
		    ->tap(function ($collection) {
		        $collection = $collection->where('id', 2);
		        info($collection->values());
		    })
		    ->all();
		   $tap;


		$pipe = $collection->pipe(function($collection){
		 	return $collection->min('id');
		 });
		 $pipe;

		// contain() check if the collection contain a given value return boolean 
		$contain = $collection->contains(function($value, $key){
		 	return strlen($value['id'] == 4);
		 });
		 $contain;

		 // forget() remove the item form the collection. Not work on multi-dimensional arrays.
		$forget = collect(['country' => 'usa', 'state' => 'ny']);
		$forget->forget('country')->all();

		$avg = collect([12, 32, 54, 92, 37]);
		return $avg->avg();
    }	
}
