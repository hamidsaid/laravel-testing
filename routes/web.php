<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

//ROUTING CONTROLLERS
//Route::get('/post', 'App\Http\Controllers\PostsController@index');

//contact controller route with multiple parameters
Route::get("/contact/{mtandao}/{name}", "App\Http\Controllers\PostsController@myFirstView");

Route::get('/post', 'App\Http\Controllers\PostsController@posts');

Route::get('/insert', function(){

    DB::insert("insert into posts (user_id,title,content) values (?,?,?)", 
    [2,'PUBG','Current favorite game']);
});

Route::get('/read', function(){
    $posts = DB::select("select * from posts");

    foreach($posts as $post){
        echo $post->title;
    }
});

Route::get('/update', function(){
    DB::update('update posts set content = ? where id = ?', ['Post consistently', 3 ]);
});

Route::get('/delete', function(){
    DB::update('delete from posts where id=?', [2]);
});

/*
|--------------------------------------------------------------------------
| ELOQUENT ORM
|--------------------------------------------------------------------------
| 
*/

Route::get('/eloquentRead', function(){
    //returns all collection in the Post Model
    $posts = Post::all();

    //returns a specific Record
    $post = Post::find(1);


    foreach($posts as $post){
        echo $post->title . ' ';
    }
});

Route::get('/where', function(){
   //-> chaining methods
   //retrieving data by orm
   $post = Post::where('id',3)->orderBy('id','desc')->take(1)->get();

   foreach($post as $post){
    echo $post->title . ' ';
}
});

Route::get('/eloquentInsert', function(){
    
    //first create an instance of the Post class
    $post = new Post();
    $post->user_id = 2;
    $post->title = 'Java Inheritance';
    $post->content = 'Inheritance is an OOP concept that allows one class to reuse the
    and attributes of another class';

    //you can also update using this 
        // $post = Post::find(5);
        // $post->title = "Inheritance";

    $post->save();

 });

 /*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIPS
|--------------------------------------------------------------------------
| 
*/

//one to one relationship
Route::get('/user/{id}/post', function($id){

    //return the post of user number $id
    return User::find($id)->post;
});
