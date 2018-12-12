<!DOCTYPE html>
<html>
<head>
	<title>Daily Story Log</title>
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
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th width="75%"></th>
			</tr>
		</thead>
		<tbody>
			@if (count($stories))
				@foreach($stories as $key=>$story)
					<tr>
						<td>{{ $key + 1  }}</td>
						<td><a href="{{ url('stories', $story->slug) }}">{{ $story->title }}</a></td>
						<td>by <a href="{{ url('users', $story->author->screen_name) }}">{{ $story->author->screen_name }}</a></td>
						<td>{{ e($story->body) }}</td>
					</tr>
				@endforeach
			@else
				<tr><td colspan="4">No stories for today</td></tr>
			@endif
		</tbody>
	</table>
</body>
</html>