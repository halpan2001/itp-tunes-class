<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    public function index()
    {
      $query = DB::table('genres');
      $invoices = $query->get();
      return view('genres', [
        'genres' => $invoices
      ]);
    }

    public function edit($genreId=null)
    {
      $query = DB::table('genres')->where('GenreId', $genreId);
      $genre = $query->first();

      return view('genres/edit', [
        'genre' => $genre
      ]);
    }

    public function store(Request $request){
      //validate fields
      $input = $request->all();
      $genreId = $request->input('genreId');
      $name = $request->input('name');
      $validation = Validator::make($input, [
        'name' => 'required|min:3|unique:genres,Name'
      ]);

      //if validation fails, redirect back to form with errors
      if($validation->fails()){
        return redirect('/genres/' . $genreId . '/edit')
          ->withInput() //returns the previous inputs so you can use them
          ->withErrors($validation);
      }

      //otherwise instert the playlist into the db
      DB::table('genres')
        ->where('GenreId', $genreId)
        ->update(['Name'=>$name]);

      //redirect to /playlists
      return redirect('/genres');
    }
}
