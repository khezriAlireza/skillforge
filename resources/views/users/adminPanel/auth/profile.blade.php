@include('partials.adminPanel.head')
@include('partials.adminPanel.top-navbar')

    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="{{asset('logo2.png')}}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Skill Forge</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-list"></i>
            </div>
        </div>
    @include('partials.adminPanel.sidebar')
    </aside>

    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3 text-white">{{ config('app.name') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        {{-- <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="bx bx-home-alt text-white"></i></a></li> --}}
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ __('admin.user_profile') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="profile-cover bg-dark"></div>

        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card shadow-sm border-0">
                    @if (session('status'))
                        <div class="update_msg alert border-0 bg-light-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i></div>
                                <div class="ms-3">
                                    <div class="text-success">{{ session('status') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="update_msg alert border-0 bg-light-danger alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i></div>
                                <div class="ms-3">
                                    <div class="text-danger">{{ session('error') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="mb-0">{{ __('admin.profile_section') }}</h5>
                        <hr>
                        <div class="card shadow-none border text-center">
                            <div class="card-header">
                                <h6 class="mb-0">{{ __('admin.user_info') }}</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('profile.update') }}" class="row g-3 ">
                                    @csrf
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <label class="form-label">{{ __('admin.username') }}</label>
                                        <input type="text" name="username" class="form-control mb-3 text-center" value="{{ old('username', Auth::user()->user_name) }}" required autofocus autocomplete="username">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <label class="form-label">{{ __('admin.full_name') }}</label>
                                        <input type="text" name="name" class="form-control mb-3 text-center" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <label class="form-label">{{ __('admin.phone') }}</label>
                                        <input type="text" name="p_num" class="form-control mb-3 text-center" value="{{ old('name', Auth::user()->p_num) }}">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">{{ __('admin.save_changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-none border text-center">
                            <div class="card-header">
                                <h6 class="mb-0">{{ __('admin.password') }}</h6>
                            </div>
                            <div class="card-body items-center">
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" autocomplete="off">
                                    @csrf
                                    <div class="row col-12">
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <label class="form-label">{{ __('admin.current_password') }}</label>
                                            <input class="form-control mb-3" name="current_password" type="password">
                                            @error('current_password')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <label class="form-label">{{ __('admin.new_password') }}</label>
                                            <input class="form-control mb-3" name="password" type="password">
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <label class="form-label">{{ __('admin.confirm_password') }}</label>
                                            <input name="password_confirmation" type="password" class="form-control mb-3">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary px-4">{{ __('admin.save_changes') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">{{ __('admin.delete_account') }}</h6>
                            </div>
                            <div class="card-body">
                                <form id="deleteForm" method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6" autocomplete="off">
                                    @csrf
                                    @method('delete')
                                    <div class="col-6 mt-3">
                                        <label class="form-label">{{ __('admin.password') }}</label>
                                        <input class="form-control mb-3" name="password" type="password">
                                    </div>
                                    <div class="text-start mt-4">
                                        <button type="button" class="btn btn-danger px-4" onclick="confirmDelete()">{{ __('admin.delete_account_btn') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="overlay nav-toggle-icon"></div>
    <footer class="footer">
        <div class="footer-text">{{ __('admin.copyright') }}</div>
    </footer>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

    <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">{{ __('admin.theme_customizer') }}</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <h6 class="mb-0">{{ __('admin.theme_variants') }}</h6>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
                    <label class="form-check-label" for="LightTheme">{{ __('admin.light') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                    <label class="form-check-label" for="DarkTheme">{{ __('admin.dark') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
                    <label class="form-check-label" for="SemiDarkTheme">{{ __('admin.semi_dark') }}</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3" checked>
                    <label class="form-check-label" for="MinimalTheme">{{ __('admin.minimal_theme') }}</label>
                </div>
                <hr/>
                <h6 class="mb-0">{{ __('admin.header_colors') }}</h6>
                <hr/>
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        @for ($i = 1; $i <= 8; $i++)
                        <div class="col">
                            <div class="indigator headercolor{{ $i }}" id="headercolor{{ $i }}"></div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('adminPanel/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('adminPanel/assets/js/pace.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/js/app.js')}}"></script>
<script defer>
    function confirmDelete() {
        if (confirm(@json(__('admin.confirm_delete_account')))) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
<script>
    $(document).ready(function(){
        $('.update_msg').fadeIn().delay(1000).fadeOut();
    });
</script>
</body>
</html>
