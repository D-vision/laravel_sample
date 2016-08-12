@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/'.$user->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('isAdmin') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <div class="panel panel-{{ $user->id==Auth::user()->id?'default':'danger' }}">
                                        <div class="panel-heading">
                                            <h5>It's realy serious!</h5>
                                        </div>
                                        <div class="panel-body">
                                            @if($user->id!=Auth::user()->id)
                                                <input type="hidden"   name="isAdmin" value="0">
                                            @endif
                                            <input type="checkbox" name="isAdmin" value="1" {{ $user->isAdmin?'checked="checked"':''}} {{ $user->id==Auth::user()->id?'disabled':'' }}>
                                            <span class="text-warning">User is Admin</span>
                                        </div>

                                        @if ($errors->has('isAdmin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('isAdmin') }}</strong>
                                            </span>
                                        @endif

                                        @if($user->id==Auth::user()->id)
                                            <p>{{ 'Removing admin rights to your user is bad idea!' }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-btn fa-user"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if($user->id!=Auth::user()->id)
                            <form action="{{ url('user/'.$user->id) }}" method="POST" onsubmit="return confirm('Really delete this user?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="pull-right btn btn-xs btn-danger">Delete user</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
