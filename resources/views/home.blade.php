@extends('layouts.master')

@section('content')
	<h4 id="recent-uploads">Recent Uploads</h4>
	<div class="row">
		@foreach ($latest as $episode)
			<div class="col s6 m3">
				<div class="card rounded hoverable">
					<a href="#">
						<div class="card-image">
							<img src="img/posters/{{ $episode->show_id }}.jpg">
						</div>
						<div class="card-action center ep-card">
							<div id="dname">{{ $episode->show->name }}</div>
							Episode {{ $episode->number }}
						</div>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	<h4 id="on-going">On-Going Drama</h4>
	<div class="row">
		@foreach ($ongoing as $drama)
			<div class="col s6 m3">
				<div class="card rounded hoverable">
					<a href="#">
						<div class="card-image">
							<img src="img/posters/{{ $drama->id }}.jpg">
						</div>
						<div class="card-action center truncate">
							{{ $drama->name }}
						</div>
					</a>
				</div>
			</div>
		@endforeach
	</div>
@endsection
