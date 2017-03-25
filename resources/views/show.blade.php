@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col s12">
			<div class="card-panel content">
				<div class="hide-on-med-and-up">
					<img src="/img/covers/{{ $show->id }}.jpg" width="100%">
					<div class="titleSpace">
						<h4 style="margin-bottom: 0">{{ $show->name }}</h4>
						<small>{{ $show->altname }}</small>
					</div>
					<p>{{ $show->synopsis }}</p>
				</div>
				<div class="row">
					<div class="col m9 hide-on-small-only">
						<div class="titleSpace">
							<h4 style="margin-bottom: 0">{{ $show->name }}</h4>
							<small>{{ $show->altname }}</small>
						</div>
						<p>{{ $show->synopsis }}</p>
					</div>
					<div class="col m3 hide-on-small-only">
						<img src="/img/posters/{{ $show->id }}.jpg" width="100%">
					</div>
				</div>
				<div class="ep-content">
					<h5 class="center">Episodes</h5>
					<table class="highlight responsive-table centered">
  						<thead>
							<tr>
								<th></th>
								<th>Upload Date</th>
								<th>Encoder</th>
								<th>Uploader</th>
							</tr>
  						</thead>
  						<tbody>
							@foreach ($show->episodes as $episode)
								<tr>
		  							<td><a href="/{{ $show->type == 1 ? 'drama' : ($show->type == 2 ? 'variety' : 'movie') }}/{{ $show->slug }}/{{ $episode->number }}">Episode {{ $episode->number }}
										@if ($episode->subbed)
											<span data-badge-caption="Subbed" class="new badge blue"></span>
										@else
											<span data-badge-caption="Raw" class="new badge red"></span>
										@endif
									</a></td>
		  							<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $episode->date)->format('Y-m-d') }}</td>
		  							<td>{{ $episode->encoder }}</td>
									<td>{{ $episode->uploader }}</td>
								</tr>
							@endforeach
  						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
