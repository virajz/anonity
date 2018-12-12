@extends('layouts.app')

@section('title') Users @endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Users Listing</h3>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Screen Name</th>
								<th>Link</th>
								<th>Private</th>
								<th>No. of Stories</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $key=>$user)
								<tr class="{{ $user->trusted ? 'success' : 'danger' }}">
									<td>{{ $key+1 }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td><a href="{{ route('users.show', $user->screen_name ) }}">{{ $user->screen_name }}</a></td>
									<td><a href="{{ $user->link }}">{{ $user->link }}</a></td>
									<td>{{ $user->private_account ? 'Yes' : 'No' }}</td>
									<td>{{ $user->stories->count() }}</td>
									<td>
										<a href="{{ url('/trusted/' . $user->screen_name) }}" data-toggle="tooltip" title="Change Trust Factor" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-{{ $user->trusted ? 'down' : 'up' }}"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $users->appends(request()->query())->links() }}
			</div>
		</div>
	</div>
@endsection