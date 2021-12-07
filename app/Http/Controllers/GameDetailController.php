<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Transaction;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class GameDetailController extends Controller
{
    //
    public function index($slug){
        $game=Game::with(['genre','gameDetail'])->where('slug',$slug)->get();
        $id=$game[0]->id;
        // dd(Cookie::get('cart'));

        return view('game-detail',[
            'title' => "Detail Game",
            'game' => $game,
            'trans' => Transaction::where('game_id','=',$id)->get()
        ]);
    }
    public function addCart($slug){
        $game=Game::where('slug',$slug)->get();
        $game_id=$game[0]->id;
        $userId=Auth::id();
        $record=Transaction::latest()->first();
        $id=isset($record[0]->id) ? (int)$record[0]->id+1: 1;
        $transId="INV".date('YmmddHis')."-".$id;
        // dd($transId);
        Transaction::create([
            'transaction_id' => $transId,
            'user_id' => $userId,
            'game_id' => $game_id,
            'status' => 0]);
        
            $id=Auth::id();
            $dataTrans=Transaction::where('user_id','=',$id)
            ->where('status','=',0)
            ->get();
            //set cookies
            Cookie::queue('cart',json_encode($dataTrans),120);
            Cookie::queue('totalcart',$dataTrans->count(),120);
        
        
        return back()->with('succes','Game Added to Cart!');
    }
}