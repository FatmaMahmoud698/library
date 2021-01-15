@extends('layout.app')
@section('title')
	Latest Categories
@endsection
@section('content')
	<h1>Latest Categories</h1>
	<hr>
	@foreach($categories as $category)

	<h2>{{$category->id}} - {{$category->name}}</h2>
	<small>{{$category->created_at}}</small>
	<hr>
	@endforeach
@endsection