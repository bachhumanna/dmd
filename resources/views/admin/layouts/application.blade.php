<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <!-- Styles -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">


        <script src="{{ asset('/admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!--        <link href="{{ asset('/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />-->
        <link href="{{ asset('/admin/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!--        <link href="{{ asset('/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />-->
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
        <!--        <link href="{{ asset('/admin/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />-->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('/admin/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('/admin/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('/admin/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/css/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <!--        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css">-->
        <!-- END THEME LAYOUT STYLES -->
        <!-- CORE CSS TEMPLATE - END -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
        @yield('pagestyle')
    </head>







    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                @yield('top_menu')

                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    @yield('sidebar_menu')
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <div class="page-content">
                        @include('admin.common.breadcrumb')


                        @include('admin.common.flashmessage')

                        <!-- BEGIN PAGE BAR -->

                        <!-- BEGIN CONTENT BODY -->
                        @yield('body')
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->


            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                @yield('footer')
            </div>
            <!-- END FOOTER -->
        </div>


        <!-- BEGIN CORE PLUGINS -->

        <script src="{{ asset('/admin/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('/admin/js/app.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('/admin/js/layout.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        @yield('pagescript')

        <script>
            $(document).ready(function () {
                $('.moreIcons .more').click(function () {

                    $(this).next('.listIcons').slideToggle(50);

                });
                
                
                //Stop Enter key submit 
                $(window).keydown(function(event){
                    if(event.keyCode == 13) {
                      event.preventDefault();
                      return false;
                    }
                  });
                  
                  
                  
                  


                window.changevalue = 0;

                $(document).on("change keyup", "form input, form select,form textarea", function () {
                    window.changevalue = 1;
                });

                $("a.btn-danger").on('click', function (e) {
                    if (window.changevalue) {
                        e.preventDefault();
                        swal({
                            title: "Warning",
                            text: 'You have not save your change you want to leave this page !',
                            icon: "warning",
                            buttons: [
                                'Yes, Leave it!',
                                'No, I Stay here'
                            ],
                        }).then((confirm) => {
                            if (!confirm) {
                                url = $(this).attr("href")
                                location.assign(url);
                            }
                        });
                    }
                });


 
                  
                  
            })
        </script>
        <style>
            .ml10{
                margin-left: 10px
            }
        </style>
    </body>
</html>
