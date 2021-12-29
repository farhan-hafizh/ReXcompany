<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function game(){
        return $this->hasMany(Game::class,'id','game_id');
    }
    // public function getCart(){
    //     return $this->hasMany(Game::class,'game_id')->wherePivot('status','=',0);
    // }
}
