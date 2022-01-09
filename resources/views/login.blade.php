@extends('main')

@section('feed')
	<h1>Login:</h1>
	<form class="login" action="{{ route('login')}}" method="post">
		@csrf
			<label for="email" class="sr-only">Email:</label>
			<input type="text" name="email" id="email" placeholder="Your Email" class="@error('email') input-error @enderror" value="{{ old('email')}}">

			<label for="password" class="sr-only">Password:</label>
			<input type="password" name="password" id="password" placeholder="Your Password" class="@error('password') input-error @enderror" value="{{ old('password')}}">

			@if ($errors->any())
			    <div class="errors">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<button type="submit" class="">Login</button>


	</form>
@endsection