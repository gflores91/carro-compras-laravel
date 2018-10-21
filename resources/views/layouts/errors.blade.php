<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>shcart | @yield('title')</title>
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">
    <link href="{{ mix('css/eshopper.css') }}" rel="stylesheet">
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.js"></script>
    <![endif]-->
    @yield('styles')
</head>
<body>

    @include('partials.header')

    @yield('slider')

    @yield('content')

    @include('partials.footer')

    <script src="{{asset('js/appgeneral.min.js')}}"></script>
    <script src="{{asset('js/eshopper.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
</body>
</html>
