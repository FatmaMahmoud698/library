@extends('layout.app')
@section('title')
	Show Category
@endsection
@section('content')
	<h2>{{$category->name}}</h2>
    <h4>Books: </h4>
    <ul>
        @foreach($category->books as $book)
            <li>{{$book->name}}</li>
        @endforeach
    </ul>
	<small>{{$category->created_at}}</small>
	<hr>
	<a href="{{route('allCategories')}}">Back to</a>
@endsection
