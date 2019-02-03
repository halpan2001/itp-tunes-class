<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class TracksController extends Controller
{
    public function index(Request $request)
    {
      $query = DB::table('genres')
      ->select('tracks.Name as trackName',
                'albums.Title as Title',
                'artists.Name as artistName',
                'tracks.UnitPrice as Price'
                )
      ->join('tracks', 'genres.GenreId', '=', 'tracks.GenreId')
      ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
      ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId');

      if($request->query('genre')){
        $query->where('genres.Name', '=', $request->query('genre'));
      }

      $tracks = $query->get();

      return view('tracks', [
        'tracks' => $tracks,
        'genre' => $request->query('genre')
      ]);
    }

    public function create(){
      $aquery = DB::table('albums');
      $albums = $aquery->get();

      $mquery = DB::table('media_types');
      $medias = $mquery->get();

      $gquery = DB::table('genres');
      $genres = $gquery->get();

      return view('tracks.create', [
        'albums' => $albums,
        'medias' => $medias,
        'genres' => $genres
      ]);
    }

    public function store(Request $request){
      //validate fields
      $input = $request->all();
      $validation = Validator::make($input, [
        'name' => 'required|min:5|unique:tracks,Name',
        'album' => 'required',
        'media' => 'required',
        'genre' => 'required',
        'composer' => 'required',
        'milliseconds' => 'required|numeric',
        'bytes' => 'required|numeric',
        'unitprice' => 'required|numeric'
      ]);

      //if validation fails, redirect back to form with errors
      if($validation->fails()){
        return redirect('/tracks/new')
          ->withInput() //returns the previous inputs so you can use them
          ->withErrors($validation);
      }

      //otherwise instert the playlist into the db
      DB::table('tracks')->insert([
        'Name' => $request->name,
        'AlbumId' => $request->album,
        'MediaTypeId' => $request->media,
        'GenreId' => $request->genre,
        'Composer' => $request->composer,
        'Milliseconds' => $request->milliseconds,
        'Bytes' => $request->bytes,
        'UnitPrice' => $request->unitprice
      ]);

      //redirect to /playlists
      return redirect('/tracks');

    }
}
