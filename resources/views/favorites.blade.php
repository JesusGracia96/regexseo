@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/viewImage.css') }}">
@section('content')
    <div class="main-images">
        @if ($images->count() > 0)
            @foreach ($images as $image)
                <x-image-card id="id-image-{{ $image->id }}" image="{{ asset('storage/' . $image->name) }}"
                    title="{{ $image->title }}" description="{{ $image->description }}" likes="{{ $image->count }}"
                    author="{{ $image->email }}" />
            @endforeach
        @else
            <div class="text-center">
                <h2 class="text-center">YOU DONT HAVE ANY IMAGE IN FAVORITES</h2>
            </div>
        @endif
    </div>
    <x-view-image />

    <script>
        $('.image-prev').click(function() {
            let imageSrc = $(this).attr('src');
            let title = $(this).siblings('.image-title').text();
            $("#image-view").removeClass('d-none');
            $("#image-view").find('#title-view-image').text(title);
            $("#image-view img").attr('src', imageSrc);
            $('.dark-bg').removeClass('d-none');
        });

        $('#closeImage').click(function() {
            $("#image-view").addClass('d-none');
            $('.dark-bg').addClass('d-none');
        });

        $('.like-btn').click(function() {
            var imgId = $(this).parent().parent().attr('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('like') }}",
                data: {
                    'imgId': imgId
                },
                type: 'post',
                success: function(response) {
                    let data = JSON.parse(response);
                    if (data[0] != "liked") {
                        location.reload();
                    }
                }
            })
        })
    </script>
@endsection