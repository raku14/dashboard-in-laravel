<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Bear;
use App\Tree;
use App\User;
use App\Phone_users;
use App\Phone;
use App\Post;
use App\Comment;
use App\Shop;
use App\Product;
use App\Team;
use App\Client;
use App\Passport;
use App\Album;


Route::get('/', function () {
    return view('welcome');
});

// validation
Route::get('/validation', 'FormController@show');
Route::post('/validation', 'FormController@validateform');
Route::get('/createuser', 'FormController@createuser');


// file upload
Route::get('image', 'UploadController@index');
Route::post('image', 'UploadController@valid');
Route::delete('image/{id}', 'UploadController@destroy');

// json
Route::get('json',function(){
   return response()->json(['name' => 'Virat Gandhi', 'state' => 'Gujarat']);
});

// JQuery Validation.
Route::get('/jquery', function(){
	return view('jquery');
});
Route::post('/show', function(){
	return view('show');
});

// js.php file
Route::get('/minjs', function(){
	return view('minjs');
});

//Show
Route::get('/about', 'ShowController@about');
Route::get('/contact', 'ShowController@contact');

// create our route, return a view file (app/views/eloquent.blade.php)
    // we will also send the records we want to the view

    Route::get('eloquent', function() {

        return View::make('eloquent')

            // all the bears (will also return the fish, trees, and picnics that belong to them)
            ->with('bears', Bear::with( 'trees', 'picnics')->get());
             

    });

    //
    Route::get('/getuser', function(){
        echo User::all();
    });

    // One to One relation
    Route::get('/phone', function(){
         return View::make('phone')->with('data', Phone::with('phone_user')->get());
    });

    // One to Many relation
   Route::get('/post', function(){
       // $comment = new Comment(['comment' => 'woow nice weather.']);

       // $post = Post::find(3);
        // $post->comments()->save($comment);
                   /* $post->comments()->saveMany([
                        new Comment(['comment'=>'A new comment']),
                        new Comment(['comment'=>'Another comment']),
                    ]); */
           return View::make('post')->with('data', Post::with('comments')->get());
    });
   // one to many with 3 tables

   Route::get('/s', function(){
        $data = Album::with('users', 'photos')->get();
        dd($data);
   });
   /* Route::get('/photo', function(){

        $data = Album::where('user_id','=',1)->with('users', 'photos')->get();
        dd($data);
        return View::make('photo')->with('data', $data);
    }); */

    // Many to Many relation.
    Route::get('/shop', function(){
        //$shop = Shop::find(1);
        //$shop->products()->attach(1);
       // $shop->products()->detach(1);
        //$shop = Shop::with('products')->get();
        //foreach ($shop->products as $value) {
          //  echo $value->name. '<br>';
       //} 
       return View::make('shop')->with('data', Shop::with('products')->get());
    });

    // hasManyThrough relation
    Route::get('/team', function(){
       return View::make('team')->with('data', Team::with('players', 'goals')->get());
        
    });

// uuid
Route::get('/uuid', function () {
    return Client::create([
        'name' => 'sachin',
        'email' => 'sacrawat22@gmail.com',
        
    ]);
});

// CRUD 
    Route::resource('passports', 'PassportController');

// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// JWT Auth
Route::get('auth/register', 'APIRegisterController@index');
Route::post('auth/register', 'APIRegisterController@register');
Route::get('auth/login', 'APILoginController@index');
Route::post('auth/login', 'APILoginController@login');
Route::get('auth/home', 'Home@home')->middleware('logout');
Route::get('auth/logout', 'LogoutController@logout')->middleware('logout');
Route::get('auth/gallery', 'GalleryController@index')->middleware('logout');
Route::post('auth/upload', 'GalleryController@upload')->middleware('logout');
Route::resource('auth', 'CrudController')->middleware('logout');



// Datatables
Route::get('users', 'DataController@index');
Route::get('create', 'DataController@create');

//one to many with 3 table
Route::get('albums', 'AlbumController@index');
Route::get('photo', 'AlbumController@create');

// Send mail
Route::get('mail', 'MailController@index');
//Route::post('mail', 'MailController@send');


//blade file
Route::get('blade', function(){
    return view('pages.home');
});


// practice 
Route::get('php', function(){
  return View('practice');
});