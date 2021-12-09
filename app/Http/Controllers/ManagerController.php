<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameDetail;
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
    public function destroy($id){
        $game=Game::find($id);
        $detailGameId=$game->game_detail_id;
        GameDetail::destroy($detailGameId);
        Game::destroy($game->id);
        return redirect('/manage-game')->with('succes','Game has been deleted!');
    }
}
