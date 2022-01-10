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
					<x-post-game :game="$game" />
				</a>
			@endforeach
	</div>
@endsection