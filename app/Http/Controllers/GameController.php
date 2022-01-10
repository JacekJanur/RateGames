<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        if(isset($_GET['search']))
        {
            $games = Game::haveText($_GET['search']);
        }
        else
        {
            $games = Game::orderBy('created_at')->paginate(5);
        }

        return view('main-page')->with('games', $games);
    }

    public function showGame($id)
    {
        return view('show-game')->with('game', Game::find($id));
    }
}
