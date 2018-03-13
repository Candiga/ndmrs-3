@extends('layouts.app')

@section('title', 'NDRMS - User Login')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-5">
              <div class="card p-4">
                  <div class="card-header text-center text-uppercase h4 font-weight-light">
                    NDRMS ADMIN LOGIN
                  </div>

                  <div class="card-body py-5">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="form-control-label">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="form-control-label">Password</label>
                              <input id="password" type="password" class="form-control" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                              <button type="submit" class="btn btn-primary px-5">
                                  Login
                              </button>

                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  Forgot Your Password?
                              </a>
                        </div>

                        <div class="form-group">
                          <a href="{{ route('register') }}">Register Here</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
