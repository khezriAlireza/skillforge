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
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('admin.ecommerce') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.products') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.add_category') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">{{ __('admin.add_product_category') }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <form class="row g-3" method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{ __('admin.name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{ __('admin.category_name_placeholder') }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('admin.image') }}</label>
                                        <input class="form-control form-control-sm" name="image" type="file">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('admin.description') }}</label>
                                        <textarea class="form-control" name="description" rows="3" cols="3" placeholder="{{ __('admin.description_placeholder') }}"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">{{ __('admin.add_category_btn') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('admin.name') }}</th>
                                            <th>{{ __('admin.description') }}</th>
                                            <th>{{ __('admin.image') }}</th>
                                            <th>{{ __('admin.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $index => $category)
                                            <tr>
                                            <td>{{ $categories->firstItem() + $index }}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>
                                                <div class="product-box">
                                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{route('category.edit',['category'=>$category->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('admin.edit_info') }}" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                    <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST" id="delete-form-{{ $category->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('admin.delete') }}" aria-label="Delete" onclick="confirmDelete({{ $category->id }})">
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
                                        {{ $categories->links() }}
                                    </ul>
                                </nav>
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
<script src="{{asset('adminPanel/assets/js/pace.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.update_msg').fadeIn().delay(1000).fadeOut();
    });
</script>
<script>
    function confirmDelete(categoryId) {
        if (confirm(@json(__('admin.confirm_delete_category')))) {
            document.getElementById('delete-form-' + categoryId).submit();
        }
    }
</script>
</body>
</html>
