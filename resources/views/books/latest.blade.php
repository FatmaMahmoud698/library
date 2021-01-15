@extends('layout.app')
@section('title')
	Latest Books
@endsection
@section('content')
	<h1>Latest Books</h1>
	<hr>
	@foreach($books as $book)

	<h2>{{$book->id}} - {{$book->name}}</h2>
	<p>{{$book->desc}}</p>
	<small>{{$book->created_at}}</small>
	<hr>
	@endforeach
@endsection