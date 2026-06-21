<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
            <i class="bi bi-list"></i>
        </div>
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
        @if ($errors->any())
            <div class="update_msg alert border-0 bg-light-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="ms-3">
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center gap-1">
                <li class="nav-item d-flex align-items-center px-2">
                    @include('partials.locale-switcher')
                </li>
                <li class="nav-item search-toggle-icon d-flex d-lg-none">
                    <a class="nav-link" href="javascript:">
                        <div class=""><i class="bi bi-search"></i></div>
                    </a>
                </li>
                <li class="nav-item dark-mode d-none d-sm-flex">
                    <a class="nav-link dark-mode-icon" href="javascript:">
                        <div class=""><i class="bi bi-moon-fill"></i></div>
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
                                    <span>{{ __('admin.profile') }}</span>
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
                                        <span>{{ __('admin.logout') }}</span>
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
