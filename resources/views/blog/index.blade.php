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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.transactions') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <button onclick="location.href ='{{ route('blog.create') }}'" class="btn btn-primary">
                    {{ __('admin.create_new_post') }}
                </button>
                <a data-bs-toggle="modal" data-bs-target="#favPosts"
                   class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded bg-light mt-2 mt-md-0 text-decoration-none">
                    <div class="font-22">
                        <i class="lni lni-star-filled"></i>
                    </div>
                    <div class="ms-2">
                        <span>{{ __('admin.featured_posts') }}</span>
                    </div>
                </a>
            </div>

            <div class="modal fade" id="favPosts" tabindex="-1" aria-labelledby="editFavPostsLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editFavPostsLabel">{{ __('admin.select_3_featured_posts') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('post.favourite')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">{{ __('admin.featured_post_1') }}:</label>
                                    <select class="form-select" name="fav_post_1">
                                        <option value="">{{ __('admin.please_select') }}</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($favPost1) && $favPost1->id == $post->id) selected @endif>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('admin.featured_post_2') }}:</label>
                                    <select class="form-select" name="fav_post_2">
                                        <option value="">{{ __('admin.please_select') }}</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($favPost2) && $favPost2->id == $post->id) selected @endif>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('admin.featured_post_3') }}:</label>
                                    <select class="form-select" name="fav_post_3">
                                        <option value="">{{ __('admin.please_select') }}</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($favPost3) && $favPost3->id == $post->id) selected @endif>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.save_changes') }}</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
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
                            <th>{{ __('admin.title') }}</th>
                            <th>{{ __('admin.text') }}</th>
                            <th>{{ __('admin.image') }}</th>
                            <th>{{ __('admin.author') }}</th>
                            <th>{{ __('admin.date') }}</th>
                            <th>{{ __('admin.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $index => $post)
                            <tr>
                                <td>{{ $posts->firstItem() + $index }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{!! Str::limit(strip_tags(html_entity_decode($post->text)), 50) !!}</td>
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
                                        <a href="{{route('post.edit',['post'=>$post->id])}}" class="text-warning edit-btn">
                                        <i class="bi bi-pencil-fill"></i>
                                        </a>
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
    function confirmDelete(postId) {
        if (confirm(@json(__('admin.confirm_delete_post')))) {
            document.getElementById('delete-form-' + postId).submit();
        }
    }
</script>
</body>
</html>
