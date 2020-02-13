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
                

                {{-- <div class="row mb-2">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-auto">
                        <input style="border-width:2px !important; border-radius: 0.25rem !important;" class="form-control" type="text" name="search" placeholder="Search">
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-lg-12 col-12"> 
                        <div class="message-wrapper">
                            <ul class="messages">
                                @foreach($messages as $message)
                                    <li class="message clearfix">
                                        {{--if message from id is equal to auth id then it is sent by logged in user --}}
                                        <div class="{{ ($message->from_user_id == Auth::id()) ? 'sent' : 'received' }}">
                                            <p>{{ $message->text }}</p>
                                            <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="input-text mb-3">
                            <form method="POST" action="/create/message">
                                @csrf
                                <div class="input-group">
                                    <input type="hidden" id="to_user_id" name="to_user_id" value="{{ $to_user_id }}">
                                    <input style="padding:25px; border-width:2px !important; border-radius: 0.25rem !important;" class="form-control" name="message" id="messagetext" placeholder="Type your message">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">
                                            <button id="sendbtn" type="submit" class="btn btn-outline-secondary">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
@endsection
