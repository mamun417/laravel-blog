<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel blog') - {{ config('app.name', 'Laravel blog site') }}</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/common-css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/common-css/swiper.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/common-css/ionicons.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('backend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/common-css/custom_style.css') }}" rel="stylesheet">

    @stack('css')

</head>
<body>

@include('frontend.element.header')

@yield('content')

@include('frontend.element.footer')

<script src="{{ asset('frontend/common-js/jquery-3.1.1.min.js') }}"></script>

<script src="{{ asset('frontend/common-js/tether.min.js') }}"></script>

<script src="{{ asset('frontend/common-js/bootstrap.js') }}"></script>

<script src="{{ asset('frontend/common-js/swiper.js') }}"></script>

<script src="{{ asset('frontend/common-js/scripts.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('backend/js/plugins/toastr/toastr.min.js') }}"></script>

<script>
    $(function () {

        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2500
        };

        //Toastr message for domain event trigger
        @if(session('successMsg'))
            toastr.success('{{ session('successMsg') }}');
        @endif

        @if(session('errorMsg'))
            toastr.error('{{ session('errorMsg') }}');
        @endif

    });
</script>

@stack('js')

</body>
</html>
