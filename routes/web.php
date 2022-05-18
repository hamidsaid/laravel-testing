<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/post', 'App\Http\Controllers\PostsController@index');

//contact controller route
Route::get("/contact/{mtandao}/{name}", "App\Http\Controllers\PostsController@myFirstView");

