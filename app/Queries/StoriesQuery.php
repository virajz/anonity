<?php 

namespace App\Queries;

use App\Story;

class StoriesQuery {

	public function get($genre, $sortByPopular) {

		$orderBy = $sortByPopular ? 'votes_count' : 'updated_at';

		return Story::with('author', 'genre')
	                ->withCount('votes')
	                ->forGenre($genre)
	                ->where('approved', 1)
	                ->orderBy($orderBy, 'desc')
	                ->paginate(20);
	}
	
}