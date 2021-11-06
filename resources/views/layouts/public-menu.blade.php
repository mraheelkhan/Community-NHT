<div class="iq-sidebar  sidebar-default ">
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @guest()
                    <li class="active">
                        <a href="{{ route('feed.index') }}" class=" ">
                            <i class="fa fa-newspaper"></i><span>Newsfeed</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ route('login') }}" class=" ">
                            <i class="fa fa-user"></i><span>Login</span>
                        </a>
                    </li>
                @else

                <li class="">
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
