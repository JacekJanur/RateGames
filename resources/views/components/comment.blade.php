<div class="comment">
    <div class="comment-header">
        <div class="top">
            @if(Auth::check() && Auth::user()->id == $comment->user->id)
            <form class="comment_id" action="/game/{{ $game->id }}/comments/{{$comment->id}}/delete" method="post">
                @csrf
                <input type="text" name="comment_id" id="comment_id" value={{$comment->id}} hidden>
                <button type="submit" class=""><x-tni-x /></button>
            </form>
                
            @endif

            <a href="{{route('user', $comment->user->id)}}">
                <h5>{{ $comment->user->name}}</h5>
            </a>
        </div>
        <p>{{ $comment->created_at }}</p>
    </div>
    <p>{{ $comment->text }}</p>
</div>