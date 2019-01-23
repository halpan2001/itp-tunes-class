<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
