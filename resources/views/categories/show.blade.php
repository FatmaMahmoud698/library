@extends('layout.app')
@section('title')
	Show Category
@endsection
@section('content')
	<h2>{{$category->name}}</h2>
	<small>{{$category->created_at}}</small>
	<hr>
	<a href="{{route('allCategories')}}">Back to</a>
@endsection