@extends('layout.app')
@section('title')
	Create Book
@endsection

@section('content')
	@include('inc.errors')
	<form method="POST" action="{{route('storeBook')}}" enctype="multipart/form-data">
		@csrf
	  <div class="form-group">
	    <label>name</label>
	    <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name')}}">
	  </div>
	  <div class="form-group">
	    <label>desc</label>
	    <textarea class="form-control" rows="3" name="desc" placeholder="description">{{old('desc')}}</textarea>
	  </div>
	  <div class="form-group">
	    <label>price</label>
	    <input type="number" class="form-control" name="price" placeholder="price" value="{{old('price')}}">
	  </div>
	  <select class="form-control" name="author_id">
	  	@foreach($authors as $author)
	  <option value="{{$author->id}}" @if($author->id == old('author_id')) selected @endif>{{$author->name}}</option>
	  @endforeach
	</select>
	  <div class="form-group">
	    <input type="file" class="form-control-file" name="img">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection