@include('partials.adminPanel.head')
@include('partials.adminPanel.top-navbar')

    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <h4 class="logo-text">Skill Forge</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-list"></i>
            </div>
        </div>
    @include('partials.adminPanel.sidebar')
    </aside>

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
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ config('app.name') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.post') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.register_new_post') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
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
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <div class="container">
                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-4 mt-2">
                                                <div>
                                                    <h5 class="form-label">{{ __('admin.image') }}</h5>
                                                    <input required class="form-control form-control-sm" name="image" type="file">
                                                </div>
                                            </div>
                                            <div class="col-5 text-center">
                                                <h5>{{ __('admin.post_title') }}:</h5>
                                                <input required autofocus type="text" name="title" class="form-control">
                                            </div>
                                            <div class="col-2 mt-4">
                                                <button class="btn btn-primary">{{ __('admin.submit_post') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <textarea name="text" id="my-editor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="{{asset('adminPanel/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('adminPanel/assets/js/pace.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
    <script src="{{asset('adminPanel/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('adminPanel/assets/js/app.js')}}"></script>
    <script src="{{asset('adminPanel/assets/js/index.js')}}"></script>
    <script>
        new PerfectScrollbar(".best-product")
    </script>
    <script src="{{asset('TinyMCE/tinymce.js')}}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#my-editor',
            height: 500,
            directionality: 'rtl',
            language: 'fa',
            plugins: [
                'advlist autolink link image lists charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount',
                'emoticons template hr pagebreak save'
            ].join(' '),
            toolbar: `
            undo redo | bold italic underline strikethrough |
            fontsizeselect formatselect forecolor backcolor |
            alignleft aligncenter alignright alignjustify |
            bullist numlist outdent indent | link image media |
            emoticons charmap hr pagebreak |
            fullscreen preview print | template code save help
        `,
            menubar: true,
            content_style: `
            body {
                font-family: Vazir, Arial, sans-serif;
                direction: rtl;
                text-align: right;
            }
        `,
            branding: false,
            autosave_interval: '30s',
            font_formats: 'Vazir=vazir; Arial=arial; Times New Roman=times new roman;',
            toolbar_mode: 'wrap',
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
