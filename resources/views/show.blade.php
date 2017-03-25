@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col s12">
			<div class="card-panel content">
				<div class="col m8">
					<div class="titleSpace">
						<h4 style="margin-bottom: 0">{{ $show->name }}</h4>
						<small>{{ $show->altname }}</small>
					</div>
				</div>
				<div class="col m4">
					<img src="/img/posters/{{ $show->id }}.jpg" width="100%">
				</div>
			</div>
		</div>
	</div>
@endsection
