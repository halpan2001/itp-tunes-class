<?php

// Route::get('/', function () {
//     return view('invoices');
// });

//Route will instantiate-> Controller -> load view
//@index standard method to name controller that loads a list
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/maintenance', 'Admincontroller@maintenance');

//setting so that all the routes that need authentication go
//through this route
Route::middleware(['authenticated'])->group(function(){
  Route::get('/profile', 'AdminController@index');
  Route::get('/invoices', 'InvoicesController@index');
  Route::get('/settings', 'AdminController@settings');
  Route::post('/settings', 'AdminController@setsettings');
});


//maintenancemode middleware
Route::middleware(['maintenancemode'])->group(function(){
  Route::get('/', 'PlaylistController@index');
  Route::get('playlists/new', 'PlaylistController@create');
  Route::get('/playlists/{id}', 'PlaylistController@index');
  Route::post('/playlists', 'PlaylistController@store');

  Route::get('/genres', 'GenresController@index');
  Route::get('/genres/{id}/edit', 'GenresController@edit');
  Route::post('/genres', 'GenresController@store');

  Route::get('/tracks', 'TracksController@index');
  Route::get('/tracks/new', 'TracksController@create');
  Route::post('/tracks', 'TracksController@store');

  //Users, Class Week 6
  Route::get('/signup', 'SignUpController@index');
  Route::post('/signup', 'SignUpController@signup');
});
