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


Route::get('/course/{id}',function($id){
	$course = \App\Course::find($id);
	return view('course')->with('course',$course);
});

