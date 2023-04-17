<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Scripts -->
    @vite(['resources/adminLTE/plugins/fontawesome-free/css/all.min.css', 'resources/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css', 'resources/adminLTE/dist/css/adminlte.min.css'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app" class="wrapper">
        @include('layouts.main-header')

        @include('layouts.menu-lateral')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1-b
            </div>
            <strong>Copyright &copy; {{ now() }} <a href="{{ route('home') }}">Sistema Administrativo</a>.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    @vite(['resources/adminLTE/plugins/jquery/jquery.min.js',
        'resources/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'resources/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'resources/adminLTE/dist/js/adminlte.min.js">',
        'resources/adminLTE/dist/js/demo.js'])
</body>
</html>
