<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>
            @yield('title', config('app.name', 'Laravel'))



        </title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117343760-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-117343760-1');
        </script>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!--font awesome icon-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        @yield('meta')
        <!--plagin css-->
        <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
        <!--page style-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css">
        
        <!--page Specific js-->
        @yield('pagecss')
        <!--page Specific js-->
    </head>

    <body>

        @include('common.header')
        <?php
        $currentPath = Request::route()->getName();
        $allowAddthis = ['home', 'blogdetails', 'howitworks', 'about-us', 'blogs', 'contact-us'];
        if (in_array($currentPath, $allowAddthis)) {
            ?>   
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5acf106d76151610"></script>
        <?php } ?>
        @yield('content')


        @include('common.footer')

        <!--footer open-->
        <!--footer close-->

        <!--js librery-->


        <!--placeholder-->
        <script src="{{ asset('js/placeholder.min.js') }}"></script>
        <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
        <!--custom js-->

        <script src="{{ asset('js/jquery.mCustomScrollbar.js') }}"></script>	
        <script src="{{ asset('js/slick.min.js') }}"></script>	
        <script src="{{ asset('js/custom.js?var=1.1') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <!--script-->

        <!--page Specific js-->
        @yield('pagescript')
        <!--page Specific js-->
        <script>
        </script>
    </body>
</html>