@extends('layouts.app')

@section('meta')
	<meta property="og:site_name" content="Anonity &mdash; More than your stories...">
	<meta property="og:title" content="{{ $genre->exists ? $genre->title : '' }} Stories &mdash; {{ config('app.name', 'Anonity') }}" />
	<meta property="og:description" content="{{ $genre->exists ? $genre->title : '' }} Stories. Write your stories anonymously on Anonity.in. More than your stories..." />
	<meta property="og:image" itemprop="image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xat1/v/t1.0-1/p160x160/14485154_160405557749509_2016438093313562050_n.png?oh=470f3d11aeb264b8df763b6f91282704&oe=586E8E18&__gda__=1487472191_1ee29598a99199a64f876e6d2756c0a2">
	<meta property="og:type" content="website" />
@endsection

@section('title')
	@if($genre->exists)
		{{ $genre->title }}
	@endif
	 Stories &mdash; 
	 {{ config('app.name', 'Anonity') }} 
@endsection

@section('content')
	<div class="row">
		@include('stories.create')
		<div class="col-md-8 col-md-pull-4">
			<h3>
				<a href="{{ route('stories.index') }}">Stories</a>
				@if($genre->exists)
					<small>&mdash; {{ $genre->title }}</small>
				@endif
			</h3>

			<ul class="nav nav-tabs">
				<li class="{{ request()->exists('popular') ? '' : 'active' }}"><a href="{{ request()->url() }}">Most Recent</a></li>
				<li class="{{ request()->exists('popular') ? 'active' : '' }}"><a href="?popular">Most Popular</a></li>
			</ul>
			
			@include('stories.list')
		</div>
	</div>
@stop