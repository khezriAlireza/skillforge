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
