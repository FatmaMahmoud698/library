@extends('layout.app')
@section('title')
	All Authors
@endsection
@section('styles')
<style type="text/css">
	h1{
		color:red;
	}
</style>
@endsection

@section('content')
	<div class="d-flex justify-content-between align-items-start">
		<h1>All Authors</h1>
		<a href="{{route('createAuthor')}}" class="btn btn-primary"> Add new</a>
	</div>
	@foreach($authors as $author)

		<hr>
		@if($author->img !== null)
			<img src='{{asset("uploads/$author->img")}}' width="100" height="100">
		@endif
		<a href="{{route('showAuthor',$author->id)}}">
			<h2>{{$author->name}}</h2>
		</a>
		<p>{{$author->bio}}</p>
        @if(Auth::user()->role=='admin')
		<a href="{{route('editAuthor',$author->id)}}" class="btn btn-info">Edit</a>
		<a href="{{route('deleteAuthor',$author->id)}}" class="btn btn-danger">Delete</a>
        @endif

	@endforeach
	<div class="my-5">
		{!! $authors->render() !!}
	</div>
@endsection
