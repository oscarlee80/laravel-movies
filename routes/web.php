<?php

Route::get('/', 'HomeController@index');

Route::get('/catalogo', 'HomeController@catalogo');

Route::get('/producto/{id}', 'HomeController@mostrarProducto');

// Ejercitacion

// Movie

Route::get('/movies', 'MovieController@index');

Route::get('/movie/{id}', 'MovieController@show');

Route::get('/movies/search', 'MovieController@search');
// Devuelve el form
Route::get('/movies/create', 'MovieController@create');
// Procesa el form
Route::post('/movies/create', 'MovieController@store');

// Actor

Route::get('/actors', 'ActorController@index');

Route::get('/actor/{id}', 'ActorController@show');

Route::get('/actors/search', 'ActorController@search');
// Devuelve el form
Route::get('/actors/create', 'ActorController@create');
// Procesa el form
Route::post('/actors/store', 'ActorController@store');

Route::get('/actor/{id}/edit', 'ActorController@edit');

Route::put('/actor/{id}', 'ActorController@update');

Route::delete('/actor/{id}', 'ActorController@destroy');


// Genre

Route::get('/genres', 'GenreController@index');

Route::get('/genre/{id}', 'GenreController@show');

Route::get('/genres/new', 'GenreController@create');

Route::post('/genres/new)', 'GenreController@store');




