<!DOCTYPE html>
<html>
<head>
	<title>Daily User Log</title>
	<style>
		table {
			max-width: 960px;
		}

		td {
			vertical-align: top;
			border: 1px solid #eee;
			padding: 20px;
		}
	</style>
</head>
<body>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tbody>
			@if (count($users))
				@foreach($users as $key=>$user)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $user->name }}</td>
						<td><a href="{{ route('users.show', $user->screen_name) }}">{{ $user->screen_name }}</a></td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->link }}</td>
						<td>{{ e($user->description) }}</td>
					</tr>
				@endforeach
			@else
				<tr><td>No users for today</td></tr>
			@endif
		</tbody>
	</table>
</body>
</html>