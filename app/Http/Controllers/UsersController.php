<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Queries\StoriesQuery;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('confirmEmail');
        $this->middleware('adminuser')->only('index', 'toggleTrusted', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(50);
        return view('admin.users', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (request()->exists('favorites')) {
            $stories = $user->votes()->paginate(10);
        } else if (auth()->user()->id == $user->id) {
            $stories = $user->stories()->latest()->paginate(10);
        } else {
            $stories = $user->publishedStories()->latest()->paginate(10);
        }
        return view('users.show', compact('user', 'stories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return view('users.edit', compact('user'));
        } else {
            return back();
        }
    }

    public function toggleTrusted(User $user)
    {
        $user->trusted = ! $user->trusted;
        $user->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'screen_name' => 'required|alpha_dash|max:255|unique:users,screen_name,' . $user->id,
            'password' => 'min:6|confirmed',
            'link' => 'active_url|unique:users,link,' . $user->id,
            'description' => 'string|max:300',
        ]);

        $user->name = $request->input('name');
        $user->screen_name = $request->input('screen_name');
        $user->email = $request->input('email');
        $user->link = $request->input('link');
        $user->description = $request->input('description');
        $user->private_account = $request->input('private_account') == 'on' ? true : false;

        if ($request->input('password') !== '') {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        flash('Your changes has been saved.', 'success');
        return redirect()->route('users.edit', $user->screen_name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirmEmail($token) {
        $user = User::whereToken($token)->first();

        if (count($user)) {
            $user->confirmEmail();
            flash('Verification successfull, you can now login.', 'success');
        } else {
            flash('Either you are verfied or you like to play with my system!', 'warning')->important();
        }


        return redirect('login');
    }
}
