<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Playhost - Game Hosting Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/swiper.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/coloring.css')}}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{asset('css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="dark-scheme">
<div id="wrapper">
    <div class="float-text show-on-scroll">
        <span><a href="#">به بالا بروید</a></span>
    </div>
    <div class="scrollbar-v show-on-scroll"></div>
    <!-- page preloader begin -->
    <div id="de-loader"></div>
    <!-- page preloader close -->

    <!-- header begin -->
    <header class="transparent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex sm-pt10">
                        <div class="de-flex-col">
                            <div class="de-flex-col">

                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="{{route('welcome')}}">
                                        <h2 class="slider-title mb-1">
                                            <img class="logo-main" src="{{asset('images/logo.png')}}" height="72px" width="200" alt="">
                                        </h2>
                                    </a>

                                </div>
                                <!-- logo close -->
                            </div>
                        </div>
                        <div class="de-flex-col header-col-mid">
                            <ul id="mainmenu" class="d-lg-flex">
                                <li>
                                    <a class="menu-item" href="game-server-1.html">بازی ها</a>
                                    <ul class="mega">
                                        <li>
                                            <div class="container">
                                                <div class="sb-menu p-lg-4 p-sm-0">
                                                    <div class="row g-lg-4 g-sm-0">
                                                        <div class="col-lg-3">
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-one.html">
                                                                    <img src="{{asset('images/covers-square/1.webp')}}" class="" alt="">
                                                                    <h5>تندر و شهر</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-two.html">
                                                                    <img src="{{asset('images/covers-square/2.webp')}}" class="" alt="">
                                                                    <h5>مسابقه مرموز</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-three.html">
                                                                    <img src="{{asset('images/covers-square/3.webp')}}" class="" alt="">
                                                                    <h5>خشم خاموش</h5>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-four.html">
                                                                    <img src="{{asset('images/covers-square/4.webp')}}" class="" alt="">
                                                                    <h5>سیاهچال فانک</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-one.html">
                                                                    <img src="{{asset('images/covers-square/5.webp')}}" class="" alt="">
                                                                    <h5>اودیسه کهکشانی</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-two.html">
                                                                    <img src="{{asset('images/covers-square/6.webp')}}" class="" alt="">
                                                                    <h5>افسانه های جنگ</h5>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-three.html">
                                                                    <img src="{{asset('images/covers-square/7.webp')}}" class="" alt="">
                                                                    <h5>انقلاب راه مسابقه</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-four.html">
                                                                    <img src="{{asset('images/covers-square/8.webp')}}" class="" alt="">
                                                                    <h5>اودیسه ستاره‌ ای</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-one.html">
                                                                    <img src="{{asset('images/covers-square/9.webp')}}" class="" alt="">
                                                                    <h5>سایبر نکسوس</h5>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-two.html">
                                                                    <img src="{{asset('images/covers-square/10.webp')}}" class="" alt="">
                                                                    <h5>قلمروهای باستانی</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-three.html">
                                                                    <img src="{{asset('images/covers-square/11.webp')}}" class="" alt="">
                                                                    <h5>فوتبال بیگانه</h5>
                                                                </a>
                                                            </div>
                                                            <div class="d-list-small">
                                                                <a href="pricing-table-four.html">
                                                                    <img src="{{asset('images/covers-square/12.webp')}}" class="" alt="">
                                                                    <h5>سایه شب</h5>
                                                                </a>
                                                            </div>
                                                        </div>

                                                </div>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="menu-item" href="{{route('post.list')}}">اخبار</a></li>
                                <li><a class="menu-item" href="{{route('post.list')}}">درباره ما</a></li>
                                <li><a class="menu-item" href="#">پشتیبانی</a>
                                    <ul>
                                        <li><a class="menu-item" href="https://discord.com/invite/cxVkzQvA">Discord</a></li>
                                        <li><a class="menu-item" href="https://discord.com/invite/cxVkzQvA">Telegram</a></li>
                                        <li><a class="menu-item" href="https://discord.com/invite/cxVkzQvA">Email</a></li>
                                    </ul>
                                </li>

                                @guest
                                    <li>
                                    <a class="menu-item" href="#">
                                        <i class="fa fa-sign-in-alt"></i> <!-- Login Icon -->
                                        <span></span>
                                    </a>
                                    <ul>
                                        <li><a class="menu-item" href="{{route('customer.login')}}">ورود</a></li>
                                        <li><a class="menu-item" href="{{route('customer.register')}}">ثبت نام</a></li>
                                    </ul>
                                </li>
                                @endguest
                                @auth
                                <li>
                                    <a class="menu-item" href="#">
                                        <i class="fas fa-user"></i>
                                        <span></span>

                                    </a>
                                    <ul>
                                        <li><a class="menu-item" href="{{route('customer.profile')}}">حساب کاربری</a></li>
                                        <li><a class="menu-item" href="{{route('customer.order.list')}}">سفارشات</a></li>
                                        <li><a class="menu-item" href="pricing-table-three.html">مشاهده سابقه پرداخت‌ها</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit"
                                                        style="
                                                        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
                                                        width: 100%;
                                                        color: white"
                                                        class="btn-cyberpunk">
                                                    <span>خروج</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>

                                </li>
                                @endauth


                            </ul>
                        </div>


                        <div class="de-flex-col">
                            <a style="color: #FFFFFF" href="#" data-bs-toggle="modal" data-bs-target="#pageModal" data-bs-backdrop="true">
                                <span id="cart-count">{{ $cartItems }}</span>
                                <i class="fa fa-shopping-cart"></i>
                            </a>

                            <div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button"  class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="background:rgba(20, 20, 50, 0.6);backdrop-filter: blur(10px);                                                 position: relative;" >
                                            <div style="position: relative;">
                                                <div id="iframe-loader" style="display: none;">
                                                    در حال بارگذاری...
                                                </div>
                                                <iframe id="myIframe" src="{{ route('cart.modal') }}" width="100%" height="500px"></iframe>
                                            </div>
                                            @if(!empty($cartItems))
                                                <div class="text-center">
                                                    <button style="
                                                            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
                                                            color: white"
                                                            onclick="location.href='{{ route('cart.index') }}'" class="btn-cyberpunk">
                                                        <span>مشاهده سبد خرید</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if(session('status'))
        <div class="notif update_msg">{{ session('status') }}</div>
    @endif

    <!-- header close -->
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">

        <div id="top"></div>
