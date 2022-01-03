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
    public function friendsAddedBy(){
        return $this->belongsToMany(User::class, 'friend_lists', 'friend_id', 'user_id')->wherePivot('status', '=', 1);
    }
    public function friendsAdded(){
        return $this->belongsToMany(User::class, 'friend_lists', 'user_id', 'friend_id')->wherePivot('status', '=', 1);
    }
    public function friends(){
        return $this->friendsAdded->merge($this->friendsAddedBy);
    }

    public function friendsRequested(){
        return $this->belongsToMany(User::class, 'friend_lists', 'user_id', 'friend_id')->wherePivot('status', '=', 0);
    }
    public function incomeFriendRequest(){
        return $this->belongsToMany(User::class, 'friend_lists', 'friend_id', 'user_id')->wherePivot('status','=',0);
    }
    public function userPaymentInformation(){
        return $this->hasOne(UserPaymentInformations::class);
    }
}
