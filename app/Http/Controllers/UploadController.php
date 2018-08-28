<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class UploadController extends Controller
{
    public function index(){
        $images =   Image::get();
    	return view('image', compact('images'));
    }
    public function valid(Request $request){
    	$this->validate($request, [
    		'image'   =>  'required'
    	]);

       $file = $request->file('image');

        $time = microtime('.') * 10000; 
        $imagename = $time.'.'.strtolower( $file->getClientOriginalExtension() );
        $destination = 'upload';

        $name = $time.$imagename;
        $file->move($destination, $name);

        $image = new Image;
        $image->image_name = $name;
        $image->save();

     
    $request -> session() -> flash("success", "Image added successfully");
        return redirect('image');
   }

   public function destroy(Request $request, $id){
        $image = Image::find($id)->delete();
$request -> session() -> flash("delete", "Image removed successfully");
        return redirect('image');
   }
}