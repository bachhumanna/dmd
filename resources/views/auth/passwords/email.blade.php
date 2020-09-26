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
                        <h3>Forgot Password</h3>

                    </div>
                    <form action="{{ route('password.email') }}" method="POST" id="contactform" class="formArea">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-5">
                                <label for="text">Email</label>
                                <input id="email" type="email" class="form-wrap" name="email" value="{{ old('email') }}" required autofocus>
                                <span id="name_error" class="error">{{ $errors->first('email') }}</span>
                            </div>


                        </div>
                        <input type="hidden" name="action" value="contact_form">
                        <button type="submit" value="Login" class="btn btn-default">
                            Reset <i class="fa fa-arrow-right"></i>
                        </button>
                        <div class="signUpArea">
                            <p>Don't have an account?<a href="{{ route('provider-signup') }}"> Signup now!</a></p>
                            <p>  <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
