
<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | AzDigital</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    thieu.hq2906@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +84 889668556
                </div>
            </div>
            <div class="ht-right">

                @if(Auth::check())
                    <a href="./account/logout" class="login-panel">
                        <i class="fa fa-user"></i>
                        {{Auth::user()->name}} - Logout
                    </a>
                @else
                    <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                @endif

                <!-- <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                        <option value='yu' data-image="front/img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                    </select>
                </div> 
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="front/img/logo" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" name="search" value="{{request('search')}}" placeholder="What do you need?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                    
                </div>

                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li>
                            <div class="btn_search search_by_image" style="margin: 0 32px -6px 0"> 
                                <form method="post" id="searchByImageForm" enctype="multipart/form-data">
                                 
                                    <label for="fileToUpload" style="cursor: pointer;">
                                        <i class="fa fa-camera" aria-hidden="true" style="font-size: 20px; color: black"></i>
                                    </label>
                                    <input style="display:none;" id="fileToUpload" type="file" name="fileToUpload">
                                </form>
                            </div>
                        </li>
                        <!-- <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li> -->
                        <li class="cart-icon">
                            <a href="./cart">
                                <i class="icon_bag_alt"></i>
                                <span class="cart-count">{{Cart::count()}}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            @foreach(Cart::content() as $cart)
                                                 <tr data-rowId="{{$cart->rowId}}">
                                                    <td class="si-pic">
                                                        <img style="height:70px;"
                                                             src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>${{$cart->price}} x {{$cart->qty}} - {{$cart->options->size}}</p>
                                                            <h6>{{$cart->name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i  onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                                    </td>
                                                 </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>${{Cart::total()}}</h5>
                                </div>
                                <div class="select-button">
                                    <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="./checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">${{Cart::total()}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <!-- <li class="active"> -->
                        <li><a href="shop/category/Women">Women’s Clothing</a></li>
                        <li><a href="shop/category/Men">Men’s Clothing</a></li>
                        <li><a href="shop?tag=underwear">Underwear</a></li>
                        <li><a href="shop/category/Kids">Kid's Clothing</a></li>
                        <li><a href="shop?tag=shoes&tag=accessories">Accessories/Shoes</a></li>
                        <li><a href="shop?price_min=%2461&price_max=%24999">Luxury Brands</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="{{(request()->segment(1) == '') ? 'active' : ''}}"><a href="./">Home</a></li>
                    <li class="{{(request()->segment(1) == 'shop') ? 'active' : ''}}"><a href="./shop">Shop</a></li>

                    <li><a href="#">Collection</a>
                        <ul class="dropdown">
                            <li><a href="shop/category/Men">Men's</a></li>
                            <li><a href="shop/category/Women">Women's</a></li>
                            <li><a href="shop/category/Kids">Kid's</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="./blog.html">Blog</a></li> -->
                    <li><a href="contact">Contact</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="./account/my-order">My Order</a></li>
                            <!-- <li><a href="./blog-details.html">Blog Details</a></li> -->
                            <li><a href="./cart">Shopping Cart</a></li>
                            <li><a href="./checkout">Checkout</a></li>
                            <!-- <li><a href="./faq.html">Faq</a></li> -->
                            <!-- <li><a href="./register.html">Register</a></li>
                            <li><a href="./account/login">Login</a></li> -->
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->

@yield('body')

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                <h5>Contact Us At</h5>
                    <ul>
                        <li>Address: 246 Minh Khai, Ha Noi</li>
                        <li>Phone: +84 889668556</li>
                        <li>Email: thieu.hq2906@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/thieu.hq"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/haquangthieu296/"><i class="fa fa-instagram"></i></a>
                        <!-- <a href="#"><i class="fa fa-pinterest"></i></a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="contact">About Us</a></li>
                        <li><a href="checkout">Checkout</a></li>
                        <li><a href="cart">Cart</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="./account/my-order">My Order</a></li>
                        <li><a href="./cart">Shopping Cart</a></li>
                        @if(Auth::check())
                        <li><a href="./account/logout" class="login-panel">Logout</a></li>
                        @else
                        <li><a href="./account/login" class="login-panel">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Mail">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    </div>
                    <div class="payment-pic">
                        <img src="front/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->


<!-- Js Plugins -->
<script src="front/js/jquery-3.3.1.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery.zoom.min.js"></script>
<script src="front/js/jquery.dd.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/main.js"></script>
<script src="front/js/owlcarousel2-filter.min.js"></script>
<script>
    function onlyUnique(value, index, array) {
        return array.indexOf(value) === index;
    }   
    document.getElementById("fileToUpload").onchange = function(e) {

        e.preventDefault(); // Prevent the form from being submitted in the traditional way
        const formData = new FormData();
        const file = document.getElementById("fileToUpload").files[0];
        formData.append("imagefile", file);
        var xhr = new XMLHttpRequest();
        xhr.open("POST","Flask API");
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'http://127.0.0.1:5000/search_by_image',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success: function(response) {
                var data = response['data'];
                
                window.location.href = "shop/find/"+data;
            },
            error: function(response) {
                // console.log(response)
                alert('upload image failed');
            }
            });
    };
</script>
</body>

</html>
