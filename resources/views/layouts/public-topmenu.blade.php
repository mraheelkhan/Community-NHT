<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="{{ route('feed.index') }}">
                    <img src="https://naturalhairtherapist.com/wp-content/uploads/2021/11/cropped-WhatsApp-Image-2021-11-24-at-3.30.25-PM-50x54.jpg" class="img-fluid" alt="nht-logo">
                    <span>NHT</span>
                </a>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-menu-line"></i></div>
                    </div>
                </div>
            </div>
           {{-- <div class="iq-search-bar device-search">
                <form action="#" class="searchbox">
                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                    <input type="text" class="text search-input" placeholder="Search here...">
                </form>
            </div>--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation" aria-expanded="true">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto navbar-list">
                    {{--<li class="nav-item dropdown">
                        <a href="#" class="search-toggle   dropdown-toggle" id="notification-drop"
                           data-bs-toggle="dropdown">
                            <i class="ri-notification-4-line"></i>
                        </a>
                        <div class="sub-drop dropdown-menu" aria-labelledby="notification-drop">
                            <div class="card shadow-none m-0">
                                <div class="card-header d-flex justify-content-between bg-primary">
                                    <div class="header-title bg-primary">
                                        <h5 class="mb-0 text-white">All Notifications</h5>
                                    </div>
                                    <small class="badge  bg-light text-dark">4</small>
                                </div>
                                <div class="card-body p-0">
                                    <a href="#" class="iq-sub-card">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset(' assets/images/user/01.jpg')}}" alt="">
                                            </div>
                                            <div class="ms-3 w-100">
                                                <h6 class="mb-0 ">Emma Watson Bni</h6>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">95 MB</p>
                                                    <small class="float-right font-size-12">Just Now</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset(' assets/images/user/02.jpg')}}" alt="">
                                            </div>
                                            <div class="ms-3 w-100">
                                                <h6 class="mb-0 ">New customer is join</h6>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Cyst Bni</p>
                                                    <small class="float-right font-size-12">5 days ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset(' assets/images/user/03.jpg')}}" alt="">
                                            </div>
                                            <div class="ms-3 w-100">
                                                <h6 class="mb-0 ">Two customer is left</h6>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Cyst Bni</p>
                                                    <small class="float-right font-size-12">2 days ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset(' assets/images/user/04.jpg')}}" alt="">
                                            </div>
                                            <div class="w-100 ms-3">
                                                <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Cyst Bni</p>
                                                    <small class="float-right font-size-12">3 days ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>--}}
                    @guest()
                    <li class="nav-item">
                        <a href="{{ route('login') }}">
                            <i class="ri-user-line"></i>
                            <span> Login </span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('public.profile', auth()->user()->username ) }}">
                            <i class="ri-user-line"></i>
                            <span>My  Profile </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="   d-flex align-items-center dropdown-toggle" id="drop-down-arrow"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ auth()->user()->image }}" class="img-fluid rounded-circle me-3" alt="user">
                            <div class="caption">
                                <h6 class="mb-0 line-height">{{ ucwords(auth()->user()->firstname) }}</h6>
                            </div>
                        </a>
                        <div class="sub-drop dropdown-menu caption-menu" aria-labelledby="drop-down-arrow">
                            <div class="card shadow-none m-0">
                                <div class="card-header  bg-primary">
                                    <div class="header-title">
                                        <h5 class="mb-0 text-white">Hi, {{ ucwords(auth()->user()->firstname) }}</h5>
                                        <span class="text-white font-size-12">you are logged-in</span>
                                    </div>
                                </div>
                                <div class="card-body p-0 ">
                                    <a href="{{ route('public.profile', auth()->user()->username ) }}"
                                       class="iq-sub-card iq-bg-primary-hover">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded card-icon bg-soft-primary">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 ">My Profile</h6>
                                                <p class="mb-0 font-size-12">View personal profile details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('profile.edit', auth()->user()->username ) }}"
                                       class="iq-sub-card iq-bg-warning-hover">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded card-icon bg-soft-warning">
                                                <i class="ri-profile-line"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 ">Edit Profile</h6>
                                                <p class="mb-0 font-size-12">Modify your personal details.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                       class="iq-sub-card iq-bg-info-hover">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded card-icon bg-soft-info">
                                                <i class="ri-account-box-line"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 ">Account settings</h6>
                                                <p class="mb-0 font-size-12">Manage your account settings.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <a class="btn btn-primary iq-sign-btn" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout<i class="ri-login-box-line ms-2"></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</div>
