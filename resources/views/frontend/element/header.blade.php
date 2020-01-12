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
                <input onkeyup="getSuggestion(this)" name="query" autocomplete="off" value="{{ request('query') }}" class="src-input" type="text" placeholder="Type of search">
            </form>
        </div>
    </div>
</header>

<div id="show-suggestion" class="autocomplete-result hidden">

</div>

