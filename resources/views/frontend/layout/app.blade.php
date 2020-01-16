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

    <script src="{{ asset('frontend/common-js/jquery-3.1.1.min.js') }}"></script>

    @stack('css')

    <link href="{{ asset('frontend/common-css/custom_style.css') }}" rel="stylesheet">

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

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
    function getSuggestion(e){

        var query = $(e).val();

        if (query.trim() === ''){
            $('#show-suggestion').html('').addClass('hidden');
            return;
        }

        axios.get('{{ route('frontend.posts.get-autocomplete-posts') }}', { params: { query:query } })
            .then(function (response) {

                if(response.data.length > 0){
                    $('#show-suggestion').removeClass('hidden').html(response.data);
                }else {
                    $('#show-suggestion').addClass('hidden');
                }
            }
        );
    }
</script>

<script>

    function addToFavoritePost(e){

        var post_id = $(e).attr('post_id'),
            url = '{{ route('frontend.post.favorite.store', ':post') }}',
            url = url.replace(':post', post_id);

        axios.get(url).then(function (response) {

            var fav_user_counter = $(e).find('span');

            if(response.data.status === 'added'){

                $(e).find('i').addClass('active-favorite-post');

                $(fav_user_counter).text( parseInt($(fav_user_counter).text())+1);

            }else{

                $(e).find('i').removeClass('active-favorite-post');
                $(fav_user_counter).text( parseInt($(fav_user_counter).text())-1);
            }
            toastr.success(response.data.message);
        });
    }
</script>

{{--<script>

    var App = new Vue({
        el: "#app",
        data: {
            reply_form: '',
        },

        mounted() {

            @auth
                @php($image = Auth::user()->image)
            @else
                @php($image = '')
            @endauth

            this.reply_form = '<div class="comment-form-section">' +
                '<div class="comment-owner">' +
                    '<img src="{{ Storage::disk('public')->url('profile/'.$image) }}">' +
                '</div>' +
                '<div class="comment-box">' +
                    '<textarea @keyup="typingComment" placeholder="Write a reply" class="form-control"></textarea>' +
                '</div>' +
            '</div>';
        },

        methods:{

            showReplyForm(e){

                if(e.currentTarget.getAttribute('rep_form') === "1") return;

                var replyForm = this.reply_form;

                $(e.currentTarget).attr('rep_form', 1);

                var reply_type = e.currentTarget.getAttribute('reply_type'),
                    parent_div = $(e.currentTarget).parents('.single-comment');

                if(reply_type === 'onlyReply'){

                    var checkReplies = $(parent_div).next().hasClass('comment-replies');

                    if(checkReplies){

                        var last = $(parent_div).next('.comment-replies').find('.single-comment').last();

                        $(last).after(replyForm);

                        $(last).next('.comment-form-section').find('textarea').focus();

                    }else{
                        $(parent_div).after('<div class="comment-replies">'+replyForm+'</div>');
                        $(parent_div).next('.comment-replies').find('textarea').focus();
                    }

                }else if(reply_type === 'mentionReply'){

                    var mentioned_user_name = $(e.currentTarget).parents('.comment-body').find('.comment-info a b').text(),
                        mentioned_name_length = mentioned_user_name.length;

                    $(parent_div).after(replyForm);

                    $($(parent_div).next('.comment-form-section').find('textarea').html(document.createTextNode(mentioned_user_name +' ')).focus())[0].setSelectionRange(mentioned_name_length+1, mentioned_name_length+1);
                }
            },

            typingComment(e){

                alert('ok');

                this.style.height = '1px';
                this.style.height = (1+this.scrollHeight)+'px';
            }
        }
    })

</script>--}}

</body>
</html>
