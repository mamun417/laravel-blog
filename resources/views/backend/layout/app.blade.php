<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel blog') - {{ config('app.name', 'Laravel blog') }}</title>

    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">


    <!-- Toastr style -->
    <link href="{{ asset('backend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('backend/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>

    {{--Tokenize2--}}
    <link href="{{ asset('backend/extra-plugin/tokenize2/tokenize2.min.css') }}" rel="stylesheet">

    {{--Summernote editor--}}
    <link href="{{ asset('backend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">

    {{--sweet alert--}}
    <link href="{{ asset('backend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

    {{--custom style--}}
    <link href="{{ asset('backend/css/custom_style.css') }}" rel="stylesheet">

    @stack('css')

</head>

<body class="{{ Session::has('hideSidebar') ? 'mini-navbar':'' }}">
<div id="wrapper">

    @include('backend.element.sidebar')

    <div id="page-wrapper" class="gray-bg">

        @include('backend.element.header')

        @yield('content')

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>


<!-- Peity -->
<script src="{{ asset('backend/js/plugins/peity/jquery.peity.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('backend/js/inspinia.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace/pace.min.js') }}"></script>

<script src="{{ asset('backend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('backend/js/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('backend/js/plugins/iCheck/icheck.min.js') }}"></script>

{{--Tokenize2--}}
<script src="{{ asset('backend/extra-plugin/tokenize2/tokenize2.min.js') }}"></script>

<!-- SUMMERNOTE -->
<script src="{{ asset('backend/js/plugins/summernote/summernote.min.js') }}"></script>

{{--Sweetalert--}}
<script src="{{ asset('backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.summernote').summernote();
    });
</script>

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

{{--toastr message--}}
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



    //show confirm message when approve pending post
    function changeApproveStatus(rowId, approveStatus) {

        var status = (approveStatus === 1)?"unapprove":"approve";

        swal({
            title: "Are you sure?",
            text: "You went to "+status+" this post!",
            type: "warning",
            showCancelButton: true,
            allowOutsideClick: true,
            cancelButtonColor: "#1ab394",
            confirmButtonColor: "#1ab394",
            confirmButtonText: "Yes, "+status+" it!",
            closeOnConfirm: true
        }, function () {
            document.getElementById('approve-form'+rowId).submit();
        });
    }


    //show confirm message when delete table row
    function deleteRow(rowId) {

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this item!",
            type: "warning",
            showCancelButton: true,
            allowOutsideClick: true,
            confirmButtonColor: "#1ab394",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }, function () {
            document.getElementById('row-delete-form'+rowId).submit();
        });
    }

</script>

@yield('custom-js')

</body>
</html>
