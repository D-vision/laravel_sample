@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h5>All users</h5>
                    </div>
                    <div class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item">
                                <a href="{{ url('user/'.$user->id) }}">{{ $user->name }}</a>
                                <a href="{{ url('user/'.$user->id) }}" class="glyphicon-chevron-right glyphicon pull-right"></a>
                            </li>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('/user/create') }}" class="btn btn-block btn-primary">New user</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection