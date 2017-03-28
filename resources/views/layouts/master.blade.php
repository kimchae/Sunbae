@php
	$theme = Cookie::get('theme');
	if (!$theme)
		$theme = 'light';
	switch ($theme)
	{
		default:
		case 'light':
			$primary = 'white';
			$highlight = 'blue darken-3';
			break;
		case 'dark':
			$primary = 'grey darken-4';
			$highlight = 'red darken-3';
			break;
	}
@endphp
<!DOCTYPE html>
<html>

<head>
	<title>@yield('pageTitle', 'Stream 1080p HD Korean Shows') | Sunbae</title>
	<meta charset="UTF-8">
	<meta name="description" content="@yield('pageDesc', 'Sunbae is a website dedicated to providing HD 1080p/720p streams for Korean Dramas and Variety Shows.')">
	<meta name="keywords" content="@yield('tags', 'Sunbae'),Korean Drama,KDrama,Korean Variety">
	<meta name="author" content="ddolpali">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />
	@if (Cookie::get('theme'))
		<link type="text/css" rel="stylesheet" href="/css/style.{{ Cookie::get('theme') }}.css?ver=2" media="screen,projection" />
	@else
		<link type="text/css" rel="stylesheet" href="/css/style.light.css?ver=2" media="screen,projection" />
	@endif
	<link href="https://fonts.googleapis.com/css?family=Oswald|Lato" rel="stylesheet">
	<link rel="icon" type="image/png" href="/img/favicon.jpg">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<header @if (!Request::is('/'))class="z-depth-1" @endif>
		<nav class="{{ $primary }}">
			<div class="nav-wrapper">
				<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons" id="menu">menu</i></a>
				<a href="/" class="brand-logo">{{ lcfirst(config('app.name')) }}</a>
				<ul class="hide-on-med-and-down left" id="nav">
					<li{!! set_active(['listing', 'listing/drama', 'drama/*']) !!}><a href="/listing/drama">Drama</a></li>
					<li{!! set_active(['listing/variety', 'variety/*']) !!}><a href="/listing/variety">Variety</a></li>
					<li{!! set_active(['listing/movies', 'movie/*']) !!}><a href="/listing/movies">Movies</a></li>
					<li{!! set_active(['soundtrack', 'soundtrack/*']) !!}><a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="In Construction">Soundtrack</a></li>
				</ul>
				<ul class="hide-on-med-and-down right">
					<li{!! set_active('search') !!}><a href="#searchModal"><i class="material-icons">search</i></a></li>
					@if (Auth::check())
						<li><a href="/logout" class="waves-effect waves-light btn primary {{ $highlight }}">Logout</a></li>
					@else
						<li><a href="/register" style="margin-right: 0;" class="waves-effect waves-light btn primary {{ $highlight }}">Register</a></li>
						<li><a href="#login" id="loginBtn" class="waves-effect waves-light btn primary {{ $highlight }}">Log In</a></li>
					@endif
				</ul>

				<ul class="side-nav" id="mobile-nav">
					<li{!! set_active(['listing', 'listing/drama', 'drama/*']) !!}><a href="/listing/drama">Drama</a></li>
					<li{!! set_active(['listing/variety', 'variety/*']) !!}><a href="/listing/variety">Variety</a></li>
					<li{!! set_active(['listing/movies', 'movie/*']) !!}><a href="/listing/movies">Movies</a></li>
					<li{!! set_active(['soundtrack', 'soundtrack/*']) !!}><a href="#">Soundtrack</a></li>
					<li{!! set_active('search') !!}><a href="/search">Search</a></li>
					@if (Auth::check())
						<li><a href="/logout">Log Out</a></li>
	                @else
						<li{!! set_active('register') !!}><a href="/register">Register</a></li>
	                    <li{!! set_active('login') !!}><a href="/login">Login</a></li>
	                @endif
				</ul>
			</div>
		</nav>
		@if (Request::is('/'))
			<div class="slider">
				<ul class="slides z-depth-2">
					@foreach ($featured as $show)
						<li>
							<img src="img/covers/{{ $show->id }}.jpg">
							<div class="caption center-align">
								<h3>{{ $show->name }}</h3>
								<p>{{ preg_replace('/([^?!.]*.).*/', '\\1', $show->synopsis) }}</p>
								<a href="/{{ $show->type == 1 ? 'drama' : ($show->type == 2 ? 'variety' : 'movie') }}/{{ $show->slug }}" class="btn {{ $highlight }} waves-effect waves-light">Watch Now</a>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		@else
			@include('layouts.breadcrumb')
		@endif
	</header>

	<main class="container">
		@yield('content')
	</main>

	<footer class="page-footer footer-copyright grey darken-4">
		<div class="container white-text center">
			&copy; {{ config('app.name') }} 2016-2017.
		</div>
	</footer>

	<div id="login" class="modal">
		<form class="form col s12" role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
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
				<button type="submit" class="modal-action modal-close btn {{ $highlight }} waves-effect waves-light {{ $highlight }}">Log In</button>
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
						<input id="q" name="q" placeholder="Tomorrow With You" type="text" class="validate" autofocus>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-action modal-close btn {{ $highlight }} waves-effect waves-light {{ $highlight }}">Search</button>
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
				<a href="{{ config('app.discord') }}" class="btn-floating {{ $highlight }} tooltipped pulse" data-position="left" data-delay="50" data-tooltip="Join our Discord!"><img src="/img/discord.png" width="22" style="padding-top: 12px;"></a>
			</li>
			<li>
				@if ($theme == 'light')
					<a href="/theme/dark" class="btn-floating grey darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="Dark Theme"><i class="material-icons">label_outline</i></a>
				@else
					<a href="/theme/light" class="btn-floating white darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="White Theme"><i class="material-icons grey">label_outline</i></a>
				@endif
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
			$('select').material_select();

			@if (Request::is('/'))
				@if ($firstVisit)
					Materialize.toast('Welcome to the new Sunbae!', 4000, 'rounded')
					{{ Cookie::queue('visit', '1', 60*24*365) }}
				@endif
			@endif
			@if (!\Request::is('/login') && !\Request::is('/register'))
				@if($errors->has('name') || $errors->has('password'))
					Materialize.toast('{{ $errors->first() }}', 4000, 'rounded')
				@endif
			@endif
		});
	</script>
</body>

</html>
