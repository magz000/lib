<!-- Login Modal -->

{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>--}}

<div class="modal fade bd-example-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="Login"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('client.loginprocess') }}">

                <div class="modal-body">
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

                    <div class="form-group">
                        <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-6 control-label">Password</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">


                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i> Login
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
