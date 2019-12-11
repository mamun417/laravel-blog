<div id="root">
    <header>
        <div class="container-fluid position-relative no-side-padding">

            <a href="/" class="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="Logo Image"></a>

            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

            <ul class="main-menu visible-on-click" id="main-menu">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('frontend.all-posts') }}">Posts</a></li>

                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    @if(Auth::user()->role->id == 1)
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                    @endif
                @endguest

            </ul><!-- main-menu -->


            <div class="src-area">
                <form action="{{ route('frontend.posts.search') }}" method="GET">
                    <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    <input @keyup="getSuggestion" name="query" autocomplete="off" value="{{ request('query') }}" class="src-input" type="text" placeholder="Type of search">
                </form>
            </div>
        </div>
    </header>

    <div id="show-suggestion" class="autocomplete-result hidden">
        <ul>
            <li v-for="post in posts">
                <a href="">
                    <div>
                        <img class="" src="http://glossybazar.com/demo/eshopper/public/admin/uploads/images/products/vtvnnu4x_remi%207%20pro.jpeg">
                        <span>@{{ post.title }}</span><br>
                        <span><small>Created on 5 sep 2019 by <b>Abdullah al mamun</b></small></span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

@section('custom-js')

    <script>

        var App = new Vue({
            el: "#root",
            data: {
                posts: [],
            },

            mounted() {
                console.log('Yap, vueJs run properly!');
            },

            methods:{
                getSuggestion(e){

                    query = e.target.value;

                    if (query.trim() !== ''){

                        currentApp = this;

                        axios.get('{{ route('frontend.posts.get-autocomplete-posts') }}', { params: { query:query } })
                            .then(function (response) {

                                if(response.data.length > 0){
                                    $('#show-suggestion').removeClass('hidden');
                                    currentApp.posts = response.data;
                                }else {
                                    $('#show-suggestion').addClass('hidden');
                                }
                            }
                        );
                    }else{
                        $('#show-suggestion').addClass('hidden');
                    }
                }
            }
        })

    </script>

@endsection
