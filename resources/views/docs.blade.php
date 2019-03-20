@extends('layout')
@section('title', 'Add a Track')

@section('main')
<div id="doc">

</div>
<div id="edit" contenteditable="true">
Input text here.
</div>

<script>
let connection = new WebSocket('ws://hpan-websocket-demo.herokuapp.com');


connection.onopen = () => {
  console.log('connected from the frontend');

  // connection.send('hello');
};

connection.onerror = () => {
  console.log('failed to connect from the frontend');
};


connection.onmessage = (event) => {
  //when connection comes inspect
  // console.log('recieve message', event.data);
  document.querySelector('#doc').innerText = event.data;
  // let li = document.createElement('li');
  // li.innerText = event.data;
  // document.querySelector('ul').append(li);
};


document.querySelector('#edit').addEventListener('input', (event) => {
  let change = document.querySelector('#edit').innerText;
  connection.send(change);
});

</script>
@endsection
