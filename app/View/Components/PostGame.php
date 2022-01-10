<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostGame extends Component
{
    public $game;
    
    public function __construct($game)
    {

        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-game');
    }
}
