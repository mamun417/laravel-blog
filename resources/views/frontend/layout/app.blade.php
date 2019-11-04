<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <title>@yield('title', 'Blog') - {{ config('app.name', 'Laravel blog site') }}</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/common-css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/common-css/ionicons.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/layout-1/css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/layout-1/css/responsive.css') }}" rel="stylesheet">

    @stack('css')

</head>
<body>

@include('frontend.element.header')

@yield('content')

@include('frontend.element.footer')

<script src="{{ asset('frontend/common-js/jquery-3.1.1.min.js') }}"></script>

<script src="{{ asset('frontend/common-js/tether.min.js') }}"></script>

<script src="{{ asset('frontend/common-js/bootstrap.js') }}"></script>

<script src="{{ asset('frontend/common-js/scripts.js') }}"></script>

@stack('js')

</body>
</html>
