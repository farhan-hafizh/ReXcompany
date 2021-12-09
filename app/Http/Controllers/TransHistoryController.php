<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransHistoryController extends Controller
{
    public function index(){
        return view('trans-history',[
            'title' => 'Transaction History'
        ]);
    }
}
