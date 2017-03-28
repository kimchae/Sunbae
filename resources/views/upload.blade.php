@extends('layouts.master')
@section('pageTitle', 'Contribute to our Listing')

@section('content')
	<div class="row">
		<div class="col s12">
			<div class="card-panel content" style="@if (Request::get('step') == 3) min-height: 800px; @endif">
				<div class="titleSpace">
					<h4>Contribute to Sunbae</h4>
					<small>대박! You're turning into a contributor. :)</small>
				</div>
				@if (!Request::get('step'))
					<p>Hey There, {{ Auth::user()->name }}! Glad that you're interested in contributing to {{ config('app.name') }}. Please make sure that the information you provide is correct. Your entries will need to be approved until you are trusted enough to not require it. </p>
					<p>To get started, please search and select the show you would like to add to. If the show does not exist in our database, fear not; you will be given the option to add it to the listing.</p>
					<form class="form col s12" role="form" method="GET" action="/upload">
						<div class="row">
                            <div class="input-field col s12">
								<label for="q">Show Name</label>
                                <input placeholder="Tomorrow With You" id="q" name="q" value="{{ old('name') }}" type="text" class="validate{{ $errors->has('name') ? ' invalid' : '' }}" required autofocus>
								<input type="hidden" name="step" value="2" />
							</div>
                        </div>
						<button type="submit" class="btn blue waves-effect waves-light right">Search</button>
					</form>
				@elseif (Request::get('step') == '2' && Request::get('q'))
					<p>Oh damn, {{ Auth::user()->name }}! You made it to step 2 of the uploading process. If you have more than 1 episode to submit, feel free to contact me on Discord so that you won't have to go through this process. </p>
					<p>Please click on the correct show below.</p>

					@foreach ($results as $result)
						<div class="card horizontal hoverable">
							<div class="card-image">
								<a href="/upload?step=3&amp;id={{ $result->id }}"><img src="/img/posters/{{ $result->id }}.jpg" width="10%"></a>
							</div>
							<div class="card-stacked">
								<div class="card-content" style="width:100%">
									<a href="/upload?step=3&amp;id={{ $result->id }}"><h5>{{ $result->name }}</h5></a>
									<p>{{ limit_text($result->synopsis, 70) }}</p>
								</div>
							</div>
						</div>
					@endforeach
					@if ($results->count() == 0)
						<p>No Results Found. Proceed only if you have made sure there isn't an existing entry.</p>
					@endif
						<p>If you cannot find the correct show above, enter in the <a href="http://thetvdb.com/">TVDB</a> id below for the correct one (You can find it by searching the show on tvdb and copying the numbers at the end of the url).</p>
						<form class="form col s12" role="form" method="GET" action="/upload">
							<div class="row">
	                            <div class="input-field col s12">
									<label for="tvdb">TVDB ID</label>
	                                <input placeholder="317155" id="tvdb" name="tvdb" value="{{ old('name') }}" type="text" class="validate{{ $errors->has('name') ? ' invalid' : '' }}" required>
									<input type="hidden" name="step" value="3" />
								</div>
	                        </div>
							<button type="submit" class="btn blue waves-effect waves-light right">Submit</button>
						</form>
						<div><p class="center">If you enter an invalid entry, you may be suspended from the site.</p></div>
				@elseif (Request::get('step') == '3' && Request::get('tvdb') || Request::get('id'))
					<p>Almost there! You just need to provide a few details first. Also make sure that the episode provided already has subs. If you would like to submit an episode without subs and are planning on adding subs, contact me via Discord.</p>
					@if (Request::get('tvdb'))
						@if (true)
							WIP. Contact ddolpali.
						@else
						<form class="form col s12" role="form" method="GET" action="/upload">
							<input type="hidden" name="step" value="4" />
							<input type="hidden" name="tvdb" value="{{ Request::get('tvdb') }}" />
							<input type="hidden" name="uploader" value="{{ Auth::user()->name }}" />
							<div class="row">
								<div class="input-field col s12">
									<label>Show Name</label>
									<input value="boop" id="name" name="name" type="text" class="validate{{ $errors->has('name') ? ' invalid' : '' }}" readonly="readonly">
								</div>
								<div class="input-field col s12">
									<label for="tvdb">Alternative Name (Optional)</label>
									<input value="boop" id="altname" name="altname" type="text" class="validate{{ $errors->has('altname') ? ' invalid' : '' }}">
								</div>

								<div class="input-field col s12">
									<label>Episode Number</label>
									<input type="number" name="number" min="1" max="500">
								</div>
								<div class="input-field col s12">
									<label for="encoder">Encoder</label>
									<input value="NEXT" id="encoder" name="encoder" type="text" class="validate" required>
								</div>
								<div class="input-field col s12">
									  <input name="type" type="radio" id="1" checked />
									  <label for="1">Drama</label><br>
									  <input name="type" type="radio" id="2" />
									  <label for="2">Variety</label><br>
									  <input name="type" type="radio" id="3" />
									  <label for="3">Movie</label><br>
								</div>
								<div class="input-field col s12">
								      <input name="quality" type="radio" id="1080" checked />
								      <label for="1080">1080p</label><br>
								      <input name="quality" type="radio" id="720" />
								      <label for="720">720p</label><br>
							 	</div>
							<button type="submit" class="btn blue waves-effect waves-light right">Submit</button>
						</div>
						</form>
						<p class="center">If you enter an invalid entry, you may be suspended from the site.</p>
					@endif
					@else
						<p><b>Before you continue, please message the bot on our discord the following message:</b><br>!auth-verify {{ $key }}</p>
						<form class="form col s12" role="form" method="GET" action="/upload">
							<input value="4" name="step" type="hidden" class="validate" required>
							<input value="{{ $key }}" name="key" type="hidden" class="validate" required>
							<input value="{{ Request::get('id') }}" name="id" type="hidden" class="validate" required>
							<input value="{{ Auth::user()->name }}" name="uploader" type="hidden" class="validate" required>
							<div class="input-field col s12">
								<div class="input-field col s12">
									<label>Show Name</label>
									<input value="{{ $show->name }}" id="name" name="name" type="text" class="validate" readonly="readonly">
								</div>
								<div class="input-field col s12">
									<label>Episode Number</label>
									<input type="number" name="number" min="1" max="1200" required>
								</div>
								<div class="input-field col s12">
									<label>Encoder</label>
									<input value="NEXT" name="encoder" type="text" class="validate" required>
								</div>
								<div class="input-field col s12">
									<label>Drive ID</label>
									<input value="" placeholder="0B6k0LFRdpmEORkpKMUhhOWFqMkE" name="drive" type="text" class="validate" required>
								</div>
								<input value="1080" name="quality" type="radio" id="1080" checked />
								<label for="1080">1080p</label><br>
								<input value="720" name="quality" type="radio" id="720" />
								<label for="720">720p</label><br>
							</div>
							<button type="submit" class="btn blue waves-effect waves-light right">Submit</button>
						</form>
					@endif
				@elseif (Request::get('step') == '4' && Request::get('uploader') || Request::get('encoder'))
					<p>Submitted request.</p>
				@endif
			</div>
		</div>
	</div>
@endsection
