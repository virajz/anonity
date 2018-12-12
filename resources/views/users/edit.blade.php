@extends('layouts.app')

@section('title') Edit Details @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', Auth::user()->screen_name) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('screen_name') ? ' has-error' : '' }}">
                            <label for="screen_name" class="col-md-4 control-label">Your Screen Name</label>

                            <div class="col-md-6">
                                <input id="screen_name" type="text" class="form-control" name="screen_name" value="{{ old('screen_name') ? old('screen_name') : $user->screen_name }}" required>

                                @if ($errors->has('screen_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('screen_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Website Link</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{ old('link') ? old('link') : $user->link }}">

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">About You</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" maxlength="300">{{ old('description') ? old('description') : $user->description }}</textarea>

                                <span class="help-block"><small>300 charactes max</small></span>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="col-md-4 control-label">Keep account private?</label>

                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="private_account" {{ $user->private_account ? 'checked' : '' }}>Yes, Please.
                                    </label>
                                </div>

                                <span class="help-block">
                                    For private accounts Name, Email, Website Link is not shown to other users.
                                </span>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Details
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
