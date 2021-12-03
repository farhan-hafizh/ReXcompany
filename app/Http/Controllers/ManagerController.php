<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(){
        return view('manage-game',[
            "title" => 'Manage',
            "game" => Game::with(['genre','gameDetail'])->latest()->paginate(8),
            "genre" => Genre::all(),
        ]);
    }
}
