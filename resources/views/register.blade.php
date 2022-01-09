@extends('main')

@section('feed')
	<h1>Register:</h1>
	<form class="login" action="{{ route('register')}}" method="post">
		@csrf
			<label for="name">Username</label>
			<input type="text" name="name" id="name" placeholder="Your Username" class="@error('name') input-error @enderror" value="{{ old('name')}}">

			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="Your Email" class="@error('email') input-error @enderror" value="{{ old('email')}}">

			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Your Password" class="@error('password') input-error @enderror" value="{{ old('password')}}">

			<label for="password_confirmation">Password Confirmation</label>
			<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" class="">

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<button type="submit" class="">Register</button>
	</form>
@endsection