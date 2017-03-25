<!DOCTYPE html>
<html>

<head>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection" />

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
					<li><a href="sass.html">Drama</a></li>
					<li><a href="badges.html">Variety</a></li>
					<li><a href="sass.html">Movies</a></li>
					<li><a href="collapsible.html">Soundtrack</a></li>
				</ul>
				<ul class="hide-on-med-and-down right">
					<li><a href="sass.html"><i class="material-icons">search</i></a></li>
					<li><a href="#login" id="loginBtn" class="waves-effect waves-light btn primary blue darken-1">Log In</a></li>
				</ul>

				<ul class="side-nav" id="mobile-nav">
					<li><a href="sass.html">Drama</a></li>
					<li><a href="badges.html">Variety</a></li>
					<li><a href="collapsible.html">Soundtrack</a></li>
					<li><a href="mobile.html">Search</a></li>
					<li><a href="/login">Login</a></li>
				</ul>
			</div>
		</nav>
		@if (Request::is('/'))
			<div class="slider">
				<ul class="slides z-depth-2">
					<li>
						<img src="img/covers/1.jpg">
						<div class="caption center-align">
							<h3>Tomorrow With You</h3>
							<p>A series about Yoo So Joon, a time-traveler who tries to change his unfortunate fate by marrying Song Ma Rin.</p>
							<a class="btn blue darken-3 waves-effect waves-light">Watch Now</a>
						</div>
					</li>
					<li>
						<img src="img/covers/2.jpg">
						<div class="caption center-align">
							<h3>Strong Woman Do Bong-Soon</h3>
							<p>Sparks fly when a woman with Herculean strength goes to work as the bodyguard for a spoiled chaebol heir.</p>
							<a class="btn blue darken-3 waves-effect waves-light">Watch Now</a>
						</div>
					</li>
					<li>
						<img src="img/covers/3.jpg">
						<div class="caption right-align">
							<h3>Radiant Office</h3>
							<p>Ho Won is a young woman who struggles to find a steady job.</p>
							<a class="btn blue darken-3 waves-effect waves-light">Watch Now</a>
						</div>
					</li>
					<li>
						<img src="img/covers/4.jpg">
						<div class="caption left-align">
							<h3>Chief Kim</h3>
							<p>Kim Gwan-Chul used to work as an accountant, but now he works as a chief for a company.</p>
							<a class="btn blue darken-3 waves-effect waves-light">Watch Now</a>
						</div>
					</li>
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
				<button type="submit" class="modal-action modal-close btn blue waves-effect waves-light blue darken-3">Log In</button>
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
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.1/SmoothScroll.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".button-collapse").sideNav();
			$('.modal').modal();
			$('.slider').slider();
			$('.parallax').parallax();
			@if ($firstVisit)
				Materialize.toast('Welcome to the new Sunbae!', 4000)
				{{ Cookie::queue('visit', '1', 60*24*365) }}
			@endif
		});
	</script>
</body>

</html>