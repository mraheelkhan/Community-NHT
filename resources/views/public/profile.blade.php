@extends('layouts.feed')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body profile-page p-0">
                    <div class="profile-header">
                        <div class="position-relative">
                            <img src="http://localhost:8001/assets/images/page-img/profile-bg1.jpg" alt="profile-bg"
                                 class="rounded img-fluid">
                            @auth()
                                @if(auth()->user()->id == $user->id)
                                    <ul class="header-nav list-inline flex-wrap justify-end p-0 m-0">
                                        <li><a href="{{ route('profile.edit', auth()->user()->username ) }}"><i
                                                    class="ri-pencil-line"></i></a>
                                        </li>
                                        <li><a href="#"><i class="ri-settings-4-line"></i></a></li>
                                    </ul>
                                @endif
                            @endauth
                        </div>
                        <div class="user-detail text-center mb-3">
                            <div class="profile-img">
                                <img src="{{ $user->image }}" alt="profile-img"
                                     class="avatar-130 img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h3 class="">{{ ucwords($user->full_name) }}</h3>
                            </div>
                        </div>
                        <div
                            class="profile-info p-3 d-flex align-items-center justify-content-between position-relative">

                            <div class="social-info">
                                <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                    <li class="text-center ps-3">
                                        <h6>Posts</h6>
                                        <p class="mb-0">{{ count($user->posts) }}</p>
                                    </li>
                                    <li class="text-center ps-3">
                                        <h6>Likes</h6>
                                        <p class="mb-0">{{ count($user->likes) }}</p>
                                    </li>
                                    <li class="text-center ps-3">
                                        <h6>Comments</h6>
                                        <p class="mb-0">{{ count($user->comments) }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="user-tabing">
                        <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                            <li class="nav-item col-12 col-sm-3 p-0">
                                <a class="nav-link active" href="#pills-timeline-tab" data-bs-toggle="pill"
                                   data-bs-target="#timeline" role="button">Timeline</a>
                            </li>
                            {{--                            <li class="nav-item col-12 col-sm-3 p-0">--}}
                            {{--                                <a class="nav-link" href="#pills-about-tab" data-bs-toggle="pill"--}}
                            {{--                                   data-bs-target="#about" role="button">About</a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-lg-8 offset-2">
                                @auth()
                                    <create-post></create-post>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <span>
                                                     <i class="fa fa-exclamation-triangle m-2"></i>
                                                    Do you want to create post? please
                                                    <a href="{{route('login')}}" class="link-primary font-weight-bold"> login </a>
                                                    or
                                                    <a href="{{route('register')}}"
                                                       class="link-primary font-weight-normal"> register </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                @if(count($user->posts) > 0)
                                    <profile-feed-posts username="{{ $user->username }}"
                                                        is_auth="{{ auth()->check() }}"></profile-feed-posts>
                                @else
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <span>
                                                 <i class="fa fa-exclamation-triangle m-2"></i>
                                                {{ $user->full_name }} has not yet created any post.
                                                <a href="{{route('feed.index')}}" class="link-primary font-weight-bold"> go to feed </a>
                                            </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="about" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                        <li>
                                            <a class="nav-link active" href="#v-pills-basicinfo-tab"
                                               data-bs-toggle="pill" data-bs-target="#v-pills-basicinfo-tab"
                                               role="button">Contact and Basic Info</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9 ps-4">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="v-pills-basicinfo-tab"
                                             role="tabpanel" aria-labelledby="v-pills-basicinfo-tab">
                                            <h4>Contact Information</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Bnijohn@gmail.com</p>
                                                </div>
                                                <div class="col-3">
                                                    <h6>Mobile</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">(001) 4544 565 456</p>
                                                </div>
                                                <div class="col-3">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">United States of America</p>
                                                </div>
                                            </div>
                                            <h4 class="mt-3">Websites and Social Links</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h6>Website</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                                <div class="col-3">
                                                    <h6>Social Link</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">www.bootstrap.com</p>
                                                </div>
                                            </div>
                                            <h4 class="mt-3">Basic Information</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h6>Birth Date</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">24 January</p>
                                                </div>
                                                <div class="col-3">
                                                    <h6>Birth Year</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">1994</p>
                                                </div>
                                                <div class="col-3">
                                                    <h6>Gender</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="mb-0">Female</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <img src="http://localhost:8001/assets/images/page-img/page-load-loader.gif" alt="loader"
                 style="height: 100px;">
        </div>
    </div>
@endsection
