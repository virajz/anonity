<?php

use App\Genre;
use App\Story;
use App\StoryVote;
use App\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('faq', function () {
    return view('faq');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('stories', 'StoriesController');
Route::resource('users', 'UsersController');
// Route::resource('genres', 'GenresController');
Route::post('votes/{story}', 'VotesController@store');
Route::get('genres/{genre}', 'StoriesController@index');
Route::get('trusted/{user}', 'UsersController@toggleTrusted');
Route::get('approved/{story}', 'StoriesController@toggleApproved');
Route::get('admin/stories', 'StoriesController@adminStories');
Route::get('register/confirm/{token}', 'UsersController@confirmEmail');

Route::get('play', function() {
	$storyIds = StoryVote::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->pluck('story_id');
	return Story::whereIn('id', $storyIds)->withCount('votes')->orderBy('votes_count', 'desc')->get();
});
