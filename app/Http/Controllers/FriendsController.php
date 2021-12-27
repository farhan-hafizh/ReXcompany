<?php

namespace App\Http\Controllers;

use App\Models\FriendList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    //
    public function index(){
        $id=Auth::id();
        return view('friends',[
            'title' => 'Friends',
            'friends' => Auth::user()->friends,
            'requesting' => Auth::user()->friendsRequested,
            'pending' => Auth::user()->incomeFriendRequest,
        ]);
    }
    public function addFriend(Request $request){
        $username=$request->post('username');

        $result=User::where('username','=',$username)->get()->all();
        if(empty($result)){
            return back()->with('user-not-found','User Not Found!');
        }else{
            $data['user_id']=Auth::id();
            $data['friend_id']=$result[0]->id;
        
            FriendList::create($data);
            return back();
        }
    }
}
