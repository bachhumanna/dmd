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
                <img src="{{ asset('admin/pages/img/dmd_logo.jpg') }}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            
            <form class="login-form" method="POST" action="{{ route('forgotpasswordpost') }}">
                        {{ csrf_field() }}
                        
                <h3 class="form-title font-green">Forget Password</h3>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span> {{ $message }} </span>
                    </div>
                @endif
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus /> 
                    @if ($errors->has('password'))
                        <span class="required">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="re_password" /> 
                    @if ($errors->has('re_password'))
                        <span class="required">{{ $errors->first('re_password') }}</span>
                    @endif
                
                </div>
                <div class="form-actions">
                    <input type="hidden" value="<?= $id ?>" name="id">
                    <button type="submit" class="btn green uppercase">Submit</button>                  
                </div>
                
            </form>
            <!-- END LOGIN FORM -->
           
        </div>
        <div class="copyright"> {{ date("Y",strtotime('now')) }} © {{ config('app.name', 'Laravel') }} </div>
        <script src="{{ asset('admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        
  
    </body>

</html>

