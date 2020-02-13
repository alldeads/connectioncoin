@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    @sharedAlerts

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-5">
            <div class="card bg-light text-dark border-0">

                <div class="row">
                    <div class="col-lg-5 col-sm-7 col-7 col-md-7">
                        <h5 class="p-3"> Messages</h5>
                    </div>

                    <div class="col-lg-7 col-md-5 col-sm-5 col-5">
                        <div class="row">
                            <div class="col-5">
                                <a href="/create/message" class="btn btn-block btn-outline-secondary mt-3" style="border-radius: 50px;"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-5">
                                <a href="/messages" class="btn btn-block btn-outline-secondary mt-3" style="border-radius: 50px;"><i class="fas fa-users"></i></a>
                            </div>
                        </div>
                    </div>
                </div>           
{{-- 
                <div class="row mb-2">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-auto">
                        <input style="border-width:2px !important; border-radius: 0.25rem !important;" class="form-control" type="text" name="search" placeholder="Search">
                    </div>
                </div> --}}

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="message-wrapper">
                            @foreach( $messages as $message )
                                <a href="/messages/{{ $message->from_user_id == auth()->id() ? $message->to_user_id : $message->from_user_id}}">
                                    <div class="row people" style="padding: 15px;">
                                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center">
                                            @if ( $message->from_user_id == auth()->id() )
                                                <img src="{{ $message->recipient->thePhoto }}" 
                                                    title="{{ $message->recipient->getFullName() }}" 
                                                    alt="{{ $message->recipient->getFullName() }}" 
                                                    class="img-thumbnail rounded-circle" 
                                                    style="width: 55px; height: 55px; margin-right: 5px; border: 4px solid {{ "#" . ltrim($message->recipient->getMilestone( $message->recipient->connection_made ), "d") }};">
                                            @else
                                                <img src="{{ $message->user->thePhoto }}" 
                                                    title="{{ $message->user->getFullName() }}" 
                                                    alt="{{ $message->user->getFullName() }}" 
                                                    class="img-thumbnail rounded-circle" 
                                                    style="width: 55px; height: 55px; margin-right: 5px; border: 4px solid {{ "#" . ltrim($message->user->getMilestone( $message->user->connection_made ), "d") }};">
                                            @endif
                                        </div>

                                        @if ( $message->from_user_id == auth()->id() )

                                            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                                <h5> {{ $message->recipient->getFullName() }}</h5>
                                                <small class="text-dark"> {{ str_limit($message->getTheLastMessage($message->from_user_id, $message->to_user_id), 50) }}</small>
                                            </div>
                                        @else
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                                <h5> {{ $message->user->getFullName() }}</h5>
                                                <small class="text-dark"> {{ str_limit($message->getTheLastMessage($message->to_user_id, $message->from_user_id, true), 50) }}</small>
                                            </div>
                                        @endif

                                        {{-- @if ( $count = $message->getUnreadMessages( $message->from_user_id, $message->to_user_id ) > 0 )

                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <small class="badge badge-danger"> {{ $count }}</small>
                                            </div>
                                        @endif --}}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
@endsection
