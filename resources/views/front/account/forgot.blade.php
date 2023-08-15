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
                        <h2>Forgot Password</h2>

                                @if(session('notification'))
                                    <div class="alert alert-warning" role="alert">
                                        {{session('notification')}}
                                    </div>
                                @endif()

                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email_check">Email address *</label>
                                <input type="email" id="email_check" name="email" onkeyup="checkEmailExist()">
                            </div>
                            
                            <button type="submit" class="site-btn register-btn">Change Password</button>
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
