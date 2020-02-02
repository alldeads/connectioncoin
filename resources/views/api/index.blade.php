@extends('layouts.app')

@section('content')

<div class="container-fluid py-4 container-profile100">
    @sharedAlerts

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-5 py-2 col-sm-12">

            <div class="panel shadow text-right" style="margin-bottom: 12px;">
                
                <form method="POST">
                    @csrf
                    <input type="hidden" name="export" value="1">
                    <button type="submit" class="btn btn-danger"> Export CSV</button>
                </form>
            </div>

            <div class="panel shadow" style="background-color:white; margin-bottom: 12px;">
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <td> Name</td>
                            <td> Email</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->first_name . " " . $user->last_name }}</td>
                                <td> {{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div class="row justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection