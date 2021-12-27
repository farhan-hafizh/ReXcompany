<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];
    
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    function friends(){
        return $this->belongsToMany(User::class, 'friend_lists', 'user_id', 'friend_id')->wherePivot('status', '=', 1);
    }
    function friendsRequested(){
        return $this->belongsToMany(User::class, 'friend_lists', 'user_id', 'friend_id')->wherePivot('status', '=', 0);
    }
    function incomeFriendRequest(){
        return $this->belongsToMany(User::class, 'friend_lists', 'friend_id', 'user_id')->wherePivot('status','=',0);
    }
}
