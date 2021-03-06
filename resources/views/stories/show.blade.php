@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="fotorama" data-arrows="true" data-click="true" data-swipe="false" data-width="100%" style="border-radius: 1.5%;">
                    @foreach( $story->images as $image )
                      <img src="{{ Storage::url($image->filepath) }}" class="card-img-top" alt="{{ $story->title }}">
                    @endforeach
                </div>
                <div class="card-body">
                    @include('shared.user-connection-lists')
                    <h3 class="card-title">{{ $story->title }}</h3>
                    <p class="card-text">{!! nl2br($story->description) !!}</p>
                    @can('update', $story)
                        <a href="{{ route('stories.edit', ['story' => $story]) }}" style="color: #0085ad;" class="btn btn">
                            <i class="far fa-edit"></i>
                        </a>
                    @endcan
                    @can('delete', $story)
                        <a href="#" class="btn" style="color: #0085ad" onclick="event.preventDefault(); var r = confirm('Are you sure?');  if (r) { document.getElementById('delete-story-form-{{ $story->id }}').submit(); }"><i class="fa fa-trash"></i></a>
                        <form id="delete-story-form-{{ $story->id }}" action="{{ route('stories.destroy', ['story' => $story]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endcan
                </div>
                <div class="card-footer">
                    <small class="text-muted">Posted {{ $story->getPostedDate( $story->created_at ) }}</small>
                    @include('stories.partials.report', ['story' => $story])
                    <div class="float-right">
                        <small class="text-muted mr-2">
                            {{ count($relatedStories) }} Connections Made
                        </small>
                        <small class="text-muted">Posted by:
                            <a href="{{ route('users.show', ['user' => $story->user]) }}"><img src="{{ $story->user->thePhoto }}" title="{{ $story->user->getFullName() }}" class="img-thumbnail rounded-circle" style="width: 30px; height: 30px;"></a>
                        </small>
                    </div>
                </div>
            </div>
            @include('stories.partials._related-stories')
        </div>
        <div class="col-md-4">
            <h3>Comments</h3>
            @sharedAlerts
            <div class="comments-container">
                @foreach ($comments as $comment)
                    <div class="card border-primary mb-3">
                        <div class="card-body text-primary">
                            <p class="card-text">{!! $comment->text !!}</p>
                            <small><a href="/users/{{ $comment->user_id }}">{{ $comment->user->getFullName() }} - {{ $comment->theCreatedAt }}</a></small>
                        </div>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control form-control-lg" required name="text" id="text" placeholder="Comment..."></textarea>
                </div>
                <input type="hidden" name="story_id" value="{{ $story->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
