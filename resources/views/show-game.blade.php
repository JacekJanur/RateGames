@extends('main')

@section('feed')
	<x-post-game :game="$game" />
	<p class="game-text">{{ $game->text }}</p>

	<div class="comments">
		<h2>Comments:</h2>
		@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		<div class="add-comment">
			@if(Auth::user())
				<form class="comment" action="/game/{{ $game->id }}/comments" method="post">
					@csrf
					<textarea class="new-comment-text" d="comment_text" name="comment_text" placeholder="Add Your comment"></textarea>

					<button type="submit" class="">Submit</button>
				</form>
			@else
				<input type="text" name="" placeholder="You have to be logged" disabled >
			@endif
			
		</div>

		@foreach ($game->comments as $comment)
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

					<h5>{{ $comment->user->name}}</h5>
				</div>
				<p>{{ $comment->created_at }}</p>
			</div>
			<p>{{ $comment->text }}</p>
		</div>
		@endforeach
	</div>
@endsection