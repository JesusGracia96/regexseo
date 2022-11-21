<div class="image-card" id="{{ $id }}">
    <link rel="stylesheet" href="{{ asset('/css/components/imagecard.css') }}">

    <img class="image-prev" src="{{ $image }}" alt="No-Image">
    <h3 class="image-title">
        {{ $title }}
    </h3>
    <p class="image-description">
        {{ $description }}
    </p>
    @if (isset($toModerate) && $toModerate == 1)
        <form>
            <button type="button" class="btn btn-w w-100 btn-allow" value="{{ $id }}" id="btn-{{ $id }}">ALLOW</button>
        </form>
    @else
        @if ($author != null)
            <p>Author: {{ $author }}</p>
        @endif
        <p class="likes"><i class="fa fa-heart"></i> {{ $likes }}</p>
    @endif
</div>
