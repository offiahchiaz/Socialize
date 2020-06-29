<?php

namespace Socialize\Http\Controllers;

use Auth;
use Socialize\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('name', $username)->first();

        if(!$user) {
            abort(404);
        }

        return view('profile.index')->with('user', $user);
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'alpha|max:50',
            'lastname' => 'alpha|max:50',
            'location' => 'max:20',
        ]);

        Auth::user()->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('profile.edit');
    }
}
