@extends('nav')

@section('content')
	<div class="container">
		<div class="feed">
			@yield('feed')
		</div>
		<div class="menu">
			<ul>
          		<li><a href="{{route('popular')}}">Most popular games</a></li>
          		<li><a href="{{route('commented')}}">Most commended games</a></li>
         		<li><a href="{{route('bestYear', 2021)}}">Best 2021 games</a></li>
        		<li><a href="{{route('popular')}}/indie">Best indie games</a></li>
        	</ul> 
		</div>
	</div>	
@endsection