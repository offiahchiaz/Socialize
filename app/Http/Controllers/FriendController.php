<?php

namespace Socialize\Http\Controllers;

use Auth;
use Socialize\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();


        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }

    public function getAdd($username)
    {
        $user = User::where('name', $username)->first();

        if (!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not br found');
        }

        if (Auth::user()->id === $user->id) {
            return redirect()->route('home');
        }

        if (Auth::user()->hasFriendRequestPending($user) || 
            $user->hasFriendRequestPending(Auth::user())) {
            return redirect()
                ->route('profile.index', $username)
                ->with('info', 'Friend request already pending');
        }

        if (Auth::user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile.index', $username)
                ->with('info', 'You are already friends');
        }

        Auth::user()->addFriend($user);

        return redirect()
        ->route('profile.index', $username)
        ->with('info', 'Friend request sent');
    }

    public function getAccept($username)
    {
        $user = User::where('name', $username)->first();

        if (!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not br found');
        }

        if (!Auth::user()->hasFriendRequestRecieved($user)) {
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequest($user); 

        return redirect()
            ->route('profile.index', $username)
            ->with('info', 'Friend request accepted');
    }
}
