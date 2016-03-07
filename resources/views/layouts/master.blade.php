<!DOCTYPE html>
<html>
<head>
	<title>InnFact | Blogging begins here</title>
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			{{ link_to_route('root','InnFact',null,array('class' => 'navbar-brand')) }}
		</div>
		<ul class="navbar-nav nav navbar-right">
			@if(\Auth::check())
				<li>{{ link_to_route('posts.create', 'Compose Post') }}</li>
				<li><a href="#">Logged in as {{ \Auth::user()->name }}</a></li>
				<li>{{ link_to_route('logout', 'Log Out') }}</li>
			@else
				<li>{{ link_to_route('users.create','Sign Up')}}</li>
				<li>{{ link_to_route('login','Sign In')}}</li>
			@endif
		</ul>
	</div>
</nav>
<div class="container">
	@yield('content')
</div>
</body>
</html>
