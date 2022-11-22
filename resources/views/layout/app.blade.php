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
    <div class="navbar py-1">
        <div class="h-100 d-flex justify-content-center align items_center">
            <div class="lft-side d-flex flex-1 align-items-center">
                <a href="{{ url('/') }}">{{ config('app.name') }}</a>
            </div>
            <div class="rgt-side  d-flex flex-1 align-items-center justify-content-right">
                @auth
                    <p class="mr-1">{{ Auth::user()->email }}</p>
                    @if (Auth::user()->roleid == 1)
                        <a href="{{ route('moderation') }}" class="btn btn-w btn-navbar mr-3">Moderation</a>
                    @endif
                    <a href="{{ route('favorites') }}" class="btn btn-w btn-navbar"><i class="fa fa-heart"></i>FAVORITES</a>
                    <a href="{{ route('upload') }}" class="btn btn-mg ml-3 btn-navbar">UPLOAD</a>
                    <a href="{{ route('logout') }}" class="btn btn-g ml-3 btn-navbar">LOGOUT</a>
                @else
                    <a href="{{ route('upload') }}" class="btn btn-mg ml-3 btn-navbar">UPLOAD</a>
                    <a href="{{ route('auth') }}" class="btn btn-g ml-3 btn-navbar">LOGIN</a>
                @endauth
            </div>
        </div>
    </div>

    <div class="py-1 pt-1 app-div">
        @yield('content')
    </div>

</body>

</html>
