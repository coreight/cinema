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


# AUTH
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

### GROUPE ADMIN ###

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    # HOME
    Route::get('/', ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']);


    # ADMIN
    Route::get('/auth/update', ['uses' => 'Auth\AuthController@update', 'as' => 'auth.update']);
    Route::post('/post', ['uses' => 'Auth\AuthController@store', 'as' => 'auth.post']);

    # PAGES
    Route::get('/contact', ['uses' => 'PagesController@contact', 'as' => 'contact']);
    Route::get('/mentions', ['uses' => 'PagesController@mentions', 'as' => 'mentions']);
    Route::get('/faq', ['uses' => 'PagesController@faq', 'as' => 'faq']);
    Route::any('/search', ['uses' => 'PagesController@search', 'as' => 'search']);


    # ACTORS
    Route::group(['prefix' => 'actors'], function () {
        Route::get('/index', ['uses' => 'ActorsController@index',
            'as' => 'actors.index']);
        /* Page de création */
        Route::get('/create', ['uses' => 'ActorsController@create', 'as' => 'actors.create']);
        /* Envoi du fomulaire de création */
        Route::post('/post', ['uses' => 'ActorsController@store', 'as' => 'actors.post']);
        Route::get('{id}', ['uses' => 'ActorsController@read', 'as' => 'actors.read'])->where('id', '[0-9]+');
        Route::get('{id}/update', ['uses' => 'ActorsController@update'])->where('id', '[0-9]+');
        Route::get('{id}/delete', ['uses' => 'ActorsController@delete', 'as' => 'actors.delete'])->where('id', '[0-9]+');
    });

    # DIRECTORS
    Route::group(['prefix' => 'directors'], function () {
        Route::get('/index', ['uses' => 'DirectorsController@index',
            'as' => 'directors.index']);
        Route::get('/create', ['uses' => 'DirectorsController@create', 'as' => 'directors.create']);
        Route::post('/post', ['uses' => 'DirectorsController@store', 'as' => 'directors.post']);
        Route::get('{id}', ['uses' => 'DirectorsController@read', 'as' => 'directors.read'])->where('id', '[0-9]+');
        Route::get('{id}/update', ['uses' => 'DirectorsController@update'])->where('id', '[0-9]+');
        Route::get('{id}/delete', ['uses' => 'DirectorsController@delete', 'as' => 'directors.delete'])->where('id', '[0-9]+');
    });

    # MOVIES
    Route::group(['prefix' => 'movies'], function () {
        Route::any('/index', ['uses' => 'MoviesController@index',
            'as' => 'movies.index']);
        Route::get('/create', ['uses' => 'MoviesController@create', 'as' => 'movies.create']);
        Route::post('/post', ['uses' => 'MoviesController@store', 'as' => 'movies.post']);
        Route::post('/quickPost', ['uses' => 'MoviesController@quickStore', 'as' => 'movies.quickPost']);
        Route::get('{id}', ['uses' => 'MoviesController@read', 'as' => 'movies.read'])->where('id', '[0-9]+');
        Route::get('{id}/{field?}/{value?}/update', ['uses' => 'MoviesController@update', 'as' => 'movies.update'])->where('id', '[0-9]+');
        Route::get('{id}/delete', ['uses' => 'MoviesController@delete', 'as' => 'movies.delete']);
        Route::get('{id}/forceDelete', ['uses' => 'MoviesController@forceDelete', 'as' => 'movies.forceDelete']);
        Route::get('/trash', ['uses' => 'MoviesController@trash', 'as' => 'movies.trash']);
        Route::get('/{id}/restore', ['uses' => 'MoviesController@restore', 'as' => 'movies.restore']);
        Route::post('/comment/{id}', ['uses' => 'MoviesController@comment', 'as' => 'movies.comment']);
        Route::post('/action', ['uses' => 'MoviesController@action', 'as' => 'movies.action']);
        Route::get('search/{lang?}/{visibility?}/{length?}', ['uses' => 'MoviesController@search',
            'as' => 'movies.search'])
            ->where(['lang' => 'fr|en|es', 'visibility' => '[0-1]', 'length' => '[1-9]{1,2}']);
    });


    # USERS
    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', ['uses' => 'UsersController@index',
            'as' => 'users.index']);
        Route::get('/create', ['uses' => 'UsersController@create', 'as' => 'users.create']);
        Route::get('{id}', ['uses' => 'UsersController@read', 'as' => 'users.read'])->where('id', '[0-9]+');
        Route::get('{id}/update', ['uses' => 'UsersController@update'])->where('id', '[0-9]+');
        Route::get('{id}/delete', ['uses' => 'UsersController@delete', 'as' => 'users.delete'])->where('id', '[0-9]+');
        Route::get('search/{zipcode?}/{city?}/{enable?}', ['uses' => 'UsersController@search',
            'as' => 'users.search'])
            ->where(['zipcode' => '\*|[0-9]{5}', 'city' => '\*|[a-zA-Z-]+', 'enable' => '[0-1]']);

    });

    # CINEMAS
    Route::group(['prefix' => 'cinemas'], function () {
        Route::get('/index', ['uses' => 'CinemasController@index',
            'as' => 'cinemas.index']);
        Route::get('/create', ['uses' => 'CinemasController@create', 'as' => 'cinemas.create']);
        Route::get('{id}', ['uses' => 'CinemasController@read', 'as' => 'cinemas.read'])->where('id', '[0-9]+');
        Route::get('{id}/update', ['uses' => 'CinemasController@update'])->where('id', '[0-9]+');
        Route::get('{id}/delete', ['uses' => 'CinemasController@delete', 'as' => 'cinemas.delete'])->where('id', '[0-9]+');

    });

    # CATEGORIES
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/index', ['uses' => 'CategoriesController@index',
            'as' => 'categories.index']);
        Route::get('/create', ['uses' => 'CategoriesController@create', 'as' => 'categories.create']);
        Route::post('/post', ['uses' => 'CategoriesController@store', 'as' => 'categories.post']);
        Route::get('{id}', ['uses' => 'CategoriesController@read', 'as' => 'categories.read'])->where('id', '[0-9]+');
        Route::get('{id}/update', ['uses' => 'CategoriesController@update'])->where('id', '[0-9]+');
        Route::get('{id}/delete', ['uses' => 'CategoriesController@delete', 'as' => 'categories.delete'])->where('id', '[0-9]+');
    });


    # COMMENTAIRES
    Route::group(['prefix' => 'comments'], function () {
        Route::get('/index', ['uses' => 'CommentsController@index',
            'as' => 'comments.index']);
    });
});
