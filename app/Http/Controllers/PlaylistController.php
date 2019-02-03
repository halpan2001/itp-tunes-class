<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class PlaylistController extends Controller
{
  public function index($playlistId=null)
  {
    if ($playlistId){
      $tracks = DB::table('tracks')
      ->join('playlist_track', 'tracks.TrackId', '=', 'playlist_track.TrackId')
      ->where('PlaylistID', '=', $playlistId)
      ->get();
    }else{
      $tracks=[];
    }
    $playlist = DB::table('playlists')->get();
    return view('playlists.index',[
      'playlists' => $playlist,
      'tracks'=> $tracks
    ]);
  }
  public function create(){
    return view('playlists.create');
  }
  public function store(Request $request){
    //validate name
    $input = $request->all();
    $validation = Validator::make($input, [
      'name' => 'required|min:5|unique:playlists,Name'
    ]);

    //if validation fails, redirect back to form with errors
    if($validation->fails()){
      return redirect('/playlists/new')
        ->withInput()
        ->withErrors($validation);
    }

    //otherwise instert the playlist into the db
    DB::table('playlists')->insert([
      'Name' => $request->name
    ]);

    //redirect to /playlists
    return redirect('/playlists');
  }
}
