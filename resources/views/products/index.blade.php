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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.product_list') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>{{ __('admin.name') }}</th>
                            <th>{{ __('admin.description') }}</th>
                            <th>{{ __('admin.category') }}</th>
                            <th>{{ __('admin.subcategory') }}</th>
                            <th>{{ __('admin.image') }}</th>
                            <th>{{ __('admin.discount_percent') }}</th>
                            <th>{{ __('admin.price') }}</th>
                            <th>{{ __('admin.status') }}</th>
                            <th>{{ __('admin.recommended_products') }}</th>
                            <th>{{ __('admin.warehouse_stock') }}</th>
                            <th>{{ __('admin.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $products->firstItem() + $index }}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->subcategory->name}}</td>
                                <td>
                                    <div class="product-box">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                                    </div>
                                </td>
                                <td>@if(empty($product->discount)){{ __('admin.no_discount') }}@else{{$product->discount.'%'}}@endif</td>
                                <td>{{number_format($product->price,3,",")}}</td>
                                <td>
                                    @if($product->active == 0)
                                        {{ __('admin.product_not_active') }}
                                    @elseif($product->active == 1)
                                        {{ __('admin.product_active') }}
                                    @endif
                                </td>
                                <td>
                                    @if($product->is_special == 0)
                                        {{ __('admin.product_not_special') }}
                                    @elseif($product->is_special == 1)
                                        {{ __('admin.product_is_special') }}
                                    @endif
                                </td>
                                <td>{{$product->stock}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('product.edit',['product'=>$product->id])}}"
                                           class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                           title="{{ __('admin.edit_info') }}" aria-label="Edit"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                              method="POST" id="delete-form-{{ $product->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                               data-bs-placement="bottom" title="{{ __('admin.delete') }}" aria-label="Delete"
                                               onclick="confirmDelete({{ $product->id }})">
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
                        {{ $products->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <div class="overlay nav-toggle-icon"></div>
    <footer class="footer">
        <div class="footer-text">{{ __('admin.copyright') }}</div>
    </footer>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

    <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
             tabindex="-1" id="offcanvasScrolling">
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
<script>
    function confirmDelete(productId) {
        if (confirm(@json(__('admin.confirm_delete')))) {
            document.getElementById('delete-form-' + productId).submit();
        }
    }
</script>
</body>
</html>
