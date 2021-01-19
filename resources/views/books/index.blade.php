@extends('layout.app')
@section('title')
	All Books
@endsection
@section('styles')
<style type="text/css">
	h1{
		color:red;
	}
</style>
@endsection

@section('content')
	@auth
	<div class="d-flex justify-content-between align-items-start">
		<h1>All Books</h1>
		<a href="{{route('createBook')}}" class="btn btn-primary"> Add new</a>
	</div>
	@endauth
	@foreach($books as $book)

		<hr>
		@if($book->img !== null)
			<img src='{{asset("uploads/$book->img")}}' width="100" height="100">
		@endif
		<a href="{{route('showBook',$book->id)}}">
			<h2>{{$book->name}}</h2>
		</a>
		<p>{{$book->desc}}</p>
		<p>{{$book->price}}</p>
		<a href="{{route('showBook',$book->id)}}" class="btn btn-info">Show</a>
		@auth
        @if(Auth::user()->role=='admin')
		<a href="{{route('editBook',$book->id)}}" class="btn btn-info">Edit</a>
		<a href="{{route('deleteBook',$book->id)}}" class="btn btn-danger">Delete</a>
        @endif
		@endauth
	@endforeach
	<div class="my-5">
		{!! $books->render() !!}
	</div>
@endsection
