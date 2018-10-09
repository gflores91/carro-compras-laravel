<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CCLV | @yield('title')</title>
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">
    <link href="{{ mix('css/eshopper.css') }}" rel="stylesheet">
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.js"></script>
    <![endif]-->    
    {{--   
    <link rel="shortcut icon" href="{{ mix('images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ mix('images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ mix('images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ mix('images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ mix('images/ico/apple-touch-icon-57-precomposed.png') }}">
    --}}
    @yield('styles')
</head>
<body>

    @include('partials.header')
    
    @yield('slider')

    @yield('content')        
   
    @include('partials.footer')

    <script src="{{mix('js/main.js')}}"></script>
    <script src="{{mix('js/eshopper.js')}}"></script>
    <script src="{{mix('js/custom.js')}}"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "500",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif

    @if(count($errors) > 0){{--Mensaje error--}}
        toastr.error("@foreach($errors->all() as $error)"+
                        "<p>{{$error}}</p>"+
                     "@endforeach");
    @endif{{--./Mensaje error--}}
    </script>
    
    @yield('scripts')
</body>
</html>