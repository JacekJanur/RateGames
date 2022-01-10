<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'category',
        'text',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }


    public static function haveText($text)
    {
        return Game::where('name', 'like', '%' . $text . '%')->orWhere('category', 'like', '%' . $text . '%')->paginate(5);
    }

}
