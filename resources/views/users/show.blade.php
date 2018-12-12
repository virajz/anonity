@extends('layouts.app')

@section('meta')
	<meta property="og:site_name" content="Anonity &mdash; More than your stories...">
	<meta property="og:title" content="{{ $user->private_account ? $user->screen_name : $user->name  }} &mdash; {{ config('app.name', 'Anonity') }}" />
	<meta property="og:description" content="{{ str_limit($user->description) }}" />
	<meta property="og:image" itemprop="image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xat1/v/t1.0-1/p160x160/14485154_160405557749509_2016438093313562050_n.png?oh=470f3d11aeb264b8df763b6f91282704&oe=586E8E18&__gda__=1487472191_1ee29598a99199a64f876e6d2756c0a2">
	<meta property="og:type" content="website" />
@endsection

@section('title') {{ $user->private_account ? $user->screen_name : $user->name  }} &mdash; {{ config('app.name', 'Anonity') }} @endsection

@section('content')
	<div class="well">
		<div class="row">
			@unless ($user->private_account)
				<div class="col-md-6">
					<dl class="dl-horizontal">
						<dt>Name:</dt>
						<dd>{{ $user->name }}</dd>
						<dt>Email:</dt>
						<dd>{{ $user->email }}</dd>
						@if ($user->link)
							<dt>Website:</dt>
							<dd><a href="{{ $user->link }}" target="_blank">Visit URL</a> <small>(might be unsafe)</small></dd>
						@endif
					</dl>
				</div>
			@endunless
			<div class="col-md-6">
				<dl class="dl-horizontal">
					<dt>Screen Name: </dt>
					<dd>{{ $user->screen_name }}</dd>
					<dt>Total Published Stories: </dt>
					<dd>{{ $user->publishedStories->count() }}</dd>
					@if($user->description)
						<dt>About Author:</dt>
						<dd>{{ $user->description }}</dd>
					@endif
				</dl>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			{{-- <h3>
				{{ request()->exists('favorites') ? 'Favorite' : 'Recent' }} Stories
			</h3> --}}
			<ul class="nav nav-tabs">
				<li class="{{ request()->exists('favorites') ? '' : 'active' }}"><a href="{{ request()->url() }}">Most Recent</a></li>
				<li class="{{ request()->exists('favorites') ? 'active' : '' }}"><a href="?favorites">Liked Stories</a></li>
			</ul>
			@include('stories.list')
		</div>
	</div>
@stop