<?php

namespace Socialize\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        return view('friends.index');
    }
}
