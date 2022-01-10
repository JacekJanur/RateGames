<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comment extends Component
{
    public $comment;
    public $game;

    public function __construct($comment, $game)
    {
        $this->comment = $comment;
        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment');
    }
}
