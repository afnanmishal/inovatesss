@extends('layouts.dashboard')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"
                                style="background: url({{ asset('uploads/cover_photo') }}/{{ Auth::user()->cover_photo }})">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                @if (Auth::user()->profile_photo)
                                    <img src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}"
                                        class="img-fluid rounded-circle" alt="">
                                @else
                                    <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                        class="img-fluid rounded-circle" alt="">
                                @endif
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><strong>{{ Auth::user()->name }}</strong></h4>
                                    <p>Wev Developer </p>
                                </div>
                        
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                        aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24">
                                                </rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2">
                                                </circle>
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i>
                                            View profile</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to
                                            close friends</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to
                                            group</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('profile/photo/upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Profile Photo</label>
                                <input class="form-control form-control-lg" type="file" name="profile_photo">
                            </div>
                            <button type="submit" class="btn btn-success">Upload Photo</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('profile/cover/upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Cover Photo</label>
                                <input class="form-control form-control-lg" type="file" name="cover_photo">
                            </div>
                            <button type="submit" class="btn btn-success">Upload cover</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Password Change</h2>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('password/change') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control"
                                            placeholder=" Type your old password" name="old_password">
                                        @error('old_password')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>New Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="Type your new password" name="password">
                                        @error('password')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="Type to confirm password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">password change </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-6 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Phone Number</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('phoneV') }}" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">your phone number :</label>
                                    <h3>{{ Auth::user()->phone_number}}</h3>
                                    <div class="col-sm-8 m-auto">
                                        {{-- <span><a class="btn btn-success btn-sm" href="#">Verifed</a></span> --}}
                                        {{-- <span><a class="btn btn-danger btn-sm" href="#">UnVerify</a></span> --}}
                                        <span><a class="btn btn-primary btn-sm" href="{{ url('phone/number/varify') }}">Verify Now</a></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><h2>OTP</h2> </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Your OTP">
                                        <span><a class="btn btn-info btn-sm" href="#">OTP COnfirm</a></span>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

