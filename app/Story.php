<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
	
    protected $fillable = [
		'genre_id', 'title', 'slug', 'body'
	];

    public function getRouteKeyName() {
        return 'slug';
    }
    
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
	
    public function genre() {
    	return $this->belongsTo(Genre::class);
    }

    public function votes() {
        return $this->hasMany(StoryVote::class, 'story_id')->latest();
    }

    public static function from(User $user) {
    	$story = new static;
    	$story->user_id = $user->id;
        if ($user->isTrusted()) {
            $story->approve();
        }
    	return $story;
    }

    public function approve() {
        $this->approved = true;
        return $this;
    }

    public function contribute($attributes) {
    	$this->slug = str_slug($attributes['title']);
        $attributes['body'] = e($attributes['body']);
    	return $this->fill($attributes)->save();
    }

    public function scopeForGenre($builder, $genre) {
        if ($genre->exists) {
            return $builder->where('genre_id', $genre->id);
        }

        return $builder;
    }
}
