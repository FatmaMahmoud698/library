@extends('layout.app')
@section('title')
	Edit Categories - {{ $category->name}}
@endsection
@section('content')
	@include('inc.errors')
	<form method="POST" action="{{route('updateCategory',$category->id)}}">
		@csrf
	  <div class="form-group">
	    <label>name</label>
	    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $category->name}}" placeholder="name">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a href="{{route('allCategories')}}" class="btn btn-primary mt-5">Back to all</a>
@endsection