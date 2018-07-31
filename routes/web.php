<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('register/confirm','Auth\RegisterController@confirm_registration')->name('confirm_registration');


Route::resource('admin/serie','SeriesController');




