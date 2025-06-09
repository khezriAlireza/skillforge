<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Playhost - Game Hosting Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/swiper.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/coloring.css')}}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{asset('css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css" >
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="dark-scheme">
@if($cartQuantity->count() > 0)
<section id="subheader" class="jarallax">
    <img src="{{asset('images/background/14.webp')}}" class="jarallax-img" alt="">
    <div class="container mt-4">

            @php
                $cartTotal = 0; // Variable to store the overall cart total
            @endphp

            @foreach($cartQuantity as $index)
                @php
                    // Calculate total price per product
                    $productTotal = $index->quantity * ($index->product->discount ? $index->product->final_price : $index->product->price);
                    $cartTotal += $productTotal; // Add to the overall cart total
                @endphp

                <div class="row align-items-center mb-4 p-3 product-card">
                    <!-- تصویر محصول -->
                    <div class="col-3 text-center">
                        <img src="{{ asset('storage/'.$index->product->image) }}" class="img-fluid product-image" alt="">
                    </div>

                    <!-- اطلاعات محصول -->
                    <div class="col-6">
                        <h4 class="category-title">
                            @foreach($categories as $category)
                                @if($index->product->category_id == $category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </h4>
                        <h2 class="product-name">{{ $index->product->name }}</h2>
                        <p class="product-description">{{ $index->product->description }}</p>
                        <p class="product-description">تعداد: {{ $index->quantity }}</p>

                        <div class="price-section">
                            @if($index->product->discount)
                                <p class="d-price"> مبلغ پرداختی:
                                    <span class="price"><del>{{ number_format($index->product->price, 0, ',', ',') }}</del></span> -
                                    <span class="price">{{ number_format($index->product->final_price, 0, ',', ',') }} تومان</span>
                                </p>
                            @else
                                <p class="d-price"> مبلغ پرداختی:
                                    <span class="price new-price">{{ number_format($index->product->price, 0, ',', ',') }} تومان</span>
                                </p>
                            @endif
                        </div>

                        <!-- نمایش مجموع قیمت برای این محصول -->
                        <p class="total-price">مجموع قیمت: {{ number_format($productTotal, 0, ',', ',') }} تومان</p>
                    </div>
                </div>
        @endforeach

    <!-- نمایش مجموع کل سبد خرید -->
        <div class="row">
            <div class="cart-total">
                <h3>مجموع کل سبد خرید: {{ number_format($cartTotal, 0, ',', ',') }} تومان</h3>
            </div>

        </div>

    </div>
</section>
@else
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <h5 class="m-0">سبد خرید خالی می‌باشد!!</h5>
    </div>
@endif

<!-- section close -->




<!-- content close -->
<!-- footer begin -->

<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>

<script>
    if (!sessionStorage.getItem("reloaded")) {
        sessionStorage.setItem("reloaded", "true");
        window.location.reload(true);
    }
</script>


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
                    alert("مشکلی پیش آمد، لطفاً دوباره تلاش کنید.");
                    location.reload();
                },
                complete: function () {
                    throttle = false; // پس از اتمام درخواست، پردازش مجدد را مجاز کنیم
                }
            });
        });
    });
</script>


</body>

</html>
