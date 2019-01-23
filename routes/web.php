<?php

// Route::get('/', function () {
//     return view('invoices');
// });

//Route will instantiate-> Controller -> load view
//@index standard thing to name controller that loads a list
Route::get('/', 'InvoicesController@index');
