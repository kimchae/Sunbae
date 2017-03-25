@extends('layouts.master')

@section('content')
	<h4 id="recent-uploads">Recent Uploads</h4>
	<div class="row">
		@foreach ($latest as $episode)
			<div class="col s6 m3">
				<div class="card rounded hoverable">
					<a href="/{{ $episode->show->type == 1 ? 'drama' : ($episode->show->type == 2 ? 'variety' : 'movie') }}/{{ $episode->show->slug }}/{{ $episode->number }}">
						<div class="card-image">
							<img src="img/posters/{{ $episode->show_id }}.jpg">
						</div>
						<div class="card-action center ep-card truncate">
							<div id="dname">{{ $episode->show->name }}</div>
							Episode {{ $episode->number }} @if ($episode->subbed)Subbed @endif<br>
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
					<a href="/{{ $drama->type == 1 ? 'drama' : ($drama->type == 2 ? 'variety' : 'movie') }}/{{ $drama->slug }}">
						<div class="card-image">
							<img src="img/posters/{{ $drama->id }}.jpg">
						</div>
						<div class="card-action center truncate" id="dname">
							{{ $drama->name }}
						</div>
					</a>
				</div>
			</div>
		@endforeach
	</div>
@endsection
