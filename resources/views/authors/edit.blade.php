@extends('layout.app')
@section('title')
	Edit Author - {{ $author->name}}
@endsection
@section('content')
	@include('inc.errors')
	<form method="POST" action="{{route('updateAuthor',$author->id)}}" enctype="multipart/form-data">
		@csrf
	  <div class="form-group">
	    <label>name</label>
	    <input type="text" class="form-control" name="name" value="{{ $author->name}}" placeholder="name">
	  </div>
	  <div class="form-group">
	    <label>bio</label>
	    <textarea class="form-control" rows="3" name="bio" placeholder="bio">{{ $author->bio}}</textarea>
	  </div>

	  @if($author->img !== null)
	    <div class="form-group">
			<img src='{{asset("uploads/$author->img")}}' width="300" height="300">
		</div>	
		@endif
	  <div class="form-group">
	    <input type="file" class="form-control-file" name="img">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a href="{{route('allAuthors')}}" class="btn btn-primary mt-5">Back to all</a>
@endsection