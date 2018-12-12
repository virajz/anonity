<ul class="Stories list-group">
	@if(count($stories))
		@foreach($stories as $story)
			<li class="Stories__story list-group-item {{ $story->approved ? '' : 'list-group-item-warning' }}">
				<form action="/votes/{{ $story->slug }}" method="POST">
					{{ csrf_field() }}
					<button class="like-button" {{ Auth::guest() || ! Auth::user()->verified ? 'disabled' : '' }}><i class="glyphicon {{ Auth::check() && Auth::user()->votedFor($story) ? 'glyphicon-heart' : 'glyphicon-heart-empty' }}"></i></button><span class="text-sm text-muted">{{ $story->votes->count() }} Like{{ $story->votes->count() == 1 ? '' : 's' }}</span>
				</form>
				@if ( Auth::check() && $story->author->id == auth()->user()->id )
					<form action="/stories/{{ $story->id }}" method="POST" class="pull-right">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<a class="btn btn-xs btn-default" href="{{ route('stories.edit', $story->slug) }}"><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-xs btn-default delete"><i class="glyphicon glyphicon-trash"></i></button>
					</form>
				@endif
				{{-- @if (Auth::check() && Auth::user()->votedFor($story))
					+1
				@endif --}}
				<a href="{{ url('genres', $story->genre->slug) }}" class="label label-default" style="background-color: {{ $story->genre->color }}">
					{{ $story->genre->title }}</a>


				<a href="{{ route('stories.show', $story->slug) }}">
					{{ $story->title }}</a>

				<small>By: <a href="{{ route('users.show', $story->author->screen_name) }}">
					{{ $story->author->screen_name }}</a></small>

				<small>{{ $story->created_at->diffForHumans() }}</small>

			</li>
		@endforeach
	@else
		<li class="Stories__story list-group-item">No stories yet</li>
	@endif
</ul>

{{ $stories->appends(request()->query())->links() }}

@section('scripts')
	<script src='/js/bootbox-4.4.0/bootbox.min.js'></script>

	<script>
        $(document).on("click", ".delete", function(e) {
        	e.preventDefault();
        	var $this = $(this),
        		$form = $this.parent('form');
			bootbox.dialog({
				message: "Are you sure you want to delete this story?",
				title: "Please Confirm",
				buttons: {
					danger: {
						label: "No",
						className: "btn-default",
						callback: function() {
							//Example.show("uh oh, look out!");
						}
					},
					success: {
						label: "Yes",
						className: "btn-danger",
						callback: function() {
							$form.submit();
						}
					}
				}
			});
        });
	</script>
@stop