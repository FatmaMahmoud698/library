<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	@yield('styles')
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto">
	    	@guest
	      <li class="nav-item">
	        <a class="nav-link" href="{{ route('authRegister')}}">Register</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ route('authLogin')}}">Login</a>
	      </li>
	      @endguest
	      @auth
	      <li class="nav-item">
	        <a class="nav-link" href="#">{{Auth::user()->role}}: {{Auth::user()->name}}</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ route('authLogout')}}">Logout</a>
	      </li>
	      @endauth
	    </ul>
	  </div>
	</nav>
	<div class="container my-3 py-3">
		@yield('content')
	</div>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/slimjquery.js')}}"></script>
	@yield('scripts')
</body>
</html>
