@include('partials.main.header')
        <!-- section begin -->
        <section id="subheader" class="jarallax">
            <div class="de-gradient-edge-bottom"></div>
            <img src="{{asset('images/background/space.webp')}}" class="jarallax-img" alt="">
        </section>
        <!-- section close -->

        <section class="no-top">
            <div class="container">
                <div class="row g-4">
                    @if($subCategories->isEmpty())
                    <div class="row" style="background-size: cover; background-repeat: no-repeat;">
                        <div class="col-lg-12 mb-3 text-center" style="background-size: cover; background-repeat: no-repeat;">
                            <h2 class="wow fadeInUp mb-3 animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">{{ __('frontend.no_subcategories') }}</h2>
                        </div>
                    </div>
                    @endif
                    @foreach($subCategories as $subCategory)
                        <div class="col-lg-4 col-md-6">
                            <div class="de-box-cat h-100">
                                <i class="fa fa-folder-open-o"></i>
                                <a href="{{route('products.main',['subCategory'=>$subCategory->id])}}">
                                    <h3>{{$subCategory->name}}
                                        <span>
                                            ({{$subCategory->products->count()}})
                                        </span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <div class="spacer-double"></div>

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
</body>

</html>
