<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameDetail;
use Illuminate\Support\Str;
use App\Models\Genre;
use Illuminate\Http\Request;

class AddGameController extends Controller
{
    //
    public function index(){
        // dd(phpinfo());  
        return view('add-game',[
            'title' => 'Add Game',
            'category' => Genre::all()
        ]);
    }
    public function store(Request $request){
        $rules=[
            'name' => 'required',   
            'description' => 'required|max:500',
            'long_description' => 'required|max:2000',
            'genre' => 'required',
            'publisher' => 'required',
            'developer' => 'required',
            'price' => 'required|numeric|max:1000000',
            'game_cover' =>'image|mimes:jpg|max:100',
            'game_trailer' => 'mimes:webm|max:100000',
            // 'forAdult' => ''
        ];
        // dd($rules);
        $validated= $request->validate($rules);
        
        $gameCover=$request->file('game_cover');
        $gameTrailer=$request->file('game_trailer');
        $coverName=time()."_".$gameCover->getClientOriginalName();
        $trailerName=time()."_".$gameTrailer->getClientOriginalName();
        //move file
        $gameCover->move(public_path('game_assets/img'), $coverName);
        $gameTrailer->move(public_path('game_assets/video'), $trailerName);

        $gameDetail = new GameDetail();
        $gameDetail->developer=$validated['developer'];
        $gameDetail->publisher=$validated['publisher'];
        $gameDetail->price=$validated['price'];
        $adult=0;
        if($request->has('forAdult'))
            $adult=1;    
        $gameDetail->forAdult=$adult;
        $gameDetail->game_cover = $coverName;
        $gameDetail->game_trailer = $trailerName;
        $gameDetail->description = $validated['description'];
        $gameDetail->long_description = $validated['long_description'];

        $gameDetail->save();
        $detailID=$gameDetail->id;

        $game=new Game();
        $game->slug=Str::snake($validated['name']);
        $game->game_detail_id=$detailID;
        $game->genre_id=$validated['genre'];
        $game->name=$validated['name'];
        $game->save();

        return redirect('/manage-game')->with('success','Game added!');
    }
}
