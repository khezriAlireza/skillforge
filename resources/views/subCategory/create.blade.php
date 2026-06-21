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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.edit_categories') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.add_subcategory') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">{{ __('admin.add_subcategory_title') }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <form class="row g-3" method="post" action="{{route('subCategory.store')}}">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{ __('admin.name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{ __('admin.subcategory_name_placeholder') }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('admin.category') }}</label>
                                        <select required name="category_id" class="form-select">
                                            <option value="">{{ __('admin.select_category') }}</option>
                                            @foreach($categories as $category )
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">{{ __('admin.add_subcategory_btn') }}</button>
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
                                    <table id="example" class="table align-middle">
                                        <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('admin.name') }}</th>
                                            <th>{{ __('admin.category') }}</th>
                                            <th>{{ __('admin.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subCategories as $index => $subCategory)
                                            <tr>
                                                <td>{{ $subCategories->firstItem() + $index }}</td>
                                                <td>{{ $subCategory->name }}</td>
                                                <td>{{ $subCategory->category->name ?? __('admin.no_category') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="#" class="text-warning edit-btn"
                                                           data-id="{{ $subCategory->id }}"
                                                           data-name="{{ $subCategory->name }}"
                                                           data-category="{{ $subCategory->category_id }}"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editSubCategoryModal"
                                                           aria-label="Edit">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        <form action="{{ route('subCategory.destroy', ['subCategory' => $subCategory->id]) }}" method="POST" id="delete-form-{{ $subCategory->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="javascript:;" class="text-danger" onclick="confirmDelete({{ $subCategory->id }})">
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
                                        {{ $subCategories->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="editSubCategoryModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('admin.edit_subcategory') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{route('subCategory.update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label>{{ __('admin.subcategory_name_label') }}:</label>
                            <input type="text" class="form-control" value="" name="name" id="edit_name">
                        </div>
                        <div class="form-group">
                            <label>{{ __('admin.category') }}:</label>
                            <select required name="category_id" class="form-select" id="edit_category">
                                <option value="">{{ __('admin.select_category') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
                    <button type="submit" class="btn btn-primary" form="editForm">{{ __('admin.save_changes') }}</button>
                </div>
            </div>
        </div>
    </div>

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
    function confirmDelete(subCategoryId) {
        if (confirm(@json(__('admin.confirm_delete_subcategory')))) {
            document.getElementById('delete-form-' + subCategoryId).submit();
        }
    }
</script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: false,
            info: false,
            lengthChange: true,
            ordering: true,
            language: {
                search: @json(__('admin.search') . ':'),
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".edit-btn").forEach(function (button) {
            button.addEventListener("click", function () {
                document.querySelector("#edit_id").value = this.getAttribute("data-id");
                document.querySelector("#edit_name").value = this.getAttribute("data-name");
                document.querySelector("#edit_category").value = this.getAttribute("data-category");
            });
        });
    });
</script>
</body>
</html>
