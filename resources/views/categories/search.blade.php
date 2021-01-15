@extends('layout.app')
@section('title')
	Search Categories
@endsection
@section('content')
	<h1>search result</h1>

	@foreach($categories as $category)
	<hr>
	<h2>{{$category->name}}</h2>
	@endforeach
@endsection