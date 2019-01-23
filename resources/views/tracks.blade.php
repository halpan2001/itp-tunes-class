@extends('layout')
@section('title', 'Tracks')
@section('main')
<h2>{{$genre}} Songs</h2>
<table class="table">
  <tr>
    <th>Track Name</th>
    <th>Album Title</th>
    <th>Artist Name</th>
    <th>Price</th>
  </tr>
  @forelse ($tracks as $track)
    <tr>
      <td>
        {{$track->trackName}}
      </td>
      <td>
        {{$track->Title}}
      </td>
      <td>
        {{$track->artistName}}
      </td>
      <td>
        {{$track->Price}}
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4">No tracks found</td>
    </tr>
  @endforelse
</table>

@endsection
