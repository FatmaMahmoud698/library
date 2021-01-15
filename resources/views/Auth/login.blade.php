@extends('layout.app')
@section('title')
	Create User
@endsection
@section('content')
	@include('inc.errors')
	<form method="POST" action="{{route('authDoLogin')}}">
		@csrf
	  <div class="form-group">
	    <label>email</label>
	    <input type="email" class="form-control" name="email" placeholder="email">
	  </div>
	  <div class="form-group">
	    <label>password</label>
	    <input type="password" class="form-control" name="password" placeholder="password">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection