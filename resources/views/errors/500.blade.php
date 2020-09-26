<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
        /**
         * The template for displaying 404 pages (not found)
         *
         * @package gostock
         * @subpackage gostockaleart
         * @since Go Stock Alert
         */
        ?>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <link href="{{ asset('css/404.css') }}" rel="stylesheet" type="text/css">


    <section class="body-section not-found-page">
        <span class="left">
            <i class="fa fa-meh-o"></i>
            <h1>Not authorized</h1>
        </span>
        <div class="container">


            <div class="not-found">

                
        <!--
                <p class="error-area">404 <span>error</span></p>
        -->
                <p>You are not authorized to access this.<a href="<?= route('admin'); ?>">Home Page</a></p>

            </div>
        </div>
    </section>
</body>
</html>