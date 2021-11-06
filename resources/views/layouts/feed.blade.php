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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v='.filemtime(public_path('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/socialv1fc6.css?v=4.0.0')}}">
    <link rel="stylesheet" href="{{asset('assets/css/libs.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/remixicon/fonts/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css')}}">


</head>
<body>
<div  class="wrapper" id="app">
    @include('layouts.public-menu')
    @include('layouts.public-topmenu')
    @include('layouts.public-rightbar')

    <div id="content-page" class="content-page">
        <div class="container">
            @yield('content')
        </div>
    </div>

</div>

<!-- Backend Bundle JavaScript -->
<script src="https://kit.fontawesome.com/692591416e.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js?v='.filemtime(public_path('js/app.js')) }}"></script>
<script src="{{ asset('assets/js/libs.min.js')}}"></script>
<!-- slider JavaScript -->
<script src="{{ asset('assets/js/slider.js')}}"></script>
<!-- masonry JavaScript -->
<script src="{{ asset('assets/js/masonry.pkgd.min.js')}}"></script>
<!-- SweetAlert JavaScript -->
<script src="{{ asset('assets/js/enchanter.js')}}"></script>
<!-- SweetAlert JavaScript -->
<script src="{{ asset('assets/js/sweetalert.js')}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/js/customizer.js')}}"></script>
<!-- app JavaScript -->
<script src="{{ asset('assets/js/charts/weather-chart.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
<script src="{{ asset('assets/js/lottie.js')}}"></script>
<!-- Scripts -->

</body>
</html>
