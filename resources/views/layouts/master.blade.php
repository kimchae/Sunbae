<!DOCTYPE html>
<html>

<head>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="/css/style.css" media="screen,projection" />

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald|Lato" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<header>
		<nav class="white">
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons" id="menu">menu</i></a>
				<a href="/" class="brand-logo">sunbae</a>
				<ul class="hide-on-med-and-down left" id="nav">
					<li{!! set_active(['listing', 'listing/drama', 'drama/*']) !!}><a href="/listing/drama">Drama</a></li>
					<li{!! set_active(['listing/variety', 'variety/*']) !!}><a href="/listing/variety">Variety</a></li>
					<li{!! set_active(['listing/movies', 'movie/*']) !!}><a href="/listing/movies">Movies</a></li>
					<li{!! set_active(['soundtrack', 'soundtrack/*']) !!}><a href="#">Soundtrack</a></li>
				</ul>
				<ul class="hide-on-med-and-down right">
					<li{!! set_active('search') !!}><a href="#searchModal"><i class="material-icons">search</i></a></li>
					<li><a href="#login" id="loginBtn" class="waves-effect waves-light btn primary blue darken-1">Log In</a></li>
				</ul>

				<ul class="side-nav" id="mobile-nav">
					<li{!! set_active(['listing', 'listing/drama', 'drama/*']) !!}><a href="/listing/drama">Drama</a></li>
					<li{!! set_active(['listing/variety', 'variety/*']) !!}><a href="/listing/variety">Variety</a></li>
					<li{!! set_active(['listing/movies', 'movie/*']) !!}><a href="/listing/movies">Movies</a></li>
					<li{!! set_active(['soundtrack', 'soundtrack/*']) !!}><a href="#">Soundtrack</a></li>
					<li{!! set_active('search') !!}><a href="/search">Search</a></li>
					<li{!! set_active('login') !!}<a href="/login">Login</a></li>
				</ul>
			</div>
		</nav>
		@if (Request::is('/'))
			<div class="slider">
				<ul class="slides z-depth-2">
					@foreach ($featured as $drama)
						<li>
							<img src="img/covers/{{ $drama->id }}.jpg">
							<div class="caption center-align">
								<h3>{{ $drama->name }}</h3>
								<p>{{ preg_replace('/([^?!.]*.).*/', '\\1', $drama->synopsis) }}</p>
								<a class="btn blue waves-effect waves-light">Watch Now</a>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		@endif
	</header>

	<main class="container">
		@yield('content')
	</main>

	<footer class="page-footer footer-copyright grey darken-4">
		<div class="container white-text center">
			&copy; Sunbae. 2016-2017.
		</div>
	</footer>

	<div id="login" class="modal">
		<form class="form col s12" role="form" method="POST" action="/login">
			<div class="modal-content">
				<h4>Login</h4>
				<div class="row">
					<div class="input-field col s6">
						<input id="name" name="name" type="text" class="validate">
						<label for="name" class="">Username</label>
					</div>
					<div class="input-field col s6">
						<input id="password" name="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
					<p class="input-field col s6">
						<input type="checkbox" class="filled-in" id="remember" name="remember" checked="checked">
						<label for="remember">Remember Me</label>
					</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-action modal-close btn blue waves-effect waves-light blue">Log In</button>
				<a href="#!" class="modal-action modal-close waves-effect btn-flat">Cancel</a>
			</div>
		</form>
	</div>

	<div id="searchModal" class="modal">
		<form class="form col s12" role="form" method="get" action="/search">
			<div class="modal-content">
				<h4>Search</h4>
				<div class="row">
					<div class="input-field col s12">
						<input id="q" name="q" placeholder="Tomorrow With You" type="text" class="validate">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-action modal-close btn blue waves-effect waves-light blue">Search</button>
				<a href="#!" class="modal-action modal-close waves-effect btn-flat">Cancel</a>
			</div>
		</form>
	</div>

	<div class="fixed-action-btn">
		<a class="btn-floating btn-large red z-depth-2">
			<i class="large material-icons">person_pin</i>
		</a>
		<ul>
			<li>
				<a href="#" class="btn-floating blue darken-3 tooltipped pulse" data-position="left" data-delay="50" data-tooltip="Join our Discord!"><img src="/img/discord.png" width="22" style="padding-top: 12px;"></a>
			</li>
		</ul>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.1/SmoothScroll.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".button-collapse").sideNav();
			$('.modal').modal();
			$('.slider').slider();
			$('.parallax').parallax();
			@if (Request::is('/'))
				@if ($firstVisit)
					Materialize.toast('Welcome to the new Sunbae!', 4000)
					{{ Cookie::queue('visit', '1', 60*24*365) }}
				@endif
			@endif
		});
	</script>
</body>

</html>
