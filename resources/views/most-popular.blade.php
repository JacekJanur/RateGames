@extends('main')

@section('feed')
	<h1>Most popular {{ $category}} games:</h1>
	@foreach ($games as $game)
		<a href="/game/{{$game->id}}">
			<x-post-game :game="$game" />
		</a>
	@endforeach
	{{ $games->appends(request()->query())->links( "pagination::bootstrap-4") }}
@endsection