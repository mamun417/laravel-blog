<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src=" {{ asset('backend/img/profile_small.jpg') }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong> </span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            @php
                $cur_route_name = Route::currentRouteName();
                $current_controller = class_basename(Route::current()->controller)
            @endphp

            @if(Request::is('admin*'))

                <li class="{{ $current_controller === 'DashboardController' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>

                <li class="{{ $current_controller === 'TagController' ? 'active' : '' }}">
                    <a href="{{ route('admin.tags.index') }}"><i class="fa fa-tags"></i> <span class="nav-label">Tags</span></a>
                </li>

                <li class="{{ $current_controller === 'CategoryController' ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}"><i class="fa fa-th"></i> <span class="nav-label">Categories</span></a>
                </li>

                <li class="{{ $current_controller === 'PostController' ? 'active' : '' }}">
                    <a href=""><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="nav-label">Posts</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{ $cur_route_name === 'admin.posts.index' ? 'active' : '' }}"><a href="{{ route('admin.posts.index') }}">All Post</a></li>
                        <li class="{{ $cur_route_name === 'admin.posts.pending' ? 'active' : '' }}"><a href="{{ route('admin.posts.pending') }}">Pending Post</a></li>
                    </ul>
                </li>

                <li class="{{ $current_controller === 'ManageSubscriberController' ? 'active' : '' }}">
                    <a href="{{ route('admin.subscribers.index') }}"><i class="fa fa-youtube-play"></i> <span class="nav-label">Subscribers</span></a>
                </li>

            @elseif(Request::is('author*'))

                <li>
                    <a href="{{ route('author.dashboard') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>

                <li class="{{ $current_controller === 'PostController' ? 'active' : '' }}">
                    <a href="{{ route('author.posts.index') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Posts</span></a>
                </li>

            @endif

        </ul>

    </div>
</nav>
