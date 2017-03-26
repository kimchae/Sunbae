@extends('layouts.master')

@section('number', $episode->number)

@section('content')
	<div class="row">
		<div class="col s12">
			<div class="card-panel content">
				<div class="titleSpace">
					<h5 style="margin-bottom: 0">{{ $title }}</h5>
					<small>{{ $episode->quality }}p {{ $episode->subbed ? 'Subbed' : 'Raw' }}</small>
				</div>
				<div class="video-container">
					<iframe src="https://drive.google.com/file/d/{{ $episode->drive }}/preview" allowfullscreen></iframe>
					<div class="poop"></div>
				</div>
			</div>
		</div>
	</div>
@endsection
