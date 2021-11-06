@extends('layouts.feed')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="iq-edit-list">
                        <ul class="iq-edit-profile row nav nav-pills">
                            <li class="col-md-3 p-0">
                                <a class="nav-link active" data-bs-toggle="pill" href="#personal-information">
                                    Personal Information
                                </a>
                            </li>
                            {{--<li class="col-md-3 p-0">
                                <a class="nav-link" data-bs-toggle="pill" href="#chang-pwd">
                                    Change Password
                                </a>
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('profile.update', $user->username) }}" enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(Session('success'))
                                        <div class="alert alert-success"> {{ Session('success') }}</div>
                                    @endif
                                    <div class="form-group row align-items-center">
                                        <div class="col-md-12">
                                            <div class="profile-img-edit">
                                                <img class="profile-pic" src="{{ auth()->user()->image }}"
                                                     alt="profile-pic">
                                                <div class="p-image">
                                                    <i class="ri-pencil-line upload-button text-white"></i>
                                                    <input class="file-upload" name="user_image" type="file" accept="image/*"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="firstname" class="form-label">First Name:</label>
                                            <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" class="form-control" id="firstname" placeholder="Bni">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="lastname" class="form-label">Last Name:</label>
                                            <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" class="form-control" id="lastname" placeholder="Jhon">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="username" class="form-label">User Name:</label>
                                            <input type="text" disabled value="{{ auth()->user()->username }}" class="form-control" id="username" placeholder="Bni@01">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" disabled value="{{ auth()->user()->email }}" class="form-control" id="email" placeholder="email@domain.com">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button type="reset" class="btn bg-soft-danger">Cancle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="cpass" class="form-label">Current Password:</label>
                                        <a href="#" class="float-end">Forgot Password</a>
                                        <input type="Password" class="form-control" id="cpass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="npass" class="form-label">New Password:</label>
                                        <input type="Password" class="form-control" id="npass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vpass" class="form-label">Verify Password:</label>
                                        <input type="Password" class="form-control" id="vpass" value="">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button type="reset" class="btn bg-soft-danger">Cancle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
