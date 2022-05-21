<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

    DB::insert("insert into posts (title,content) values (?,?)", 
    ['twitter tips','Post consistent']);
});

Route::get('/read', function(){
    $posts = DB::select("select * from posts");

    foreach($posts as $post){
        echo $post->title;
    }
});

Route::get('/update', function(){
    DB::update('update posts set content = ? where id = ?', ['Post consistently', 2]);
});