<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransHistoryController extends Controller
{
    public function index(){
        // dd(DB::table('transactions')->get()->groupBy('user_id')->toArray());
        // dd(Transaction::with(['game','game.gameDetail'])->where('user_id','=',Auth::id())->get()->groupBy('transaction_id'));
        return view('trans-history',[
            'title' => 'Transaction History',
            'transHistory' => Transaction::with(['game','game.gameDetail'])->where('user_id','=',Auth::id())->get()->groupBy('transaction_id')
        ]);
    }
    public function transReceipt($transId,$price){
        return view('trans-receipt',[
            'title' => 'Transaction Receipt',
            'transId' => $transId,
            'price' => $price,
            'trans' => Transaction::where('transaction_id','=',$transId)->get(),
        ]);
    }
}
