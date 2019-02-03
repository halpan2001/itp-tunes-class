@extends('layout')

@section('title', 'Add a Track')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/tracks" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>

        <div class="form-group">
        <label for="album">Album</label>
        <select name="album" id="album" class="form-control">
          @foreach($albums as $album)
          <option value="{{$album->AlbumId}}" {{$album->AlbumId == old('album') ? "selected" : ""}} >
            {{$album->Title}}
          </option>
          @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="media">Media Type</label>
        <select name="media" id="media"class="form-control">
          @foreach($medias as $media)
          <option value="{{$media->MediaTypeId}}" {{$media->MediaTypeId == old('media') ? "selected" : ""}}>
            {{$media->Name}}
          </option>
          @endforeach
        </select>
        </div>

        <div class="form-group">
        <label for="genre">Genre</label>
        <select name="genre" id="genre" class="form-control">
          @foreach($genres as $genre)
          <option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genre') ? "selected" : ""}}>
            {{$genre->Name}}
          </option>
          @endforeach
        </select>
        </div>

        <div class="form-group">
          <label for="composer">Composer</label>
          <input type="text" id="composer" name="composer" class="form-control" value="{{old('composer')}}">
          <small class="text-danger">{{$errors->first('composer')}}</small>
        </div>

        <div class="form-group">
          <label for="milliseconds">Milliseconds</label>
          <input type="number" id="milliseconds" name="milliseconds" class="form-control" value="{{old('milliseconds')}}">
          <small class="text-danger">{{$errors->first('milliseconds')}}</small>
        </div>
        <div class="form-group">
          <label for="bytes">Bytes</label>
          <input type="number" id="bytes" name="bytes" class="form-control" value="{{old('bytes')}}">
          <small class="text-danger">{{$errors->first('bytes')}}</small>
        </div>
        <div class="form-group">
          <label for="unitprice">Unit Price</label>
          <input type="number" id="unitprice" name="unitprice" class="form-control" value="{{old('unitprice')}}">
          <small class="text-danger">{{$errors->first('unitprice')}}</small>
        </div>

        <button type="submit" class="btn btn-primary">
          Save New Track
        </button>
      </form>
    </div>
  </div>
@endsection
