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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.add_new_product') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">{{ __('admin.add_new_product') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form class="row g-3" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6">
                                    <label class="form-label">{{ __('admin.product_title') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('admin.product_title') }}" value="{{ old('name') }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">{{ __('admin.images') }}</label>
                                    <input name="image" class="form-control" type="file" accept="image/*">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{ __('admin.full_description') }}</label>
                                    <textarea name="description" class="form-control" placeholder="{{ __('admin.full_description') }}" rows="4">{{ old('description') }}</textarea>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ __('admin.category') }}</label>
                                    <select id="category" name="category_id" required class="form-select">
                                        <option value="">{{ __('admin.select_category') }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ __('admin.subcategory') }}</label>
                                    <select name="sub_category_id" id="sub_category" class="form-select">
                                        <option value="">{{ __('admin.select_subcategory') }}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label">{{ __('admin.price') }}</label>
                                            <input name="price" type="text" id="formattedNumber" class="form-control" placeholder="{{ __('admin.price') }}" value="{{ old('price') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">{{ __('admin.warehouse_stock') }}</label>
                                            <input name="stock" type="text" class="form-control" placeholder="{{ __('admin.warehouse_stock') }}" value="{{ old('stock') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ __('admin.discount_percent') }}</label>
                                    <input type="number" name="discount" id="discount" class="form-control" min="0" max="100" step="0.1">
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="active" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">{{ __('admin.publish_on_website') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input name="is_special" class="form-check-input" type="checkbox" value="1" id="flexCheckSpecial">
                                        <label class="form-check-label" for="flexCheckSpecial">{{ __('admin.recommended_products') }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ __('admin.add_product') }}</button>
                                </div>
                            </form>
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
    $(document).ready(function() {
        let baseUrl = "{{ url('get-subcategories') }}/";
        const loadingText = @json(__('admin.loading'));
        const selectSubcategoryText = @json(__('admin.select_subcategory'));
        const fetchErrorText = @json(__('admin.fetch_error'));

        $('#category').change(function() {
            let categoryId = $(this).val();
            let subCategoryDropdown = $('#sub_category');

            subCategoryDropdown.empty();
            subCategoryDropdown.append('<option value="">' + loadingText + '</option>');

            if (categoryId) {
                $.ajax({
                    url: baseUrl + categoryId,
                    type: 'GET',
                    success: function(response) {
                        subCategoryDropdown.empty();
                        subCategoryDropdown.append('<option value="">' + selectSubcategoryText + '</option>');
                        $.each(response, function(index, subCategory) {
                            subCategoryDropdown.append('<option value="' + subCategory.id + '">' + subCategory.name + '</option>');
                        });
                    },
                    error: function() {
                        subCategoryDropdown.empty();
                        subCategoryDropdown.append('<option value="">' + fetchErrorText + '</option>');
                    }
                });
            } else {
                subCategoryDropdown.append('<option value="">' + selectSubcategoryText + '</option>');
            }
        });
    });
</script>
<script>
    document.getElementById("formattedNumber").addEventListener("input", function (e) {
        let value = e.target.value.replace(/,/g, "");
        if (!isNaN(value) && value !== "") {
            e.target.value = Number(value).toLocaleString();
        }
    });
</script>
</body>
</html>
