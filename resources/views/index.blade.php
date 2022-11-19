@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@section('content')
    <div class="main-images">
        {{-- @for ($i = 0; $i < 12; $i++)
            <x-image-card image="#" title="Título" description="Descripcion aleatoria que intentemos hacer larga para ver ejemplos" likes="10" />
        @endfor --}}
    </div>
@endsection
