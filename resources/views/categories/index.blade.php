@extends('layout.app')
@section('title')
	All Categories
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
		<h1>All Categories</h1>
		<a href="{{route('createCategory')}}" class="btn btn-primary"> Add new</a>
	</div>
	@endauth
	@foreach($categories as $category)

		<hr>
		<a href="{{route('showCategory',$category->id)}}">
			<h2>{{$category->name}}</h2>
		</a>
		<a href="{{route('showCategory',$category->id)}}" class="btn btn-info">Show</a>
		@auth
		<a href="{{route('editCategory',$category->id)}}" class="btn btn-info">Edit</a>
		<a href="{{route('deleteCategory',$category->id)}}" class="btn btn-danger">Delete</a>
		@endauth
	@endforeach
	<div class="my-5">
		{!! $categories->render() !!}
	</div>
@endsection