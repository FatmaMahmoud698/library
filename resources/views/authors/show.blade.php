@extends('layout.app')
@section('title')
	Show Author
@endsection
@section('content')
	@if($author->img !== null)
		<img src='{{asset("uploads/$author->img")}}' width="300" height="300">
	@endif	
	<h2>{{$author->name}}</h2>
	<p>{{$author->bio}}</p>
	<small>{{$author->created_at}}</small>
	<hr>
	<h3>Books</h3>
	@foreach($author->books as $b)
	<a href='{{route("showBook",$b->id)}}'>
		<p>{{$b->name}}</p>
	</a>
	@endforeach
	<a href="{{route('allAuthors')}}">Back to</a>
@endsection