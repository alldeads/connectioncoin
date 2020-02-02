@if (count($relatedStories))
    <h3 class="text-white">Connected Stories</h3>
    <div class="row">
        @foreach ($relatedStories as $story)
            <div class="col-md-4 mb-3">
                <a href="{{ route('stories.show', ['story' => $story->id]) }}" class="custom-card">

                    <div class="fotorama" data-fit="cover" data-arrows="true" data-click="true" data-swipe="false" data-ratio="800/800" data-width="100%" style="border-radius: 1.5%;">
                        @foreach( $story->images as $image )
                          <img src="{{ Storage::url($image->filepath) }}" class="card-img-top" alt="{{ $story->title }}">
                        @endforeach
                    </div>

                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->title }}</h5>
                            <p class="card-text">{!! $story->theDescription !!}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
