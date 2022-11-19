@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@section('content')
    @if (session('message'))
        <script>
            alert("{{ session('message') }}")
        </script>
    @endif
    <div class="main-images">
        @if ($images->count() > 0)
            @foreach ($images as $image)
                <x-image-card image="{{ asset('images/' . $image->name) }}" title="{{ $image->title }}"
                    description="{{ $image->description }}" likes="{{ $image->likes }}" />
            @endforeach
        @else
            <h2>No se han registrado imágenes aún</h2>
        @endif

    </div>
@endsection
