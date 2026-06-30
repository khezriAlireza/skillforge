@include('partials.main.header')
        <div class="msg" style="display: none;"></div>
        <section id="subheader" class="jarallax pb20">
            <div class="de-gradient-edge-bottom"></div>
            <img src="{{asset('images/background/6.webp')}}" class="jarallax-img" alt="">
            <div class="container z-1000">
                <div class="row">
                    <div class="col-lg-12 mb-3 text-center">
                        <h2 class="wow fadeInUp mb-0" data-wow-delay=".2s">{{ __('frontend.products') }}</h2>
                        <hr class="mt20">
                        <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                            <li><a href="#" data-filter="*" class="selected">{{ __('frontend.all_products') }}</a></li>
                            @foreach($subCategories as $subCategory)
                                <li><a href="#" data-filter=".{{$subCategory->id}}">{{$subCategory->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>

<section class="no-top">
    <div class="container">
        <div id="gallery" class="row g-4">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 item {{$product->subCategory->id}} survival">
                    <div class="de-item s2">
                        <div class="d-overlay">
                            @if($product->discount)
                                <div class="d-label">
                                    {{$product->discount}}% {{ __('frontend.discount') }}
                                </div>
                            @endif
                            <div class="d-text">
                                <h4>{{$product->name}}</h4>
                                <div class="de-rating-ext">
                                    <span class="d-val">{{$product->description}}</span>
                                </div>

                                @if($product->discount)
                                    <p class="d-price"> {{ __('frontend.payment_amount') }}
                                        <span class="price"><del>{{number_format($product->price,'3',',')}}</del></span>
                                        <span class="price">{{number_format($product->final_price,'3',',')}} {{ __('frontend.currency') }}</span>
                                    </p>
                                @else
                                    <p class="d-price"> {{ __('frontend.payment_amount') }}
                                        <span class="price">{{number_format($product->price,'3',',')}} {{ __('frontend.currency') }}</span>
                                    </p>
                                @endif


                                @auth
                                    <a class="btn-main btn-fullwidth addToCart" data-id="{{ $product->id }}" href="#">
                                        <span>🛒 {{ __('frontend.add_to_cart') }}</span>
                                    </a>                                @endauth
                                @guest
                                    <a class="btn-main btn-fullwidth" href="{{route('customer.login')}}" ><span>{{ __('frontend.login_to_purchase') }}</span></a>
                                @endguest



                            </div>
                        </div>
                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" alt="">
                    </div>
                </div>
            @endforeach
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
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script src="{{asset('form.js')}}"></script>



<script>
    $(document).ready(function () {
        $(".addToCart").click(function (event) {
            event.preventDefault();

            var productId = $(this).data("id");
            var cartCount = $("#cart-count"); // گرفتن مقدار شمارنده سبد خرید

            $.ajax({
                url: "{{ route('cart.add', ':id') }}".replace(':id', productId),
                type: "GET",
                dataType: "json",
                success: function (response) {
                    var messageContainer = $(".msg");

                    if (response.message) {
                        messageContainer.fadeIn(200).html(response.message).removeClass("alert-danger").addClass("alert-success");

                        // افزایش شمارنده سبد خرید
                        if (cartCount.length > 0) {
                            let currentCount = parseInt(cartCount.text()) || 0; // مقدار فعلی را بگیر
                            cartCount.text(currentCount + 1); // مقدار جدید را تنظیم کن
                        }

                        // نمایش دکمه مشاهده سبد خرید در صورتی که مخفی بوده باشد
                        $("#view-cart-btn-container").show();
                    } else if (response.message2) {
                        messageContainer.fadeIn(200).html(response.message2).removeClass("alert-success").addClass("alert-danger");
                    }

                    setTimeout(function () {
                        messageContainer.fadeOut(500);
                    }, 4000);
                },
                error: function (xhr) {
                    if (xhr.status === 401) {
                        window.location.href = "{{ route('customer.login') }}";
                    } else {
                        console.log("AJAX Error:", xhr.responseText);
                        alert(@json(__('frontend.cart_error')));
                    }
                }
            });
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
</body>

</html>
