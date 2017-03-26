<nav class="white z-depth-1 breadcrumb-nav">
	<div class="nav-wrapper">
		<div class="col s12">
			<a href="/" class="breadcrumb">Sunbae</a>
			@if (Request::is('listing/*') || Request::is('listing'))
				<a class="breadcrumb">{{ $show->type == 1 ? 'Drama' : ($show->type == 2 ? 'Variety' : 'Movie') }}</a>
				<a class="breadcrumb">Listing</a>
			@elseif (Request::is('upload'))
				<a class="breadcrumb">Upload</a>
			@elseif (Request::is('search'))
				<a class="breadcrumb">Search</a>
			@elseif (Request::is('register'))
				<a class="breadcrumb">Register</a>
			@elseif (Request::is('login'))
				<a class="breadcrumb">Login</a>
			@elseif (Request::is('drama/*'))
				<a href="/drama/{{ $show->slug }}" class="breadcrumb">{{ $show->name }}</a>
				@if (Request::is('drama/'.$show->slug.'/*'))
					<a class="breadcrumb">Episode @yield('number', 'Special')</a>
				@endif
			@elseif (Request::is('variety/*'))
				<a href="/variety/{{ $show->slug }}" class="breadcrumb">{{ $show->name }}</a>
				@if (Request::is('variety/'.$show->slug.'/*'))
					<a class="breadcrumb">Episode @yield('number', 'Special')</a>
				@endif
			@elseif (Request::is('movie/*'))
				<a class="breadcrumb">{{ $show->name }}</a>
			@endif
		</div>
	</div>
</nav>
