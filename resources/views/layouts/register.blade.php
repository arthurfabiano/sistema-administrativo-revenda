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
<body class="hold-transition register-page">
        <div id="app" class="wrapper">
            @yield('content')
        </div>

    <!-- Scripts -->
    @vite(['resources/adminLTE/plugins/jquery/jquery.min.js',
        'resources/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'resources/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'resources/adminLTE/dist/js/adminlte.min.js">'])
</body>
</html>
