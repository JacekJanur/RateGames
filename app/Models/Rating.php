<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'user_id',
        'rating',
    ];

    public static function getUserGameRating($game_id, $user_id)
    {
        return Rating::where([
                ['game_id', '=', $game_id],
                ['user_id', '=', $user_id],
            ])->first();
    }


}
