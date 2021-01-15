@extends('layout.app')
@section('title')
	Search Books
@endsection
@section('content')
	<h1>search result</h1>

	@foreach($books as $book)
	<hr>
	<h2>{{$book->name}}</h2>
	<p>{{$book->desc}}</p>
	@endforeach
@endsection