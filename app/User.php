<?php

namespace App;

use App\Story;
use App\StoryVote;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'screen_name', 'link', 'description', 'private_account'
    ];

    protected $dates = ['deleted_at'];

    public function getRouteKeyName() {
        return 'screen_name';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot() {
        parent::boot();

        static::creating(function($user) {
            $user->token = str_random(30);
        });
    }

    public function confirmEmail() {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

    public function setLinkAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['link'] = NULL;
        } else {
            $this->attributes['link'] = $value;
        }
    }

    public function isTrusted() {
        return !! $this->trusted;
    }

    public function votes() {
        return $this->belongsToMany(Story::class, 'stories_votes')
                    ->where('approved', 1)
                    ->withTimestamps();
    }

    public function toggleVoteFor(Story $story) {
        StoryVote::firstOrNew([
            'user_id' => $this->id,
            'story_id' => $story->id,
        ])->toggle();
    }

    public function votedFor($story) {
        return $story->votes->contains('user_id', $this->id);
    }

    public function stories() {
        return $this->hasMany(Story::class);
    }

    public function publishedStories() {
        return $this->stories()->where('approved', true);
    }
}
