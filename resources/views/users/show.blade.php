@extends('layouts.app')

@section('content')
    @csrf
    @method('PATCH')
    <div class="container-fluid py-4 container-profile100">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-5">
                @include('users.partials.sidebar')
            </div>
        </div>
    </div>
@endsection
