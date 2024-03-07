<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App_Gestion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="vendor/select2/dist/js/select2.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand layout-navbar-fixed " style="background: #040404f5;">

            <!-- navbar-white navbar-light -->
            <ul class="navbar-nav ml-auto ">
                <!-- Pour integrer le top navbar -->
                <x-topnavbar />
                <aside class="main-sidebar sidebar-dark-primary elevation-4 text-bold" style="background: #040404f5; ">

                    <div class="sidebar">

                        <a href="#" class="brand-link">
                            <img src="{{ asset('images/innov2b.jpg') }}" alt="LogoInnov2b"
                                class="brand-image img-fluid rounded shadow border">
                            <span class="brand-text font-weight-bold"> <b>INOV'2B</b></span>
                        </a>

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                            <div class="image">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">User Name </a>
                            </div>
                        </div>
                        <!-- Pour integrer le menu -->
                        <div class=" text-black " style="font-family: 'Arial' , sans-serif; ">
                            <x-menu />
                        </div>
                    </div>

                </aside>

                <!-- Pour integrer la sidebar -->
                <x-sidebar />


                <div class="content-wrapper">
                    <div class="content">
                        <div class="container-fluid bg-white ">
                            @yield('content')

                        </div>
                    </div>
                </div>

                <!-- Pour integrer le footer -->
                <x-footer />- ./wrapper -->

                <!-- jQuery -->
                <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <!-- AdminLTE App -->
                <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
