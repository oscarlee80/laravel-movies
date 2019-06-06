<?php

Route::get('/', 'HomeController@index');

Route::get('/catalogo', 'HomeController@catalogo');

Route::get('/producto/{id}', 'HomeController@mostrarProducto');

// Ejercitacion

// Movie

Route::get('/movies', 'MovieController@index');

Route::get('/movie/{id}', 'MovieController@show');

Route::get('/movies/new', 'MovieController@create');

Route::post('/movies/new)', 'MovieController@store');

Route::get('/movies/search', 'MovieController@search');

// Actor

Route::get('/actors', 'ActorController@index');

Route::get('/actor/{id}', 'ActorController@show');

Route::get('/actors/new', 'ActorController@create');

Route::post('/actors/new)', 'ActorController@store');

Route::get('/actors/search', 'ActorController@search');


// Genre

Route::get('/genres', 'GenreController@index');

Route::get('/genres/{id}', 'GenreController@show');

Route::get('/genres/new', 'GenreController@create');

Route::post('/genres/new)', 'GenreController@store');



