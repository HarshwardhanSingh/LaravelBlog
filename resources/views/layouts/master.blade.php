<!DOCTYPE html>
<html>
<head>
	<title>InnFact | Blogging begins here</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">InnFact</a>
		</div>
		<ul class="navbar-nav nav navbar-right">
			<li>{{ link_to_route('home','Home') }}</li>
			@if(\Auth::check())
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
