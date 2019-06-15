<?php

Route::get('/', 'HomeController@index');
Route::get('/results', 'SearchController@search');

//Movies
Route::group(['prefix' => 'movies'], function() {
    Route::get('/', 'MovieController@index');
    Route::get('/create', 'MovieController@create');
    Route::post('/create', 'MovieController@store');
    Route::get('/search', 'MovieController@search');
    Route::get('/{id}/edit', 'MovieController@edit');
    Route::patch('/{id}', 'MovieController@update');
    Route::delete('/{id}', 'MovieController@destroy');
    Route::get('/{id}','MovieController@show');
});

//Series
Route::group(['prefix' => 'series'], function() {
    Route::get('/', 'SerieController@index');
    Route::get('/create', 'SerieController@create');
    Route::post('/create', 'SerieController@store');
    Route::get('/search', 'SerieController@search');
    Route::get('/{id}/edit', 'SerieController@edit');
    Route::patch('/{id}', 'SerieController@update');
    Route::delete('/{id}', 'SerieController@destroy');
    Route::get('/{id}','SerieController@show');
});

//Seasons
Route::group(['prefix' => 'seasons'], function() {
    Route::get('/', 'SeasonController@index');
    Route::get('/create', 'SeasonController@create');
    Route::post('/create', 'SeasonController@store');
    Route::get('/search', 'SeasonController@search');
    Route::get('/{id}/edit', 'SeasonController@edit');
    Route::patch('/{id}', 'SeasonController@update');
    Route::delete('/{id}', 'SeasonController@destroy');
    Route::get('/{id}','SeasonController@show');
});

//Episodes
Route::group(['prefix' => 'episodes'], function() {
    Route::get('/', 'EpisodeController@index');
    Route::get('/create', 'EpisodeController@create');
    Route::post('/create', 'EpisodeController@store');
    Route::get('/search', 'EpisodeController@search');
    Route::get('/{id}/edit', 'EpisodeController@edit');
    Route::patch('/{id}', 'EpisodeController@update');
    Route::delete('/{id}', 'EpisodeController@destroy');
    Route::get('/{id}','EpisodeController@show');
});

//Actors
Route::group(['prefix' => 'actors'], function() {
    Route::get('/', 'ActorController@index');
    Route::get('/create', 'ActorController@create');
    Route::post('/create', 'ActorController@store');
    Route::get('/search', 'ActorController@search');
    Route::get('/{id}/edit', 'ActorController@edit');
    Route::patch('/{id}', 'ActorController@update');
    Route::delete('/{id}', 'ActorController@destroy');
    Route::get('/{id}', 'ActorController@show');
});

//Generos
Route::group(['prefix' => 'genres'], function() {
    Route::get('/', 'GenreController@index');
    Route::get('/create', 'GenreController@create');
    Route::post('/create', 'GenreController@store');
    Route::get('/{id}/edit', 'GenreController@edit');
    Route::patch('/{id}', 'GenreController@update');
    Route::delete('/{id}', 'GenreController@destroy');
    Route::get('/{id}', 'GenreController@show');
});





