<!doctype html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('adminPanel/assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('adminPanel/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminPanel/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('adminPanel/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('adminPanel/assets/fonts/googlefonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminPanel/assets/fonts/bootstrap-icons.css')}}">

    <!-- loader-->
    <link href="{{asset('adminPanel/assets/css/pace.min.css')}}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{asset('adminPanel/assets/css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/css/light-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{asset('adminPanel/assets/css/header-colors.css')}}" rel="stylesheet" />

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
            @if (session('status'))
                <div class="update_msg alert border-0 bg-light-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-success">{{ session('status') }}</div>
                        </div>
                    </div>
                </div>
            @endif
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
            <div class="top-navbar-right ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item search-toggle-icon d-flex d-lg-none">
                        <a class="nav-link" href="javascript:">
                            <div class="">
                                <i class="bi bi-search"></i>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:">
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
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
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
                    <li><hr class="dropdown-divider"></li>
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
                <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">وان دش</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
        </div>
        <!--navigation-->
            @include('partials.adminPanel.sidebar')
        <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">تجارت الکترونیک</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">معاملات</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <!-- دکمه "ایجاد پست جدید" در سمت چپ -->
                <button onclick="location.href ='{{ route('blog.create') }}'" class="btn btn-primary">
                    ایجاد پست جدید
                </button>

                <a data-bs-toggle="modal" data-bs-target="#favPosts"
                   class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded bg-light mt-2 mt-md-0 text-decoration-none">
                    <div class="font-22">
                        <i class="lni lni-star-filled"></i>
                    </div>
                    <div class="ms-2">
                        <span>پست های برگزیده</span>
                    </div>
                </a>
            </div>


            <!-- مدال انتخاب پست‌های برگزیده -->
            <!-- مدال انتخاب پست‌های برگزیده -->
            <div class="modal fade" id="favPosts" tabindex="-1" aria-labelledby="editFavPostsLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editFavPostsLabel">انتخاب ۳ پست برگزیده</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('post.favourite')}}" method="post">
                                @csrf
                                <!-- انتخاب پست برگزیده ۱ -->
                                <div class="mb-3">
                                    <label class="form-label">پست برگزیده ۱:</label>
                                    <select class="form-select" name="fav_post_1">
                                        <option value="">انتخاب کنید</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($favPost1) && $favPost1->id == $post->id) selected @endif>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- انتخاب پست برگزیده ۲ -->
                                <div class="mb-3">
                                    <label class="form-label">پست برگزیده ۲:</label>
                                    <select class="form-select" name="fav_post_2">
                                        <option value="">انتخاب کنید</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($favPost2) && $favPost2->id == $post->id) selected @endif>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- انتخاب پست برگزیده ۳ -->
                                <div class="mb-3">
                                    <label class="form-label">پست برگزیده ۳:</label>
                                    <select class="form-select" name="fav_post_3">
                                        <option value="">انتخاب کنید</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($favPost3) && $favPost3->id == $post->id) selected @endif>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body">

                <div class="table-responsive">
                    <table id="example" class="table align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>متن</th>
                            <th>تصویر</th>
                            <th>نویسنده</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($posts as $index => $post)
                            <tr>
                                <td>{{ $posts->firstItem() + $index }}</td>
                                <td>{{ $post->title }}</td>

                                <td>
                                    {!! Str::limit(strip_tags(html_entity_decode($post->text)), 50) !!}
                                </td>
                                <td>
                                    <div class="product-box">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Category Image">
                                    </div>
                                </td>
                                <td>{{ $post->post->name }}</td>

                                <td>
                                    <p class="mb-0 email-time">{{ $post->created_at->format('Y/m/d - g:i A') }}</p>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <!-- Edit Button -->
                                        <a href="{{route('post.edit',['post'=>$post->id])}}" class="text-warning edit-btn">
                                        <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0);" class="text-danger" onclick="confirmDelete({{ $post->id }})">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <nav class="float-end mt-0" aria-label="Page navigation">
                    <ul class="pagination">
                        {{ $posts->links() }}
                    </ul>
                </nav>
            </div>
        </div>

    </main>
    <!--end page main-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--start footer-->
    <footer class="footer">
        <div class="footer-text">
            حق نشر © 2022. کلیه حقوق محفوظ است.
        </div>
    </footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">سفارشی ساز تم</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <h6 class="mb-0">تنوع تم</h6>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
                    <label class="form-check-label" for="LightTheme">روشن</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                    <label class="form-check-label" for="DarkTheme">تاریک</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
                    <label class="form-check-label" for="SemiDarkTheme">نیمه دارک</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3" checked>
                    <label class="form-check-label" for="MinimalTheme">تم مینیمال</label>
                </div>
                <hr/>
                <h6 class="mb-0">رنگ های سرصفحه</h6>
                <hr/>
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator headercolor1" id="headercolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor2" id="headercolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor3" id="headercolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor4" id="headercolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor5" id="headercolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor6" id="headercolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor7" id="headercolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor8" id="headercolor8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->

</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->
<script src="{{asset('adminPanel/assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('adminPanel/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('adminPanel/assets/js/pace.min.js')}}"></script>
<!--app-->
<script src="{{asset('adminPanel/assets/js/app.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: false,         // Disable pagination
            info: false,           // Remove "Showing X of Y entries"
            lengthChange: true,   // Remove "Show X entries" dropdown
            ordering: true,       // Disable sorting if not needed
            language: {
                search: "جستجو:" , // Custom search bar text
            }
        });
    });
</script>
<script>
    function confirmDelete(postId) {
        if (confirm('آیا مطمئنید می‌خواهید پست را حذف کنید؟')) {
            document.getElementById('delete-form-' + postId).submit();
        }
    }
</script>

</body>

</html>
