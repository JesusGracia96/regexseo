<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FullStack Developer Test</title>
    <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="logo"><a href="{{ url('/') }}">{{ config('app.name') }}</a></div>
        <ul class="nav-links">
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <div class="menu">
                @auth
                    <li>{{ Auth::user()->email }}</li>
                    @if (Auth::user()->roleid == 1)
                        <li><a href="{{ route('moderation') }}" class="btn btn-w btn-navbar mr-3">Moderation</a></li>
                    @endif
                    <li><a href="{{ route('favorites') }}" class="btn btn-w btn-navbar"><i
                                class="fa fa-heart"></i><span class="ml-1">FAVORITES</span></a></li>
                    <li><a href="{{ route('upload') }}" class="btn btn-mg ml-3 btn-navbar">UPLOAD</a></li>
                    <li><a href="{{ route('logout') }}" class="btn btn-g ml-3 btn-navbar">LOGOUT</a></li>
                @else
                    <li><a href="{{ route('upload') }}" class="btn btn-mg ml-3 btn-navbar">UPLOAD</a></li>
                    <li><a href="{{ route('auth') }}" class="btn btn-g ml-3 btn-navbar">LOGIN</a></li>
                @endauth
            </div>
        </ul>
    </nav>
    
    <div class="app-div">
        @yield('content')
    </div>
</html>
