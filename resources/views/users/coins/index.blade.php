@extends('layouts.app')

@section('content')
    @csrf
    @method('PATCH')
    <div class="container-fluid py-4 container-profile100">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @include('users.partials.sidebar')
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        @auth
                            <button type="button" data-toggle="modal" data-target="#createCoin" class="btn btn-success" style="float: right;"> Add Coin</button>
                        @endauth
                        <h4>My Coins</h4>
                    </div>

                    <div class="card-body">
                        @sharedAlerts

                        <div class="row" style="text-align: center;">
                            @foreach ($stories as $story)
                                @if ( $story->coin )
                                    <div class="col-md-4 mb-2">
                                        <div class="card border-secondary">
                                            <div class="card-header text-center">{{ $story->coin->number }}</div>
                                            <div class="card-body text-secondary">
                                                <h5 class="card-title text-center">{{ $story->coin->phrase }}</h5>

                                                <div class="pull-left">
                                                    <h5>
                                                        <a target="_blank" href="/users/coins/{{ $story->coin->id }}/stories" title="View Connections" style="font-size: 15px;"> View Connections</a>
                                                    </h5>

                                                    <h5>
                                                        <a target="_blank" href="/track/{{ $story->coin->id }}/coin" title="View Location" style="font-size: 15px;"> Track Coin</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="createCoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Coin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            @sharedAlerts
                            <form method="POST" action="{{ route('coins.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="number">Coin Number</label>
                                    <input type="text" class="form-control form-control-lg" name="number" id="number" placeholder="Enter number" value="{{ old('number') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phrase">Coin Phrase (Include punctuation) </label>
                                    <input type="text" class="form-control form-control-lg" name="phrase" id="phrase" placeholder="Enter phrase" value="{{ old('phrase') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
