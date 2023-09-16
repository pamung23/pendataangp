<!DOCTYPE html>
<html lang="id,in">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Data Gepang</title>
    <link rel="icon" type="image/x-icon" href="" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @stack('styles')

</head>

<body>

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        @include('admin.layouts.inc.header')
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        @include('admin.layouts.inc.header2')
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('admin.layouts.inc.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    @yield('content')

                </div>

            </div>
            @include('admin.layouts.inc.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
        $(document).ready(function() {
    $('#masterdata').on('click', function(e) {
        e.stopPropagation();
    });

    $('#kawasankonservasi').on('click', function(e) {
        e.stopPropagation();
    });

    $('#masterdata').on('shown.bs.collapse', function() {
        $('#kawasankonservasi').collapse('show');
    });

    $('#masterdata').on('hidden.bs.collapse', function() {
        $('#kawasankonservasi').collapse('hide');
    });
});
    </script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('scripts')
</body>

</html>