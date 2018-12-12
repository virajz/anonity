@extends('layouts.app')

@section('title') Edit Story @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Story</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('stories.update', $story->slug) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('genre_id') ? ' has-error' : '' }}">
                            <label for="genre_id" class="col-md-4 control-label">Genere</label>
                            <div class="col-md-6">
                                <select name="genre_id" id="genre_id" class="form-control">
                                    <option selected disabled>Pick a genere...</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ $story->genre->id == $genre->id ? 'selected' : '' }}>{{ $genre->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('genre_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('genre_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title of your story</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $story->title }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Your story</label>

                            <div class="col-md-6">
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control" maxlength="15000">{{ old('body') ? old('body') : $story->body }}</textarea>

                                <span class="help-block"><small>15000 charactes max</small></span>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Story
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
