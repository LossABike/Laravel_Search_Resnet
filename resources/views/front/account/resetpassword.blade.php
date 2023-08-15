@extends('front.layout.master')


@section('title','Register')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Reset Password</h2>

                                @if(session('notification'))
                                    <div class="alert alert-warning" role="alert">
                                        {{session('notification')}}
                                    </div>
                                @endif()

                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="name">Reset Password Code*</label>
                                <input type="text" id="name" name="token">
                            </div>
                            <div class="group-input">
                                <label for="email_check">Email address *</label>
                                <input type="email" id="email_check" name="email" onkeyup="checkEmailExist()">
                            </div>
                            <div class="group-input">
                                <label for="pass">New Password *</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            
                            <button type="submit" class="site-btn register-btn">Reset Password</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

@endsection
