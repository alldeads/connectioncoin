@extends('layouts.app')

@section('content')
<style type="text/css">
    .connection_emoji {
        width: 45px;
        padding-bottom: 15px;
    }
</style>
<div class="container-fluid py-4 container-profile100">
    @sharedAlerts

    @include('layouts.report')

    @foreach ($stories as $story)
        @if( strlen( $story->title ) != 0 && strlen( $story->description ) != 0 )
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-5 py-2 col-sm-12">
                    <div class="panel shadow" style="background-color:white; margin-bottom: 12px; border-radius: 1.5%;">
                        <div class="fotorama" data-fit="cover" data-arrows="true" data-click="true" data-swipe="false" data-ratio="800/800" data-width="100%" style="border-radius: 1.5%;">
                          @foreach( $story->images as $image )
                              <img src="{{ $image->getCompressImage( $image->filepath ) }}" class="card-img-top" alt="{{ $story->title }}">
                          @endforeach
                        </div>
                    
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                @include('shared.user-connection-lists')
                                <a href="{{ route('stories.show', ['story' => $story->id]) }}" class="custom-card">
                                  <h5 class="card-title">{{ $story->title }}</h5>
                                  <p class="card-text">{!! $story->theDescription !!}</p>
                                </a>
                                @include('layouts._emotions', ['story' => $story])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="row justify-content-center">
        {{ $stories->links() }}
    </div>
</div>
@endsection