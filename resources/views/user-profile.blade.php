@extends('main')

@section('feed')
	<div class="user-profile">
		<h2>{{$user->name}}</h2>
		<p>With us since: {{ date("Y-m-d", strtotime($user->created_at) )}}</p>
		<p>Rated games: {{$user->ratings->count()}}</p>
		<p>Average rate: {{round($user->ratings->avg('rating'), 2)}}</p>
	</div>
	<div class="user-activity">
		<h2>Most recent activity:</h2>
			@foreach ($user->ratedGames->take(5) as $game)
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
	</div>
@endsection