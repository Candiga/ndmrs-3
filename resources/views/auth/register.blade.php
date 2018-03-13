@extends('layouts.app')

@section('title', 'NDRMS - Register User')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        NDRMS ADMIN REGISTRATIONS
                    </div>
                    {{ Form::open(['route' => 'register']) }}

                        <div class="card-body py-5">
                          {{ csrf_field() }}

                          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Full name', ['class' => 'form-control-label']) }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'required', 'autofocus']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', 'E-mail Address', ['class' => 'form-control-label']) }}
                            {{ Form::text('email', '', ['class' => 'form-control', 'id' => 'email', 'required']) }}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required']) }}

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-control-label']) }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'required']) }}
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Create Account</button>
                          </div>

                        </div>
                    <div class="card-footer">
                      <a href="{{ route('login') }}">Login Here</a>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
