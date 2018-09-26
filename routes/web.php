<?php


Route::get('/', 'FrontController@index')->name('welcome');


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register')->name('register');
// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('home', 'HomeController@index')->name('home');
Route::get('register/confirm','Auth\RegisterController@confirm_registration')->name('confirm_registration');


Route::group(['prefix'=>'frontend'],function(){
    Route::get('show/serie/{serie}','FrontController@showserie')->name('show_serie');
    Route::get('go_to_serie/{serie}','FrontController@goto_serie')->name('goto_serie');
    Route::get('watch/serie/{serie}/lesson/{lesson}','FrontController@watch')->name('watch_serie');
    Route::post('complete/lesson/{lesson}','FrontController@completelesson')->name('lessonhaswatched');
});






