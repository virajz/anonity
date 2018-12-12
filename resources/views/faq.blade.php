@extends('layouts.app')

@section('meta')
	<meta property="og:site_name" content="Anonity &mdash; More than your stories...">
	<meta property="og:title" content="Frequently Asked Questions &mdash; {{ config('app.name', 'Anonity') }}" />
	<meta property="og:description" content="Frequently Asked Questions. Write your stories anonymously on Anonity.in. More than your stories..." />
	<meta property="og:image" itemprop="image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xat1/v/t1.0-1/p160x160/14485154_160405557749509_2016438093313562050_n.png?oh=470f3d11aeb264b8df763b6f91282704&oe=586E8E18&__gda__=1487472191_1ee29598a99199a64f876e6d2756c0a2">
	<meta property="og:type" content="website" />
@endsection

@section('title')
	 FAQs &mdash; 
	 {{ config('app.name', 'Anonity') }} 
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>What is Anonity?</h4>
				</div>
				<div class="panel-body">
					<p>
						Short answer. Anonymous Identity. Long answer. Well, for extroverts, it’s just another (less cluttered, yes Facebook and Twitter) social media platform to share your stories. For Introverts, it’s gold. Share your stories, pour your heart anonymously. No comments, no shares, no BS.
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>What is a private account?</h4>
				</div>
				<div class="panel-body">
					<p>
						Private account as mentioned, will never ever display your actual name, email, website link to anyone. Unless you change your privacy.
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Why I need to provide my email? (I know you will send spam)</h4>
				</div>
				<div class="panel-body">
					<p>
						As a human I need to verify that you’re human. Other than that it will be helpful to recover your password and site updates, which are applicable to you. And what’s the SPAM?
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Okay, so far so good and fancy, But what’s the catch? Will you ever charge?</h4>
				</div>
				<div class="panel-body">
					<p>
						As famous people say, The Best Things in Life Are Free. Therefore this site is free and will always be. (Yeah it’s from Facebook, so?). Besides I am the proud co-founder of <a href="http://qwesys.com" target="_blank">Qwesys Digital Solutions</a>. 
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Who built this not so good site? And why?</h4>
				</div>
				<div class="panel-body">
					<p>
						Hey! It’s me <a href="https://fb.com/virajz" target="_blank">Viraj Zaveri</a>. The idea behind building this site is to contribute to society, and build a platform to share, read people’s stories. Because I and someone closer to my <i class="glyphicon glyphicon-heart"></i> find it fascinating that people around us have so many untold, unrevealed stories that they want to share but never get a chance. 
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Any terms and conditions?</h4>
				</div>
				<div class="panel-body">
					<p>
						Ummm, no. As far as you share your original stories, I don’t mind. I don’t even care what you sharing is truth or not, but if you steal someone else’s work and I am reported. Your account and stories are gone. No questions asked. 
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>What is the guarantee you will not misuse my work? Or not display my private information?</h4>
				</div>
				<div class="panel-body">
					<p>
						Again, why would I do that? I will use your stories with due credits on social media platform as part of this website’s promotion, other than that I don’t think so. And as far as protecting your private information is concerned, that’s the whole point of making this site, so be assured I’ll never show it to anyone (Unless and until, aliens from Mars hack my system). A gentleman’s promise.
					</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Fine, anything else?</h4>
				</div>
				<div class="panel-body">
					<p>
						Yeah you can contact me on <a href="mailto:someone@anonity.in">someone@anonity.in</a> for any queries, suggestions, feature updates. A request to all, not to get carried away, this platform is open for all and will not be moderated regularly, so put your content with sense of responsibility. Besides that I hereby declare all content published on this site, belongs to their respective owners. So all copyright and legal stuff applies as usual.
					</p>
				</div>
			</div>

		</div>
	</div>
@endsection