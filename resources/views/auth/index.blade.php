@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/auth/index.css') }}">
@section('content')
    <div class="auth-forms d-flex justify-content-center flex-column align-items-center pt-1">
        <div class="buttons">
            <button id="btn-login" class="btn btn-w btn-navbar btn-left btn-auth">
                SIGN IN
            </button>
            <button id="btn-sign-up" class="btn btn-mg btn-navbar btn-right btn-auth">
                SIGN UP
            </button>
            <div class="selector"></div>
        </div>
        <x-login />
        <x-register />
    </div>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @endif

    <script>
        $('.btn-auth').click(function() {
            var idBtn = $(this).attr('id');
            if (idBtn == "btn-login") {
                $(this).css('background-color', '#FFF');
                $('#btn-sign-up').css('background-color', '#C4C4C4');
                $('#register-form').addClass('d-none');
                $('#login-form').removeClass('d-none');
            }
            if (idBtn == "btn-sign-up") {
                $(this).css('background-color', '#FFF');
                $('#btn-login').css('background-color', '#C4C4C4');
                $('#login-form').addClass('d-none');
                $('#register-form').removeClass('d-none');
            }
        })
    </script>
@endsection
