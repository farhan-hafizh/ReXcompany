<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransHistoryController extends Controller
{
    public function index(){
        return view('trans-history',[
            'title' => 'Transaction History',
            'transHistory' => Transaction::with(['game','game.gameDetail'])->where('user_id','=',Auth::id())->where('status','=',1)->get()->groupBy('transaction_id')
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
//http://rexcompany.test/trans-receipt/5DBD702CE730F473F5EB0EE16E5931A3/300000