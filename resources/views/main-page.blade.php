@extends('main')

@section('feed')
	<h1>Most recent games:</h1>
	@foreach ($games as $game)
		<a href="/game/{{$game->id}}">
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
							@for ($i = $game->rating->avg('rating'); $i <= 5; $i++)
							    <x-tni-star-o />
							@endfor
						</div>
						<div class="rating-avg">
							{{ round($game->rating->avg('rating'), 2) }}
							({{ $game->rating->count('rating') }})
						</div>
					</div>
				@else
					No rating
				@endif
			</div>
				</div>
			</div>
		</a>
	@endforeach
	{{ $games->links( "pagination::bootstrap-4") }}
@endsection