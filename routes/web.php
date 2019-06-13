<?php

Route::get('/', 'HomeController@index');

//Movies
Route::group(['prefix' => 'movies'], function() {
    Route::get('/', 'MovieController@index');
    Route::get('/create', 'MovieController@create');
    Route::post('/create', 'MovieController@store');
    Route::get('/search', 'MovieController@search');
    Route::get('/{id}','MovieController@show');
});

//Actors
Route::group(['prefix' => 'actors'], function() {
    Route::get('/', 'ActorController@index');
    Route::get('/create', 'ActorController@create');
    Route::post('/create', 'ActorController@store');
    Route::get('/search', 'ActorController@search');
    Route::get('/{id}/edit', 'ActorController@edit');
    Route::put('/{id}', 'ActorController@update');
    Route::delete('/{id}', 'ActorController@destroy');
    Route::get('/{id}', 'ActorController@show');
});

//Generos
Route::group(['prefix' => 'genres'], function() {
    Route::get('/', 'GenreController@index');
    Route::get('/create', 'GenreController@create');
    Route::post('/create', 'GenreController@store');
    Route::get('/{id}', 'GenreController@show');
});





