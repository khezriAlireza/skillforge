@include('partials.main.header')
@if(session('message'))
    <p class="msg" style="display: none;">{{ session('message') }}</p>
@endif
<!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <!-- section begin -->
        <section id="subheader" class="jarallax">
            <div class="de-gradient-edge-bottom"></div>
            <img src="{{asset('images/background/subheader-game.webp')}}" class="jarallax-img" alt="">
            <div class="container z-1000">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-2 d-lg-block d-none">
                        <img src="images/covers/4.webp" class="img-fluid wow fadeInUp" alt="">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">🧾 {{ __('frontend.your_orders_list') }}</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->
        <section class="no-top">
            <div class="container">
                <div class="row">
                        @if($orders->isNotEmpty())
                        <div class="col-md-12">
                            <table class="table table-pricing dark-style text-center">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('frontend.invoice_id') }}</th>
                                    <th scope="col">{{ __('frontend.date') }}</th>
                                    <th scope="col">{{ __('frontend.item') }}</th>
                                    <th scope="col">{{ __('frontend.quantity') }}</th>
                                    <th scope="col">{{ __('frontend.price') }}</th>
                                    <th scope="col">{{ __('frontend.order_status') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $order)
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('Y/m/d') }}</td>
                                        <td>{{ $item->product->name ?? '—' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price * $item->quantity) }} {{ __('frontend.currency') }}</td>
                                        <td>
                                            @if($order->status == 'completed')
                                                <div class="text-success">{{ __('frontend.status_paid') }}</div>
                                            @elseif($order->status == 'canceled')
                                                <div class="text-danger">{{ __('frontend.status_canceled') }}</div>
                                            @elseif($order->status == 'pending')
                                                <div class="text-info">{{ __('frontend.status_pending') }}</div>
                                            @elseif($order->status == 'processing')
                                                <div class="text-warning">{{ __('frontend.status_processing') }}</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="col-md-12 mt-3">
                            <p class="text-center fontsize40">📭 {{ __('frontend.no_orders') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
    <!-- footer begin -->
    <footer>
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4">
                    <img src="images/logo.png" alt="" >
                    <div class="spacer-20"></div>
                    <p>{{ __('frontend.footer_lorem') }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="widget">
                                <h5>{{ __('frontend.game_server') }}</h5>
                                <ul>
                                    <li><a href="#">تندر و شهر</a></li>
                                    <li><a href="#">مسابقه مرموز الف</a></li>
                                    <li><a href="#">خشم خاموش</a></li>
                                    <li><a href="#">سیاهچال فانک</a></li>
                                    <li><a href="#">اودیسه کهکشانی</a></li>
                                    <li><a href="#">افسانه جنگ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="widget">
                                <h5>{{ __('frontend.pages') }}</h5>
                                <ul>
                                    <li><a href="#">{{ __('frontend.game_server') }}</a></li>
                                    <li><a href="#">{{ __('frontend.knowledge_base') }}</a></li>
                                    <li><a href="#">{{ __('frontend.about_us') }}</a></li>
                                    <li><a href="#">{{ __('frontend.marketing') }}</a></li>
                                    <li><a href="#">{{ __('frontend.locations') }}</a></li>
                                    <li><a href="#">{{ __('frontend.news') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h5>{{ __('frontend.newsletter') }}</h5>
                        <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                            <div class="col text-center">
                                <a href="#" id="btn-subscribe"><i class="arrow_left bg-color-secondary"></i></a> <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="{{ __('frontend.email_placeholder') }}" type="text" >
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <div class="spacer-10"></div>
                        <small>{{ __('frontend.newsletter_privacy') }}</small>
                        <div class="spacer-30"></div>
                        <div class="widget">
                            <h5>{{ __('frontend.follow_us') }}</h5>
                            <div class="social-icons">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-discord"></i></a>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex">
                            <div class="de-flex-col">
                                <a href="index.html">
                                    {{ __('frontend.copyright') }}
                                </a>
                            </div>
                            <ul class="menu-simple">
                                <li><a href="#">{{ __('frontend.terms') }}</a></li>
                                <li><a href="#">{{ __('frontend.privacy_policy') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer close -->
</div>

<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let msgBox = document.querySelector('.msg');
        if (msgBox && msgBox.textContent.trim() !== '') {
            msgBox.style.display = 'block';
            setTimeout(() => { msgBox.style.display = 'none'; }, 4000);
        }
    });
</script>

</body>

</html>
