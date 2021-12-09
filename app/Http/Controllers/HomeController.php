<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        // dd(cookie('cart'));
        $search=(request(['search']))?? "";
        // dd($search);
        return view('home',[
            'title' => 'Home',
            'search' => $search,
            'game' => Game::with(['genre','gameDetail'])->latest()->findname($search)->paginate(10)
        ]);
    }
}
