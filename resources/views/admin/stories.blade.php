@extends('layouts.app')

@section('title') Stories @endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Stories Listing</h3>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Genre</th>
								<th>Author</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($stories as $key=>$story)
								<tr class="{{ $story->approved ? 'success' : 'danger' }}">
									<td>{{ $key+1 }}</td>
									<td>{{ $story->title }}</td>
									<td><span class="label label-default" style="background-color: {{ $story->genre->color }}">{{ $story->genre->title }}</span></td>
									<td><a href="{{ route('users.show', $story->author->screen_name) }}">{{ $story->author->screen_name }}</a></td>
									<td>
										<a href="{{ url('/approved/' . $story->slug) }}" data-toggle="tooltip" title="Change Approval" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-{{ $story->approved ? 'down' : 'up' }}"></i></a>
										<a href="{{ route('stories.show', $story->slug ) }}"><i class="glyphicon glyphicon-eye-open"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $stories->appends(request()->query())->links() }}
			</div>
		</div>
	</div>
@endsection