<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function index(){
        return view('cart',[
            'title' => 'Cart',
            'game' => Transaction::with(['game','game.gameDetail','game.genre'])->get(),
        ]);
    }
    public function destroy($id){
        DB::table('transactions')->where('id', '=', $id)->delete();
        $id=Auth::id();
            $dataTrans=Transaction::where('user_id','=',$id)
            ->get();
            $totalCart=Transaction::where('user_id','=',$id)
            ->where('status','=',0)
            ->get();
            //set cookies
            Cookie::queue('user_trans',json_encode($dataTrans),120);
            Cookie::queue('totalcart',$totalCart->count(),120);
        return redirect()->route('cart.index');
    }
}
