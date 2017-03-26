@extends('layouts.master')

@section('content')
    <div class="row">
		<div class="col s12">
			<div class="card-panel" style="margin-top: 3%;">
                <h5>Register</h5>
                <div class="row">
                    @if($errors->has('name') || $errors->has('email') || $errors->has('password'))
                        <div class="" style="padding-left: 3%; color: #d43f3a;">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form class="form login-form col s12" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="omoJisooOppa" id="name" name="name" type="text" class="validate{{ $errors->has('name') ? ' invalid' : '' }}" required autofocus>
                                <label for="name">Enter a Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="aigooooo" id="password" name="password" type="password" class="validate{{ $errors->has('password') ? ' invalid' : '' }}" required>
                                <label for="password">Enter a Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="aigooooo" id="password-confirm" name="password_confirmation" type="password" class="validate{{ $errors->has('password') ? ' invalid' : '' }}" required>
                                <label for="password-confirm">Confirm your Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="koreanumberwon@aim.com" id="email" name="email" type="email" class="validate{{ $errors->has('email') ? ' invalid' : '' }}" required>
                                <label for="email" data-error="Incorrect email.">Enter a Valid Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 offset-m4">
                                {!! app('captcha')->display(); !!}<br>
                            </div>
                        </div>
                        <div class="row center">
                            <button type="submit" class="btn blue darken-3 waves-effect waves-light">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
