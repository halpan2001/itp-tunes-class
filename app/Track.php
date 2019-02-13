<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
  protected $primaryKey = 'TrackId';
  public $timestamps = false;

  public function genre()
  {
    return $this->belongsTo('App\Genre', 'GenreId');
    //^ adjusted for the uncoventional foreign key names
  }

  public function playlists()
  {
    return $this->belongsToMany('App\Playlist', 'playlist_track', 'TrackId', 'PlaylistId');
    //doesn't follow convention so you define join table name and key names
  }
}
