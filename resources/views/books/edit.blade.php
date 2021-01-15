@extends('layout.app')
@section('title')
	Edit Books - {{ $book->name}}
@endsection
@section('content')
	@include('inc.errors')
	<form method="POST" action="{{route('updateBook',$book->id)}}" enctype="multipart/form-data">
		@csrf
	  <div class="form-group">
	    <label>name</label>
	    <input type="text" class="form-control" name="name" value="{{ $book->name}}" placeholder="name">
	  </div>
	  <div class="form-group">
	    <label>desc</label>
	    <textarea class="form-control" rows="3" name="desc" placeholder="desription">{{ $book->desc}}</textarea>
	  </div>
	  <div class="form-group">
	    <label>price</label>
	    <input type="number" class="form-control" name="price" placeholder="price" value="{{$book->price}}">
	  </div>
	  <select class="form-control" name="author_id">
	  	@foreach($authors as $author)
	  	<option value='{{$author->id}}' @if($author->id == $book->author_id) selected @endif >{{$author->name}}</option>
	  	@endforeach
	  </select>	
	  @if($book->img !== null)
	    <div class="form-group">
			<img src='{{asset("uploads/$book->img")}}' width="300" height="300">
		</div>	
		@endif
	  <div class="form-group">
	    <input type="file" class="form-control-file" name="img">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a href="{{route('allBooks')}}" class="btn btn-primary mt-5">Back to all</a>
@endsection