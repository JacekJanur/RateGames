<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentDeleteRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $game_id){
        Comment::create([
            'game_id' => $game_id,
            'user_id' => Auth::id(),
            'text' => $request->comment_text,
        ]);
        return redirect("/game/".$game_id);
    }

    public function delete(CommentDeleteRequest $request, $game_id)
    {
        if(Auth::user()->haveComment($request->comment_id) != null)
        {
            Comment::where('id', $request->comment_id)->delete();
        }
        return redirect("/game/".$game_id);
    }
}
