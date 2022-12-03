<div class="image-card" id="{{ $id }}">
    <div class="main-image-container">
        <img class="image-prev" src="{{ $image }}" alt="No-Image">
    </div>
    <div class="image-info">
        <h3 class="image-title">
            {{ $title }}
        </h3>
        <p class="image-description">
            {{ $description }}
        </p>
        @if (isset($toModerate) && $toModerate == 1)
            <form>
                <button type="button" class="btn btn-w w-100 btn-allow" value="{{ $id }}"
                    id="btn-{{ $id }}">ALLOW</button>
            </form>
        @else
            @if ($author != null)
                <p>Author: {{ $author }}</p>
            @endif
            <p class="likes"><i
                    class="fa fa-heart like-btn 
            @if (\App\Models\Like::where('imageid', '=', explode('-', $id)[2])->where('userid', '=', Auth::id())->count() == 1) color-red @endif"
                    id="like-{{ $id }}"></i> <span
                    id="like-span-{{ $id }}">{{ $likes }}</span>
            </p>
        @endif
    </div>
</div>
