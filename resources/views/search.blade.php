@extends('layouts.master')

@section('content')
	@if (!Request::get('q'))
		<h4>Search</h4>
		<div class="row">
	      <div class="col s12">
	        <div class="card-panel" style="padding: 5% 10%">
				<form class="form" role="form" method="get" action="/search">
		  	  		<div class="row">
		  	  			<div class="input-field">
		  	  				<input id="q" name="q" placeholder="Tomorrow With You" type="text" class="validate">
		  	  			</div>
						<button type="submit" class="modal-action modal-close btn blue waves-effect waves-light blue right">Search</button>
		  	  		</div>
		  	  	</form>
	        </div>
	      </div>
	    </div>
	@else
		<div class="col s12 m7">
		  	<h4 class="header">Search Results</h4>
			You searched for "{{ Request::get('q') }}"
			@foreach ($results as $result)
			  	<div class="card horizontal hoverable">
					<div class="card-image">
				  		<a href="#"><img src="/img/posters/{{ $result->id }}.jpg" width="10%"></a>
					</div>
					<div class="card-stacked">
					  	<div class="card-content" style="width:100%">
							<a href="#"><h5>{{ $result->name }}</h5></a>
							<p>{{ limit_text($result->synopsis, 70) }}</p>
						</div>
					</div>
			  	</div>
			@endforeach
			{{ $results->appends(Request::except('page'))->links('layouts.paginate') }}
		</div>
	@endif
@endsection
