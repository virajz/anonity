<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests;
use App\Http\Requests\StoryForm;
use App\Queries\StoriesQuery;
use App\Story;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('verifieduser')->except('index', 'show');
        $this->middleware('adminuser')->only('toggleApproved', 'adminStories');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Genre $genre = null)
    {
        $stories = (new StoriesQuery)->get($genre, request()->exists('popular'));

        $genres = Genre::orderBy('title', 'asc')->get();

        return view('stories.index', compact('stories', 'genres', 'genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryForm $request)
    {
        $request->persist();

        if (auth()->user()->isTrusted()) {
            flash('Thanks for your contribution.', 'success');
        } else {
            flash('Thanks, Your story will be approved soon!', 'warning')->important();
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        if (! $story->approved) {
            return back();
        }
        return view('stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        if ($story->author->id == auth()->user()->id) {
            $genres = Genre::orderBy('title', 'asc')->get();
            return view('stories.edit', compact('story', 'genres'));
        } else {
            return back();
        }
    }

    public function adminStories()
    {
        $stories = Story::latest()->paginate(50);
        return view('admin.stories', compact('stories'));
    }

    public function toggleApproved(Story $story)
    {
        $story->approved = ! $story->approved;
        $story->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $this->validate($request, [
            'title' => 'required|min:6|unique:stories,title,' . $story->id,
            'body' => 'required|max:15000',
            'genre_id' => 'required|exists:genres,id'
        ]);

        if ($story->author->isTrusted()) {
            $story->approve();
        }

        $story->contribute($request->all());

        if (auth()->user()->isTrusted()) {
            flash('Yay! updated your story.');
        } else {
            flash('Thanks, Your story will be approved soon!', 'warning')->important();
        }

        return redirect()->route('stories.edit', $story->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);
        $story->delete();

        return back();
    }
}
