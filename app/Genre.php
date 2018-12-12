<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
	use SoftDeletes;

    protected $fillable = ['title', 'slug', 'color'];
    protected $dates = ['deleted_at'];

    public function getRouteKeyName() {
    	return 'slug';
    }

    public function stories() {
    	return $this->hasMany(App\Story::class);
    }
}
