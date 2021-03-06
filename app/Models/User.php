<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Game;
use App\Models\Rating;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function haveRating($game_id)
    {
        return $this->ratings->where('game_id', $game_id)->first();
    }

    public function haveComment($comment_id)
    {
        return $this->comments->where('id', $comment_id)->first();
    }

    public function ratedGames()
    {
        return $this->belongsToMany(Game::class, 'ratings')->orderBy('ratings.created_at', 'desc');
    }

}
