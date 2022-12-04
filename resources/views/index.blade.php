@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/viewImage.css') }}">
<link rel="stylesheet" href="{{ asset('/css/components/imagecard.css') }}">
@section('content')
    <div class="main-images pt-1 py-1">
        @if ($images->count() > 0)
            @foreach ($images as $image)
                <x-image-card id="id-image-{{ $image->id }}" image="{{ asset('storage/' . $image->name) }}"
                    title="{{ $image->title }}" description="{{ $image->description }}" likes="{{ $image->count }}"
                    author="{{ $image->email }}" />
            @endforeach
        @else
            <div class="text-center">
                <h2 class="text-center">NO IMAGES LOADED YET</h2>
            </div>
        @endif
    </div>


    <x-view-image />

    <script src="{{ asset('js/imageView.js') }}"></script>
    <script>
        $('.like-btn').click(function() {
            var imgId = $(this).parent().parent().parent().attr('id');
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
                    if (response == 0) {
                        window.location = "{{ route('auth') }}"
                    }
                    let data = JSON.parse(response);
                    if (data[0] == "liked") {
                        $('#like-' + imgId).css('color', 'red');
                        $('#like-span-' + imgId).text(data[1])
                    } else {
                        $('#like-' + imgId).css('color', 'black');
                        $('#like-span-' + imgId).text(data[0])
                    }
                }

            })
        })
    </script>
@endsection
