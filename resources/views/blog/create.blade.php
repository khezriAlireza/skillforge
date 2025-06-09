<!doctype html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('adminPanel/assets/images/favicon-32x32.png')}}" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('adminPanel/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/fullcalendar/css/main.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link href="{{asset('adminPanel/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/bootstrap-extended.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('adminPanel/assets/fonts/googlefonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminPanel/assets/fonts/bootstrap-icons.css')}}">

    <!-- loader-->
    <link href="{{asset('adminPanel/assets/css/pace.min.css')}}" rel="stylesheet"/>

    <!--Theme Styles-->
    <link href="{{asset('adminPanel/assets/css/dark-theme.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/light-theme.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/semi-dark.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/css/header-colors.css')}}" rel="stylesheet"/>

    <title>Onedash - الگوی مدیریت بوت استرپ 5</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
                <i class="bi bi-list"></i>
            </div>

            <div class="top-navbar-right ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item search-toggle-icon d-flex d-lg-none">
                        <a class="nav-link" href="javascript:;">
                            <div class="">
                                <i class="bi bi-search"></i>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;">
                            <div class="">
                                <i class="bi bi-moon-fill"></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="dropdown dropdown-user-setting">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                    <div class="user-setting d-flex align-items-center gap-3">
                        <div class="d-none d-sm-block">
                            <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                            <small class="mb-0 dropdown-user-designation">{{ Auth::user()->role }}</small>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            <div class="d-flex align-items-center">
                                <div class=""><i class="bi bi-person-fill"></i></div>
                                <div class="ms-3">
                                    <button class="btn text-dark p-0">
                                        <span>مشخصات</span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class=""><i class="bi bi-lock-fill"></i></div>
                                <div class="ms-3">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn text-dark p-0">
                                            <span>خروج</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--end top header-->

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <h4 class="logo-text">KDA Market</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-list"></i>
            </div>
        </div>
        <!--navigation-->
    @include('partials.adminPanel.sidebar')
    <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{__('KDA Market')}}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('پست')}}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('ثبت پست جدید')}}</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->

        <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if (session('error'))
                        <div class="update_msg alert border-0 bg-light-danger alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="ms-3">
                                    <div class="text-danger">{{ session('error') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="container">

                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <div >
                                                    <h5 class="form-label">تصویر</h5>
                                                    <input required class="form-control form-control-sm" name="image" type="file">
                                                </div>
                                            </div>
                                            <div class="col-5 text-center">
                                                <h5>عنوان پست :</h5>
                                                <input required autofocus type="text" name="title" class="form-control">

                                            </div>
                                            <div class="col-2 mt-4">
                                                <button class="btn btn-primary">ثبت پست</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <textarea    name="text" id="my-editor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </main>

    <!-- Bootstrap bundle JS -->
    <script src="{{asset('adminPanel/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('adminPanel/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('adminPanel/assets/js/pace.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <!--app-->
    <script src="{{asset('adminPanel/assets/js/app.js')}}"></script>
    <script src="{{asset('adminPanel/assets/js/index.js')}}"></script>
    <script>
        new PerfectScrollbar(".best-product")
    </script>

    <script src="{{asset('TinyMCE/tinymce.js')}}" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '#my-editor',
            height: 500, // ارتفاع بیشتر برای فضای کار بیشتر
            directionality: 'rtl', // فعال کردن راست‌چین
            language: 'fa', // تنظیم زبان به فارسی
            plugins: [
                'advlist autolink link image lists charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount',
                'emoticons template hr pagebreak save'
            ].join(' '), // فعال کردن تمام پلاگین‌های مفید
            toolbar: `
            undo redo | bold italic underline strikethrough |
            fontsizeselect formatselect forecolor backcolor |
            alignleft aligncenter alignright alignjustify |
            bullist numlist outdent indent | link image media |
            emoticons charmap hr pagebreak |
            fullscreen preview print | template code save help
        `,
            menubar: true, // نمایش منوی کامل
            content_style: `
            body {
                font-family: Vazir, Arial, sans-serif;
                direction: rtl;
                text-align: right;
            }
        `, // راست‌چین و اعمال فونت
            branding: false, // حذف تبلیغات TinyMCE
            autosave_interval: '30s', // ذخیره خودکار هر 30 ثانیه
            font_formats: 'Vazir=vazir; Arial=arial; Times New Roman=times new roman;', // افزودن فونت فارسی
            toolbar_mode: 'wrap', // اجازه پیچیدن ابزارها برای نمایش بهتر در دستگاه‌های کوچک
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.update_msg').fadeIn().delay(1000).fadeOut();
        });
    </script>


</div>
</body>

</html>

