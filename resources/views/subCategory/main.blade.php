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
</body>

</html>
