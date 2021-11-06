<div class="iq-sidebar  sidebar-default ">
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ Route::currentRouteName() == 'feed.index' ? 'active' : '' }}">
                    <a href="{{ route('feed.index') }}" class=" ">
                        <i class="fa fa-newspaper"></i><span>Newsfeed</span>
                    </a>
                </li>

                @guest()
                    <li class="">
                        <a href="{{ route('login') }}" class=" ">
                            <i class="fa fa-user"></i><span>Login</span>
                        </a>
                    </li>
                @else

                <li class="{{ Route::currentRouteName() == 'public.profile' ? 'active' : '' }}">
                    <a href="{{ route('public.profile', auth()->user()->username ) }}" class=" ">
                        <i class="fa fa-user"></i><span>My Profile</span>
                    </a>
                </li>
                @endguest
            </ul>
        </nav>
        <div class="p-5"></div>
    </div>
</div>
