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
    @include('partials.main.footer')

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
