<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class AddGameController extends Controller
{
    //
    public function index(){
        return view('add-game',[
            'title' => 'Add Game',
            'category' => Genre::all()
        ]);
    }
}
