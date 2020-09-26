    @extends('layouts.application')
    @section('content')

    <section class="loginWrap">
        <div class="container clear">
            <div class="loginArea paddtb middle">
                <div class="col-6 col">
                    <div class="leftPart">
                        <p>Welcome to</p> 
                        <h4>Red Flag Data</h4>
                        <h3>MEMBER LOGIN</h3>
                        <strong>or</strong>
                        <a href="{{ route('provider-signup') }}">register now<i class="fa fa-arrow-right"></i> </a>
                    </div>

                </div>
                <div class="col-6">
                    <div class="rightPart">
                        <div class="loginHeading middle">
                            <h3>Reset Password</h3>
                            <img src="images/sign-in.png" alt="">
                        </div>
                        <form action="{{ route('password.request') }}" method="POST" id="contactform" class="formArea">
                            {{ csrf_field() }}

                            <div class="form-group row">




                                <div class="col-5{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                        <span id=" " class="error">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="col-5 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <span id=" " class="error">{{ $errors->first('password') }}</span>

                                    </div>
                                </div>

                                <div class="col-5{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                        <span id=" " class="error">{{ $errors->first('password_confirmation') }}</span>
                                    </div>
                                </div>





















                                <input type="hidden" name="token" value="{{ $token }}">



                            </div>
                            <input type="hidden" name="action" value="contact_form">
                            <button type="submit" value="Login" class="btn btn-default">
                                Reset Password <i class="fa fa-arrow-right"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>	
    </section>
    @endsection
