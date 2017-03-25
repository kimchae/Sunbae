@extends('layouts.master')

@section('content')
	<h4>{{ $type }} Listing</h4>
	<div class="sort">
		Sort By:
		<a href="?sort=name" class="waves-effect waves-light btn blue"@if (!Request::get('sort')||(Request::get('sort') == "name" && Request::get('order') != "desc"))disabled @endif>ABC</a>
		<a href="?sort=name&amp;order=desc" class="waves-effect waves-light btn blue"@if (Request::get('sort') == "name" && Request::get('order') == "desc")disabled @endif>ZYX</a>
		<a href="?sort=airdate&amp;order=desc" class="waves-effect waves-light btn blue"@if (Request::get('sort') == "airdate" && Request::get('order') == "desc")disabled @endif>New</a>
		<a href="?sort=airdate" class="waves-effect waves-light btn blue"@if (Request::get('sort') == "airdate"  && Request::get('order') != "desc")disabled @endif>Old</a>
	</div>
	<div class="row">
		@foreach ($shows as $show)
			<div class="col s6 m3">
				<div class="card rounded hoverable">
					<a href="#">
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
