
<html lang="{{ app()->getLocale() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('admin/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('admin/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('admin/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="{{ route('admin') }}">
                <img style="width: 250px;" src="{{ asset('admin/img/logo.png') }}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
      
            <form class="forgot-password-form" method="POST" action="{{ route('do-reset') }}">
                        {{ csrf_field() }}
                      <input type="hidden" name="secret" value="<?= $secret ?>" />

                <h3 class="form-title font-green">Enter password.</h3>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span> {{ $message }} </span>
                    </div>
                @endif
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Password</label>

                    <input id="password" type="password" class="form-control form-control-solid placeholder-no-fix"  autocomplete="off" placeholder="password" name="password"  required autofocus>

                    @if ($errors->has('password'))
                        <span class="required">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>


                    <input id="password" type="password" class="form-control form-control-solid placeholder-no-fix"  autocomplete="off" placeholder="confirm password" name="password_confirmation"  required autofocus>

                    @if ($errors->has('password_confirmation'))
                        <span class="required">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="form-actions">

                  <input type="hidden" name="action" value="reset_password_form">
                    <button type="submit" value="Login" class="btn green uppercase">Submit</button>


                        <span></span>
                    </label>

                </div>

            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->

            <!-- END FORGOT PASSWORD FORM -->

        </div>
        <div class="copyright"> {{ date("Y",strtotime('now')) }} © {{ config('app.name', 'Laravel') }} </div>
        <script src="{{ asset('admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>


    </body>

</html>
