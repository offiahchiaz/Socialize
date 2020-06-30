<?php

namespace Socialize;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvartarUrl()
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    // Someone user_id sent a friend request to.
    public function friendOfMine()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    // Someone that recieved my friend request.
    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    // Friend request that has been accepted.
    public function friends()
    {
        return $this->friendOfMine()->wherePivot('accepted', true)->get()
            ->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }

    // Friend request sent but yet to be accepted.
    public function friendRequests()
    {
        return $this->friendOfMine()->wherePivot('accepted', false)->get();
    }

    // Friend request recieved but yet to be accepted
    public function friendRequestPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    // Check if user has a friend request pending from another user
    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }

    // Check if we have received a friend request from a particular user
    public function hasFriendRequestRecieved(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    // Method to add a friend
    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    // This method accepts a friend request
    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id', $user->id)->first()
            ->pivot->update([
                'accepted' => true
            ]);
        // $this->friendRequests()->where('id', $user->id)->first()->pivot->update(['accepted', => true]);
    }

    // Tells if we are friends with a particular user
    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }
}
