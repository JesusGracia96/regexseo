@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/viewImage.css') }}">
@section('content')
    @if (session('message'))
        <script>
            alert("{{ session('message') }}")
        </script>
    @endif
    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @endif
    <div class="main-images">
        @if ($images->count() > 0)
            @foreach ($images as $image)
                <x-image-card id="id-image-{{ $image->id }}" image="{{ asset('storage/' . $image->name) }}"
                    title="{{ $image->title }}" description="{{ $image->description }}" likes="{{ $image->likes }}" author="{{ $image->email }}"/>
            @endforeach
        @else
            <div class="text-center">
                <h2 class="text-center">NO IMAGES LOADED YET</h2>
            </div>
        @endif
    </div>


    <x-view-image />

    <script>
        $('.image-card').click(function() {
            let imageSrc = $(this).children('.image-view').attr('src');
            let title = $(this).children('.image-title').text();
            $("#image-view").removeClass('d-none');
            $("#image-view").find('#title-view-image').text(title);
            $("#image-view img").attr('src', imageSrc);
            $('.dark-bg').removeClass('d-none');
        });

        $('#closeImage').click(function() {
            $("#image-view").addClass('d-none');
            $('.dark-bg').addClass('d-none');
        });
    </script>


@endsection
