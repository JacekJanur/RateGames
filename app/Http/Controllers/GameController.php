<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('main-page')->with('games', Game::orderBy('created_at')->paginate(5));
    }

    public function showGame($id)
    {
        return view('show-game')->with('game', Game::find($id));
    }
}
