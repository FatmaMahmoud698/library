@extends('layout.app')
@section('title')
	Latest Authors
@endsection
@section('content')
	<h1>Latest Authors</h1>
	<hr>
	@foreach($authors as $author)

	<h2>{{$author->id}} - {{$author->name}}</h2>
	<p>{{$author->bio}}</p>
	<small>{{$author->created_at}}</small>
	<hr>
	@endforeach
@endsection