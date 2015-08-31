<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


# HOME
Route::get('/', function () {
    return view('welcome');
});

# PAGES
Route::get('/contact', ['uses' => 'PagesController@contact']);
Route::get('/mentions', ['uses' => 'PagesController@mentions']);
Route::get('/faq', ['uses' => 'PagesController@faq']);


# ACTORS
Route::group(['prefix' => 'actors'], function() {
    Route::get('/', ['uses' => 'ActorsController@index']);
    Route::get('/create', ['uses' => 'ActorsController@create']);
    Route::get('{id}', ['uses' => 'ActorsController@read']);
    Route::get('{id}/update', ['uses' => 'ActorsController@update']);
    Route::get('{id}/delete', ['uses' => 'ActorsController@delete']);
});

# DIRECTORS
Route::group(['prefix' => 'directors'], function() {
    Route::get('/', ['uses' => 'DirectorsController@index']);
    Route::get('/create', ['uses' => 'DirectorsController@create']);
    Route::get('{id}', ['uses' => 'DirectorsController@read']);
    Route::get('{id}/update', ['uses' => 'DirectorsController@update']);
    Route::get('{id}/delete', ['uses' => 'DirectorsController@delete']);
});

# MOVIES
Route::group(['prefix' => 'movies'], function() {
    Route::get('/', ['uses' => 'MoviesController@index']);
    Route::get('/create', ['uses' => 'MoviesController@create']);
    Route::get('{id}', ['uses' => 'MoviesController@read']);
    Route::get('{id}/update', ['uses' => 'MoviesController@update']);
    Route::get('{id}/delete', ['uses' => 'MoviesController@delete']);
});


