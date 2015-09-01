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
Route::get('/contact', ['uses' => 'PagesController@contact', 'as' => 'contact']);
Route::get('/mentions', ['uses' => 'PagesController@mentions', 'as' => 'mentions']);
Route::get('/faq', ['uses' => 'PagesController@faq', 'as' => 'faq']);


# ACTORS
Route::group(['prefix' => 'actors'], function() {
    Route::get('/index', ['uses' => 'ActorsController@index',
                                'as' => 'actors.index']);
    Route::get('/create', ['uses' => 'ActorsController@create', 'as' => 'actors.create']);
    Route::get('{id}', ['uses' => 'ActorsController@read']) -> where ('id', '[0-9]+');
    Route::get('{id}/update', ['uses' => 'ActorsController@update']) -> where ('id', '[0-9]+');
    Route::get('{id}/delete', ['uses' => 'ActorsController@delete']) -> where ('id', '[0-9]+');
});

# DIRECTORS
Route::group(['prefix' => 'directors'], function() {
    Route::get('/index', ['uses' => 'DirectorsController@index',
                        'as' => 'directors.index']);
    Route::get('/create', ['uses' => 'DirectorsController@create', 'as' => 'directors.create']);
    Route::get('{id}', ['uses' => 'DirectorsController@read']) -> where ('id', '[0-9]+');
    Route::get('{id}/update', ['uses' => 'DirectorsController@update']) -> where ('id', '[0-9]+');
    Route::get('{id}/delete', ['uses' => 'DirectorsController@delete']) -> where ('id', '[0-9]+');
});

# MOVIES
Route::group(['prefix' => 'movies'], function() {
    Route::get('/index', ['uses' => 'MoviesController@index',
        'as' => 'movies.index']);
    Route::get('/create', ['uses' => 'MoviesController@create', 'as' => 'movies.create']);
    Route::get('{id}', ['uses' => 'MoviesController@read']) -> where ('id', '[0-9]+');
    Route::get('{id}/update', ['uses' => 'MoviesController@update']) -> where ('id', '[0-9]+');
    Route::get('{id}/delete', ['uses' => 'MoviesController@delete']) -> where ('id', '[0-9]+');
    Route::get('search/{lang?}/{visibility?}/{length?}', ['uses' => 'MoviesController@search',
        'as' => 'movies.search'])
        -> where (['lang' => 'fr|en|es', 'visibility' => '[0-1]', 'length' => '[1-9]{1,2}' ]);
});


# USERS
Route::group(['prefix' => 'users'], function() {
    Route::get('/index', ['uses' => 'UsersController@index',
        'as' => 'users.index']);
    Route::get('/create', ['uses' => 'UsersController@create', 'as' => 'users.create']);
    Route::get('{id}', ['uses' => 'UsersController@read']) -> where ('id', '[0-9]+');
    Route::get('{id}/update', ['uses' => 'UsersController@update']) -> where ('id', '[0-9]+');
    Route::get('{id}/delete', ['uses' => 'UsersController@delete']) -> where ('id', '[0-9]+');
    Route::get('search/{zipcode?}/{city?}/{enable?}', ['uses' => 'UsersController@search',
        'as' => 'users.search'])
        -> where (['zipcode' => '\*|[0-9]{5}', 'city' => '\*|[a-zA-Z-]+', 'enable' => '[0-1]' ]);

});

# USERS
Route::group(['prefix' => 'cinemas'], function() {
    Route::get('/index', ['uses' => 'CinemasController@index',
        'as' => 'cinemas.index']);
    Route::get('/create', ['uses' => 'CinemasController@create', 'as' => 'cinemas.create']);
    Route::get('{id}', ['uses' => 'CinemasController@read']) -> where ('id', '[0-9]+');
    Route::get('{id}/update', ['uses' => 'CinemasController@update']) -> where ('id', '[0-9]+');
    Route::get('{id}/delete', ['uses' => 'CinemasController@delete']) -> where ('id', '[0-9]+');

});

# CATEGORIES
Route::group(['prefix' => 'categories'], function() {
    Route::get('/index', ['uses' => 'CategoriesController@index',
        'as' => 'categories.index']);
    Route::get('/create', ['uses' => 'CategoriesController@create', 'as' => 'categories.create']);
    Route::get('{id}', ['uses' => 'CategoriesController@read']) -> where ('id', '[0-9]+');
    Route::get('{id}/update', ['uses' => 'CategoriesController@update']) -> where ('id', '[0-9]+');
    Route::get('{id}/delete', ['uses' => 'CategoriesController@delete']) -> where ('id', '[0-9]+');

});
