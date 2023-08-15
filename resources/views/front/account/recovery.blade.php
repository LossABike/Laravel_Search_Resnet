@extends('front.layout.master')

@section('title','Recovery Password')

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
                        <form>
                            @csrf
                            <div class="group-input">
                                <label for="email"> Email address *</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <button type="submit" class="site-btn login-btn"><a href="account/login/recoveryPasswordSuccessful">Send email</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Or Go back to Login Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
@endsection