@extends('layout.app')
@section('title')
	Search Authors
@endsection
@section('content')
	<h1>search result</h1>

	@foreach($authors as $author)
	<hr>
	<h2>{{$author->name}}</h2>
	<p>{{$author->bio}}</p>
	@endforeach
@endsection