@include('partials.main.header')
@if(session('error'))
    <div class="container mt-3"><div class="alert alert-danger text-center">{{ session('error') }}</div></div>
@endif
@if(session('message'))
    <div class="container mt-3"><div class="alert alert-success text-center">{{ session('message') }}</div></div>
@endif
<section id="subheader" class="jarallax">
    <div class="de-gradient-edge-bottom"></div>
    <img src="images/background/6.webp" class="jarallax-img" alt="">
    <div class="container z-1000" id="cart-section">
        @foreach($cartQuantity as $item)
            <div class="row mt-5 gx-5 align-items-center text-center">
                <div class="col-lg-2 d-lg-block ">
                    <img src="{{asset('storage/'.$item->product->image)}}" class="img-fluid wow fadeInUp" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="subtitle wow fadeInUp my-3">
                        @foreach($categories as $category)
                            @if($item->product->category_id == $category->id)
                                {{$category->name}}
                            @endif
                        @endforeach
                        -
                        @foreach($subCategories as $subCategory)
                            @if($item->product->sub_category_id == $subCategory->id)
                                {{$subCategory->name}}
                            @endif
                        @endforeach
                    </div>

                    <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">{{$item->product->name}}</h2>
                    @if($item->product->discount)
                        <h5 class="wow fadeInUp mb20" data-wow-delay=".2s">{{$item->product->discount}}% {{ __('frontend.discount') }}</h5>
                    @endif
                    <h4 class="wow fadeInUp mb20" data-wow-delay=".2s">
                        @if($item->product->discount)
                            <span class="price"><del>{{number_format($item->product->price,'3',',')}}</del></span>/
                            <span class="price">{{number_format($item->product->final_price,'3',',')}} {{ __('frontend.currency') }}</span>
                        @else
                            <span class="price">{{number_format($item->product->price,'3',',')}} {{ __('frontend.currency') }}</span>
                        @endif
                    </h4>
                    <h3 class="wow fadeInUp mb20" data-wow-delay=".2s">{{$item->product->description}}</h3>
                    <div class="de-rating-ext wow fadeInUp" data-wow-delay=".4s">
                        <span class="d-val">{{ __('frontend.quantity') }}: <span class="item-quantity" data-id="{{ $item->product->id }}">{{ $item->quantity }}</span></span>
                        <strong><button class="minus-btn" data-id="{{ $item->product->id }}">-</button></strong>
                        <strong><button class="plus-btn" data-id="{{ $item->product->id }}">+</button></strong>
                        <strong>
                            <button class="remove-btn" data-id="{{ $item->product->id }}">🗑️</button>
                        </strong>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach


        @if(!empty($cartItems))
            <div class="row text-center">
                <div class="col-6">
                    <button id="clear-cart-btn" class=" btn-danger px-4 py-2" style="min-width: 200px;">

                        {{ __('frontend.clear_cart') }}
                    </button>
                </div>
                <div class="col-6">
                    <form method="POST" action="{{ route('cart.checkout') }}">
                        @csrf
                        <button type="submit" class="btn-main px-4 py-2" style="min-width: 200px;">
                            {{ __('frontend.checkout') }}
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="row text-center wow fadeInUp mb-3 animated">
                <h5  style="visibility: visible; animation-name: fadeInUp;">{{ __('frontend.cart_empty') }}</h5>
            </div>
        @endif
    </div>
</section>
<!-- section close -->




<!-- content close -->
@include('partials.main.footer')


<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>


<script>
    let throttle = false;

    $(document).ready(function () {
        $(".plus-btn, .minus-btn").click(function () {
            if (throttle) return; // اگر درخواست در حال پردازش است، درخواست جدید نپذیرد
            throttle = true;

            var button = $(this);
            var productId = button.data("id");
            var quantityElement = $(".item-quantity[data-id='" + productId + "']");
            var currentQuantity = parseInt(quantityElement.text());
            var action = button.hasClass("plus-btn") ? "increase" : "decrease";

            // نمایش مقدار موقت یا لودینگ
            quantityElement.html('<span class="loading"></span>');

            $.ajax({
                url: "{{ route('cart.updateQuantity') }}",  // Dynamically generate URL
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    action: action
                },
                success: function (response) {
                    if (response.success) {
                        quantityElement.text(response.newQuantity); // مقدار نهایی را نمایش بده
                        $("#cart-count").text(response.cartTotal);

                    } else {
                        alert(response.message);
                        location.reload();
                    }
                },
                error: function () {
                    alert(@json(__('cart.quantity_update_error')));
                    location.reload();
                },
                complete: function () {
                    throttle = false; // پس از اتمام درخواست، پردازش مجدد را مجاز کنیم
                }
            });
        });
    });
</script>

<script>
    $(".remove-btn").click(function () {
        if (throttle) return;
        throttle = true;

        var button = $(this);
        var productId = button.data("id");

        if (!confirm(@json(__('cart.confirm_remove_item')))) {
            throttle = false;
            return;
        }

        $.ajax({
            url: "{{ route('cart.remove') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId
            },
            success: function (response) {
                if (response.success) {
                    button.closest(".row").fadeOut(500, function () {
                        $(this).remove();
                    });
                    $("#cart-count").text(response.cartTotal); // آپدیت تعداد
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert(@json(__('cart.remove_error')));
            },
            complete: function () {
                throttle = false;
            }
        });
    });
</script>

<script>
    // وقتی modal باز شد، iframe رو reload کن
    $('#pageModal').on('shown.bs.modal', function () {
        let iframe = document.getElementById('myIframe');
        let loader = document.getElementById('iframe-loader');

        if (!iframe || !loader) return;

        // Step 1: Fade out iframe and show loader
        iframe.classList.remove('fade-in');
        iframe.classList.add('fade-out');
        loader.style.display = 'flex';

        // Reload iframe
        iframe.src = iframe.src;

        // Step 2: Once loaded, fade in iframe and hide loader
        iframe.onload = function () {
            loader.style.display = 'none';
            iframe.classList.remove('fade-out');
            iframe.classList.add('fade-in');
        };
    });
</script>

<script>
    $('#clear-cart-btn').click(function () {
        if (confirm(@json(__('cart.confirm_clear_cart')))) {
            $.ajax({
                url: "{{ route('cart.clear') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    $('#cart-section').fadeOut(500, function () {
                        $(this).html('<h3 class="text-center text-success">' + @json(__('cart.cart_cleared_success')) + '</h3>').fadeIn(300);
                    });

                    // تعداد آیتم‌ها در هدر رو صفر کن
                    $('#cart-count').text('0');
                },
                error: function () {
                    alert(@json(__('cart.generic_error')));
                }
            });
        }
    });
</script>


</body>

</html>
