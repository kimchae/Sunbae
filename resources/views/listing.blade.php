@extends('layouts.master')
@section('pageTitle', '1080p Korean '.ucfirst(Request::segment(2)).' Stream - Listing')

@section('content')
	<h4>{{ $type }} Listing</h4>
	Sort By:
	<div class="sort">
		<div class="hide-on-small-only">
			<a href="?sort=name" class="waves-effect waves-light btn blue"@if (!Request::get('sort')||(Request::get('sort') == "name" && Request::get('order') != "desc"))disabled @endif>ABC</a>
			<a href="?sort=name&amp;order=desc" class="waves-effect waves-light btn blue"@if (Request::get('sort') == "name" && Request::get('order') == "desc")disabled @endif>ZYX</a>
			<a href="?sort=airdate&amp;order=desc" class="waves-effect waves-light btn blue"@if (Request::get('sort') == "airdate" && Request::get('order') == "desc")disabled @endif>New</a>
			<a href="?sort=airdate" class="waves-effect waves-light btn blue"@if (Request::get('sort') == "airdate"  && Request::get('order') != "desc")disabled @endif>Old</a>
		</div>
		<div class="hide-on-med-and-up">
			<a href="#" class='dropdown-button btn blue' data-activates='filterDrop'>
				@if (!Request::get('sort')||(Request::get('sort') == "name" && Request::get('order') != "desc"))
					A-Z
				@elseif (Request::get('sort') == "name" && Request::get('order') == "desc")
					Z-A
				@elseif (Request::get('sort') == "airdate" && Request::get('order') == "desc")
					Newest
				@else
					Oldest
				@endif
			</a>
			<ul id='filterDrop' class='dropdown-content'>
			  <li><a href="?sort=name">A-Z</a></li>
			  <li><a href="?sort=name&amp;order=desc">Z-A</a></li>
			  <li><a href="?sort=airdate&amp;order=desc">Newest</a></li>
			  <li><a href="?sort=airdate">Oldest</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		@foreach ($shows as $show)
			<div class="col s6 m3">
				<div class="card rounded hoverable">
					<a href="/{{ $show->type == 1 ? 'drama' : ($show->type == 2 ? 'variety' : 'movie') }}/{{ $show->slug }}">
						<div class="card-image">
							<img src="/img/posters/{{ $show->id }}.jpg">
						</div>
						<div class="card-action center truncate">
							{{ $show->name }}
						</div>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	{{ $shows->appends(Request::except('page'))->links('layouts.paginate') }}

@endsection
