@extends('layout')
@section('title', 'Genres')
@section('main')

<table class="table">
  <tr>
    <th>Genres</th>
  </tr>
  @forelse ($genres as $genre)
    <tr>
      <td>
        <a href="/tracks?genre={{urlencode($genre->Name)}}">{{$genre->Name}}</a>
        <a href="/genres/{{$genre->GenreId}}/edit"> | Edit</a>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4">No genres found</td>
    </tr>
  @endforelse
</table>

@endsection
