@extends('main')

@section('feed')
	<div class="game">
		<img src="{{ asset('img/none.jpg') }}" alt="" class="game-image">
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
							@for ($i = $game->rating->avg('rating'); $i <= 5; $i++)
							    <x-tni-star-o />
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