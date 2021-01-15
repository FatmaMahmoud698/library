@extends('layout.app')
@section('title')
	Create Category
@endsection

@section('content')
	@include('inc.errors')
	<form method="POST" action="{{route('storeCategory')}}" enctype="multipart/form-data">
		@csrf
	  <div class="form-group">
	    <label>name</label>
	    <input type="text" class="form-control" name="name" placeholder="name">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection