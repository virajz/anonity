<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryVote extends Model
{
    protected $table = 'stories_votes';

    protected $fillable = ['user_id', 'story_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function toggle() {
    	if ($this->exists) {
    		return $this->delete();
    	}
    	return $this->save();
    }
}
