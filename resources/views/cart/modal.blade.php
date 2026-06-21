<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    @if($isRtl)
        <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    @endif
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/swiper.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/coloring.css')}}" rel="stylesheet" type="text/css" >
    <link id="colors" href="{{asset('css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="dark-scheme">
@if($cartQuantity->count() > 0)
<section id="subheader" class="jarallax">
    <img src="{{asset('images/background/14.webp')}}" class="jarallax-img" alt="">
    <div class="container mt-4">

            @php
                $cartTotal = 0;
            @endphp

            @foreach($cartQuantity as $index)
                @php
                    $productTotal = $index->quantity * ($index->product->discount ? $index->product->final_price : $index->product->price);
                    $cartTotal += $productTotal;
                @endphp

                <div class="row align-items-center mb-4 p-3 product-card">
                    <div class="col-3 text-center">
                        <img src="{{ asset('storage/'.$index->product->image) }}" class="img-fluid product-image" alt="">
                    </div>

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
                        <p class="product-description">{{ __('frontend.quantity') }}: {{ $index->quantity }}</p>

                        <div class="price-section">
                            @if($index->product->discount)
                                <p class="d-price"> {{ __('frontend.payment_amount') }}:
                                    <span class="price"><del>{{ number_format($index->product->price, 0, ',', ',') }}</del></span> -
                                    <span class="price">{{ number_format($index->product->final_price, 0, ',', ',') }} {{ __('frontend.currency') }}</span>
                                </p>
                            @else
                                <p class="d-price"> {{ __('frontend.payment_amount') }}:
                                    <span class="price new-price">{{ number_format($index->product->price, 0, ',', ',') }} {{ __('frontend.currency') }}</span>
                                </p>
                            @endif
                        </div>

                        <p class="total-price">{{ __('frontend.item_total') }}: {{ number_format($productTotal, 0, ',', ',') }} {{ __('frontend.currency') }}</p>
                    </div>
                </div>
        @endforeach

        <div class="row">
            <div class="cart-total">
                <h3>{{ __('frontend.cart_grand_total') }}: {{ number_format($cartTotal, 0, ',', ',') }} {{ __('frontend.currency') }}</h3>
            </div>
        </div>

    </div>
</section>
@else
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <h5 class="m-0">{{ __('frontend.cart_empty') }}</h5>
    </div>
@endif

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
            if (throttle) return;
            throttle = true;

            var button = $(this);
            var productId = button.data("id");
            var quantityElement = $(".item-quantity[data-id='" + productId + "']");
            var action = button.hasClass("plus-btn") ? "increase" : "decrease";

            quantityElement.html('<span class="loading"></span>');

            $.ajax({
                url: "{{ route('cart.updateQuantity') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    action: action
                },
                success: function (response) {
                    if (response.success) {
                        quantityElement.text(response.newQuantity);
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
                    throttle = false;
                }
            });
        });
    });
</script>

</body>

</html>
