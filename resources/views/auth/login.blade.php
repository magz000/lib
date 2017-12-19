@extends('layouts.client.app')

@section('content')

    <section>
        <div class="container">
            <div class="row p-5 justify-content-center">
                <div class="col-md-6 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="text-primary">Login</h3></div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('client.loginprocess') }}">
                                {{ csrf_field() }}

                                @if(Session::has('login_failed'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('login_failed') }}
                                    </div>
                                @endif

                                @if(Session::has('registration_successful'))
                                    <div class="alert alert-success">
                                        {{ Session::get('registration_successful') }}
                                    </div>
                                @endif

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-8 control-label text-secondary">E-Mail Address </label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-8 control-label text-secondary">Password</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-4">
                                        <div class="checkbox">
                                            <label class="text-secondary">
                                                <input type="checkbox" name="remember" > Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                        </button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your
                                            Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
