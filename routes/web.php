<?php

// Route::get('/', function () {
//     return view('invoices');
// });

//Route will instantiate-> Controller -> load view
//@index standard method to name controller that loads a list
Route::get('/', 'InvoicesController@index');
Route::get('/playlists', 'PlaylistController@index');
Route::get('playlists/new', 'PlaylistController@create');
Route::get('/playlists/{id}', 'PlaylistController@index');
Route::post('/playlists', 'PlaylistController@store');

Route::get('/genres', 'GenresController@index');
Route::get('/genres/{id}/edit', 'GenresController@edit');
Route::post('/genres', 'GenresController@store');

Route::get('/tracks', 'TracksController@index');
Route::get('/tracks/new', 'TracksController@create');
Route::post('/tracks', 'TracksController@store');
