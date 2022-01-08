<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function store(RateRequest $request, $game_id){
        if(Rating::getUserGameRating($game_id, Auth::id()) == null)
        {
            Rating::create([
                'game_id' => $game_id,
                'user_id' => Auth::id(),
                'rating' => $request->rating,
            ]);
        }
        return redirect("/game/".$game_id);
    }
}
