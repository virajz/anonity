<div class="col-md-4 col-md-push-8">
	@if(Auth::check())
		@if (Auth::user()->verified)
			<h3>Add your story</h3>

			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{ route('stories.store') }}" method="POST">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('genre_id') ? ' has-error' : '' }}">
							<label for="genre_id">Genere</label>
							<select name="genre_id" id="genre_id" class="form-control">
								<option selected disabled>Pick a genere...</option>
								@foreach($genres as $genre)
									<option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->title }}</option>
								@endforeach
							</select>
							@if ($errors->has('genre_id'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('genre_id') }}</strong>
		                        </span>
		                    @endif
						</div>

						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title">Title of your story</label>
							<input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required autofocus>
							@if ($errors->has('title'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
		                    @endif
						</div>

						<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
							<label for="body">Your story</label>
							<textarea name="body" id="body" cols="30" rows="10" class="form-control" maxlength="15000" required>{{ old('body') }}</textarea>

							<span class="help-block"><small>15000 charactes max</small></span>

		                    @if ($errors->has('body'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('body') }}</strong>
		                        </span>
		                    @endif
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Add Story</button>
						</div>
					</form>
				</div>
			</div>
		@else
			<h6>Please verify your email to get full access of site.</h6>
		@endif
	@else
		<h3>Please <a href="{{ url('login') }}">Sign in</a> to add story</h3>
	@endif
</div>
