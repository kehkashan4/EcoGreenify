<div class="row cards-container">
    @foreach ($markers as $marker)
    <div class="col-6 col-md-3 mb-3 card-wrapper">
        <div class="card card-feature h-100">
            <a href="{{ route('marker.show', ['slug' => $marker->slug]) }}" class="text-decoration-none" style="color: inherit;">
                <div class="card-body p-0">
                    <img src="{{ $marker->image }}" class="card-img-top w-100" alt="">
                    <div class="px-2">
                        <p>{{ $marker->address }}</p>
                    </div>
                </div>
            </a>

            <!-- Footer ko <a> ke bahar nikal diya -->
            <div class="card-footer d-flex align-items-center">
                <div class="like-share d-flex align-items-center gap-2 ms-auto">
                    <span class="like" data-place="{{ $marker->id }}" onclick="toggleLike(this)"
                        style="font-size: 20px; color: {{ Auth::user() && Auth::user()->favorites->contains('marker_id', $marker->id) ? 'red' : '#d3d3d3' }}; cursor: pointer;">
                        <i class="fas fa-heart"></i>
                    </span>
                    <span class="share" style="font-size: 20px; color: #1DA1F2; cursor: pointer;">
                        <i class="fas fa-share-alt"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
