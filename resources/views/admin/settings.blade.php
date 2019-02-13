@extends('layout')

@section('title', 'Settings')

@section('main')
  <h1>Settings</h1>
  <form method="post">
    @csrf
    <div class="form-check">
      <input type="checkbox" id="maintenance" name="maintenance"
            class="form-check-input"
            {{ $value == 'off' ? : 'checked'}} >
      <label for="maintenance">Maintenance Mode</label>
    </div>
    <input type="submit" value="Update Settings" class="btn btn-primary">
  </form>
@endsection
