<?php

// Route::get('/', function () {
//     return view('invoices');
// });

//Route will instantiate-> Controller -> load view
//@index standard method to name controller that loads a list
Route::get('/', 'InvoicesController@index');
Route::get('/genres', 'GenresController@index');
Route::get('/tracks', 'TracksController@index');
