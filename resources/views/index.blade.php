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

    @if ($images->count() > 0)
        <div class="main-images">
            @foreach ($images as $image)
                <x-image-card id="id-image-{{ $image->id }}" image="{{ asset('images/' . $image->name) }}"
                    title="{{ $image->title }}" description="{{ $image->description }}" likes="{{ $image->likes }}" />
            @endforeach
        </div>
    @else
        <div class="text-center">
            <h2 class="text-center">NO IMAGES LOADED YET</h2>
        </div>
    @endif



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
