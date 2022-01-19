<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameDetail;
use App\Models\Genre;

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
        $gameDetail=$game->gameDetail;

        $cover=$gameDetail->game_cover;
        $video=$gameDetail->game_trailer;
        $path=public_path()."/game_assets/";
        unlink($path."img/".$cover);
        unlink($path."video/".$video);
        GameDetail::destroy($detailGameId);
        Game::destroy($game->id);
        return redirect('/manage-game')->with('succes','Game has been deleted!');
    }
}
