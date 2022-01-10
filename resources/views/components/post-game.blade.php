<div class="game">
    <div class="image-opacity">
        <img src="{{ asset('img/none.jpg') }}" alt="" class="game-image">
    </div>

    <div class="game-textbar">
        <div class="game-textbar-left">
            <h3>{{ $game->name }}</h3>
            <p>{{ $game->category }}</p>
        </div>
        <div class="game-textbar-right">
            @if($game->rating != null)
                <div class="rating-wrapper">
                    <div class="icons">
                        @for ($i = 1; $i <= $game->rating->avg('rating'); $i++)
                        <x-tni-star />
                        @endfor
                    </div>
                    <div class="rating-avg">
                        {{ round($game->rating->avg('rating'), 2) }}
                        ({{ $game->rating->count('rating') }})
                    </div>
                </div>
                <div class="rating-user">
                        @if(Auth::check())
                            @if(Auth::user()->haveRating($game->id) == null)
                                <form class="comment" action="/game/{{ $game->id }}/rates" method="post">
                                    @csrf
                                    <select name="rating" id="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                      </select>
                                    <button type="submit" class="">Rate</button>
                                </form>
                            @else
                            <p>Your rating: {{ Auth::user()->haveRating($game->id)->rating }}</p>
                            @endif
                        @endif
                    </div>
            @else
                No rating
            @endif
        </div>
    </div>
</div>
