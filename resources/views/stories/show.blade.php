@extends('layouts.app')

@section('meta')
	<meta property="og:site_name" content="Anonity &mdash; More than your stories...">
	<meta property="og:title" content="{{ $story->title }} &mdash; by {{ $story->author->private_account ? $story->author->screen_name : $story->author->name  }}" />
	<meta property="og:description" content="{{ str_limit($story->body) }}" />
	<meta property="og:image" itemprop="image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xat1/v/t1.0-1/p160x160/14485154_160405557749509_2016438093313562050_n.png?oh=470f3d11aeb264b8df763b6f91282704&oe=586E8E18&__gda__=1487472191_1ee29598a99199a64f876e6d2756c0a2">
	<meta property="og:type" content="website" />
@endsection

@section('title') {{ $story->title }} &mdash; by {{ $story->author->private_account ? $story->author->screen_name : $story->author->name  }} @endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<h1>{{ $story->title }}</h1>
			<span>
				<a href="{{ url('genres', $story->genre->slug) }}" class="label label-default" style="background-color: {{ $story->genre->color }}">
					{{ $story->genre->title }}</a>
			</span>
		</div>

		<div class="col-md-6 text-right">
			<div class="h3">
				<small>
					By: <a href="{{ route('users.show', $story->author->screen_name) }}">
							{{ $story->author->screen_name }}</a>
				</small>
				<small>{{ $story->created_at->diffForHumans() }}</small>
			</div>
		</div>
	</div>
	<hr>
	@if ($story->votes->count())
		<div class="row">
			<div class="col-md-2 col-sm-6 col-xs-6">
				<form action="/votes/{{ $story->slug }}" method="POST">
						{{ csrf_field() }}
						<button class="like-button" {{ Auth::guest() || ! Auth::user()->verified ? 'disabled' : '' }}><i class="glyphicon {{ Auth::check() && Auth::user()->votedFor($story) ? 'glyphicon-heart' : 'glyphicon-heart-empty' }}"></i></button><span class="text-sm text-muted">{{ $story->votes->count() }} Like{{ $story->votes->count() == 1 ? '' : 's' }}</span>
					</form>	
			</div>
			<div class="col-md-10 col-sm-6 col-xs-6">
				@foreach($story->votes->take(6) as $vote)
					<a href="{{ route('users.show', $vote->user->screen_name) }}">{{ $vote->user->screen_name }}</a>{{ $loop->remaining ? ',' : '' }}
				@endforeach
				@if ($story->votes->count() > 6)
					and <a href="#" data-toggle="modal" data-target="#likes">{{ $story->votes->count() - 6 }} other(s)</a>
				@endif
				liked this.
			</div>
		</div>
		<hr>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-body story-body">
					<p>{!! nl2br($story->body) !!}</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="likes" tabindex="-1" role="dialog" aria-labelledby="likesLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="likesLabel">Users Who Liked</h4>
				</div>
				<div class="modal-body">
					<ul class="list-group">
						@foreach($story->votes as $vote)
							<li class="list-group-item">
								<a href="{{ route('users.show', $vote->user->screen_name) }}">{{ $vote->user->screen_name }}</a>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@stop