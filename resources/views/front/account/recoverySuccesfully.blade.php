@extends('front.layout.master')

@section('title','Recovery Password Succesful')

@section('body')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Recovery Password</span>
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
                    <div class="login-form">
                        <h2>Recovery Password</h2>
                        <form action="/account/login/recoveryPassword" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email"> Your Password has been sent to your email. *</label>
                            </div>
                            <button type="submit" class="site-btn login-btn"><a href="./account/login">Go back to Login Page</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
@endsection