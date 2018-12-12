@extends('layouts.app')

@section('meta')
    <meta property="og:site_name" content="Anonity &mdash; More than your stories...">
    <meta property="og:title" content="Login &mdash; {{ config('app.name', 'Anonity') }}" />
    <meta property="og:description" content="Login. Write your stories anonymously on Anonity.in. More than your stories..." />
    <meta property="og:image" itemprop="image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xat1/v/t1.0-1/p160x160/14485154_160405557749509_2016438093313562050_n.png?oh=470f3d11aeb264b8df763b6f91282704&oe=586E8E18&__gda__=1487472191_1ee29598a99199a64f876e6d2756c0a2">
    <meta property="og:type" content="website" />
@endsection

@section('title')
     Login &mdash; 
     {{ config('app.name', 'Anonity') }} 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
