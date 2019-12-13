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

    <script src="{{ asset('frontend/common-js/jquery-3.1.1.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('css')

</head>
<body>

@include('frontend.element.header')

@yield('content')

@include('frontend.element.footer')

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

@yield('custom-js')

<script>

    var App = new Vue({
        el: "#app",
        data: {
            posts: [],
        },

        mounted() {

        },

        methods:{

            addToFavoritePost(e){

                var post_id = e.currentTarget.getAttribute('post_id'),
                    url = '{{ route('frontend.post.favorite.store', ':post') }}',
                    url = url.replace(':post', post_id),
                    thisTarget = e.currentTarget;

                axios.get(url)
                    .then(function (response) {

                        var fav_user_counter = $(thisTarget).find('span');

                        if(response.data.status === 'added'){

                            $(thisTarget).find('i').addClass('active-favorite-post');

                            $(fav_user_counter).text( parseInt($(fav_user_counter).text())+1);
                            //e.currentTarget.classList.add('class_name');

                        }else{

                            $(thisTarget).find('i').removeClass('active-favorite-post');
                            $(fav_user_counter).text( parseInt($(fav_user_counter).text())-1);
                        }
                        toastr.success(response.data.message);
                    }
                );
            }
        }
    })

</script>

</body>
</html>
