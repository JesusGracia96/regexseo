@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/viewImage.css') }}">
@section('content')
    <div class="main-images">
        @if ($images->count() > 0)
            @foreach ($images as $image)
                <x-image-card id="id-image-{{ $image->id }}" image="{{ asset('storage/' . $image->name) }}"
                    title="{{ $image->title }}" description="{{ $image->description }}" toModerate="1" />
            @endforeach
        @else
            <div class="text-center">
                <h2 class="text-center">NO IMAGES TO MODERATE</h2>
            </div>
        @endif
    </div>


    <x-view-image />
    <script src="{{ asset('js/imageView.js') }}"></script>
    <script>
        $('.btn-allow').click(function() {
            var imageId = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('allow') }}",
                data: {
                    'imgId': imageId
                },
                type: 'post',
                success: function(response) {
                    $('#btn-' + imageId).text('Allowed');
                    $('#btn-' + imageId).addClass('btn-allowed');
                    $('#btn-' + imageId).prop('disabled', true);
                }

            })
        })
    </script>


@endsection
