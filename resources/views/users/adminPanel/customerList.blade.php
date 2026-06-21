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
            <div class="breadcrumb-title pe-3">{{ config('app.name') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.user_management') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.customer_list') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table align-middle">
                                <thead class="table-secondary">
                                <tr class="text-left">
                                    <th>#</th>
                                    <th>{{ __('admin.full_name') }}</th>
                                    <th>{{ __('admin.username') }}</th>
                                    <th>{{ __('admin.phone') }}</th>
                                    <th>{{ __('admin.membership_date') }}</th>
                                </tr>
                                </thead>
                                <tbody style="text-align: right">
                                @php $count = 0; @endphp
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            @php
                                                $count = 1 + $count;
                                                echo $count;
                                                $delete_user = $user;
                                            @endphp
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->user_name}}</td>
                                        <td>
                                            @if($user->p_num == null)
                                                {{ __('admin.no_phone_registered') }}
                                            @else
                                                {{$user->p_num}}
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="overlay nav-toggle-icon"></div>
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
<script src="{{asset('adminPanel/assets/plugins/fullcalendar/js/main.min.js')}}"></script>
<script src="{{asset('adminPanel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('adminPanel/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            columnDefs: [{ orderable: false, targets: 3 }],
            language: {
                paginate: {
                    previous: '<span class="fa fa-chevron-right"></span>',
                    next: '<span class="fa fa-chevron-left"></span>'
                },
                lengthMenu: @json(__('admin.dt_show')) + ' <select class="form-control input-sm">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">' + @json(__('admin.dt_all')) + '</option>' +
                    '</select> ' + @json(__('admin.dt_results')),
                search: @json(__('admin.search') . ':'),
                info: @json(__('admin.dt_info')),
                infoEmpty: @json(__('admin.dt_info_empty')),
                infoFiltered: @json(__('admin.dt_info_filtered'))
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.update_msg').fadeIn().delay(1000).fadeOut();
    });
</script>
</body>
</html>
