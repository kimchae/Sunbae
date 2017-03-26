@extends('layouts.master')

@section('number', $episode->number)

@section('content')
	<div class="row">
		<div class="col s12">
			<div class="card-panel" style="margin-top: 3%;">
				<div class="titleSpace">
					<h5 style="margin-bottom: 0">{{ $title }}</h5>
					<small>{{ $episode->quality }}p {{ $episode->subbed ? 'Subbed' : 'Raw' }}</small>
				</div>
				<div class="video-container">
					<iframe src="https://drive.google.com/file/d/{{ $episode->drive }}/preview" allowfullscreen></iframe>
					<div class="poop"></div>
				</div>
				<div class="eplinks center-align">
					@if ($epPrev)
						<a href="/{{ $show->type == 1 ? 'drama' : ($show->type == 2 ? 'variety' : 'movie') }}/{{ $show->slug }}/episode-{{ $epPrev->number }}" class="left">Episode {{ $epPrev->number }}</a> 
					@endif
					<a href="/{{ $show->type == 1 ? 'drama' : ($show->type == 2 ? 'variety' : 'movie') }}/{{ $show->slug }}">Go Back to Info Page</a>
					@if ($epNext)
						<a href="/{{ $show->type == 1 ? 'drama' : ($show->type == 2 ? 'variety' : 'movie') }}/{{ $show->slug }}/episode-{{ $epNext->number }}" class="right">Episode {{ $epNext->number }}</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
