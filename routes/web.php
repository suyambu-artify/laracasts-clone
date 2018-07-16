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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
	return 'hey';
});

Route::view('/contact','welcome');

Route::get('/course/{course}','CourseController@show');
Route::get('/post/{id}',function($id){
	$post = \App\Post::find($id);
	return view('post')->with('post',$post);
});

