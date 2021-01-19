@extends('layout.app')
@section('title')
	Show Book
@endsection
@section('content')
	@if($book->img !== null)
		<img src='{{asset("uploads/$book->img")}}' width="300" height="300">
	@endif
	<h2>{{$book->name}}</h2>
	<p>{{$book->desc}}</p>
	<p>{{$book->price}} L.E</p>
	<p>By: <a href='{{route("showAuthor",$book->author->id)}}'>{{$book->author->name}}</a></p>
	<p>brief description about author: {{$book->author->bio}}</p>
	<small>{{$book->created_at}}</small>
    <h4>categories: </h4>
    <ul>
    @foreach( $book->categories as $cat)
    <li>{{$cat->name}}</li>
    @endforeach
    </ul>
	<hr>
	<a href="{{route('allBooks')}}">Back to</a>
@endsection
