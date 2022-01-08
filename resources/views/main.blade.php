@extends('nav')

@section('content')
	<div class="container">
		<div class="feed">
			@yield('feed')
		</div>
		<div class="menu">
			<ul>
          		<li><a href="default.asp">Most popular games</a></li>
          		<li><a href="news.asp">Most commended games</a></li>
         		<li><a href="contact.asp">Best 2021 games</a></li>
        		<li><a href="about.asp">Best indie games</a></li>
        	</ul> 
		</div>
	</div>	
@endsection