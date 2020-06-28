<?php

namespace Socialize\Http\Controllers;

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

        return view('profiles.index');
    }
}
