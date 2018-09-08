<?php


Route::resource('{serie_by_id}/lessons','LessonsController');
Route::get('{serie_by_id}/lessons','SeriesController@show');
Route::resource('serie','SeriesController');


