<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        // dd(cookie('cart'));
        return view('home',[
            'title' => 'Home',
            'game' => Game::with(['genre','gameDetail'])->latest()->paginate(10)
        ]);
    }
}
