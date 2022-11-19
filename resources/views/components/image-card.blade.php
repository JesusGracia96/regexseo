<div class="image-card">
    <link rel="stylesheet" href="{{ asset('/css/components/imagecard.css') }}">

    <img src="{{ $image }}" alt="No-Image">
    <h3 class="image-title">
        {{ $title }}
    </h3>
    <p class="image-description">
        {{ $description }}
    </p>

    <p class="likes"><i class="fa fa-heart"></i> {{ $likes }}</p>
</div>