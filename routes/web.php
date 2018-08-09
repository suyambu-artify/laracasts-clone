<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('register/confirm','Auth\RegisterController@confirm_registration')->name('confirm_registration');


Route::group(['prefix'=>'admin','middleware'=>['admin']],function (){
    Route::resource('{serie_by_id}/lessons','LessonsController');
    Route::resource('serie','SeriesController');

});










