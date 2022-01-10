<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RateGames</title>

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/game-post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/game.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <script src="{{ asset('js/submit-enter.js') }}"></script> 

</head>
<body>
    <nav>
         <ul>
          <li><a href="{{route('home')}}" class="nav-header">RateGames</a></li>
          <li>
              <form action="/" method="get">
                   <input class="find-game" name="search" id="search" type="text" placeholder="Find game">
              </form>
          </li>
        </ul> 

        <ul class="nav-user">
            @if (Auth::check())
              <li><a href="{{route('user', Auth::user()->id)}}">
                My Profile</a>
              </li>
              <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="" >Logout</button>
                </form>
              </li>
            @else
              <li><a href="{{route('login')}}">Login</a></li>
              <li><a href="{{route('register')}}">Register</a></li>
            @endif
        </ul> 
    </nav>
    @yield('content')
</body>
</html>