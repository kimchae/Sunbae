@extends('layouts.master')

@section('content')
    <div class="row">
		<div class="col s12">
			<div class="card-panel" style="margin-top: 3%;">
                <h5>Login</h5>
                <div class="row">
                    @if($errors->has('name') || $errors->has('password'))
                        <div class="" style="padding-left: 3%; color: #d43f3a;">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form class="form login-form col s12" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="xXFangBIad3Xx" id="name" name="name" value="{{ old('name') }}" type="text" class="validate{{ $errors->has('name') ? ' invalid' : '' }}" required autofocus>
                                <label for="name">Enter your Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="cha0ch33b@1" id="password" name="password" type="password" class="validate{{ $errors->has('password') ? ' invalid' : '' }}" required>
                                <label for="password">Enter your Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <input type="checkbox" class="filled-in" name="remember" checked="checked" />
                            <label for="remember">Remember Me</label>
                            <br><br>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn blue waves-effect waves-light">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
