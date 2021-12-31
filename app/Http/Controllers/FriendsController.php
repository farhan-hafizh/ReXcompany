<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    //
    public function index(){
        return view('friends',[
            'title' => 'Friends',
            //merge the collection
            'friends' => Auth::user()->friendsAdded->merge(Auth::user()->friendsAddedBy),
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
            $userId=Auth::id();
            $friendId=$result[0]->id;
            $isFriend=DB::table('friend_lists')->select()->where('user_id', '=', $userId)->where('friend_id','=',$friendId)->get();
            // dd($isFriend);
            if(empty($isFriend)){
                return back()->with('already-friend','User already a friend or in pending');
            }
            DB::table('friend_lists')->insert(['user_id' => $userId , 'friend_id' => $friendId]);
            return back();
        }
    }
    public function cancelFriendRequest($id){
        DB::table('friend_lists')->where('friend_id', '=', $id)->where('user_id', '=', Auth::id())->delete();
        return back();
    }
    public function acceptFriendRequest($id){
        DB::table('friend_lists')->where('friend_id', '=', Auth::id())->where('user_id', '=', $id)->update(['status'=>1]);
        return back();
    }
}
