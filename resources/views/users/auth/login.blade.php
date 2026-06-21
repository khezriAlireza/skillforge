@include('partials.main.header')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="{{asset('images/background/2.webp')}}" class="jarallax-img" alt="">
            <div class="container z-1000">
                <div class="row align-items-center">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="padding40 rounded-10 shadow-soft bg-dark-1">
                            <div class="text-center">
                                <h4>{{ __('frontend.login_title') }}</h4>
                                <div ><h5 class="text-danger">{{ $errors->first('login')}}</h5></div>

                            </div>

                            @error('login')
                            @enderror
                            <div class="spacer-10"></div>

                            <form id="form_register" class="form-border" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field-set">
                                    <label>{{ __('frontend.username') }}</label>
                                    <input type='text' name='user_name' id='name' class="form-control">

                                </div>
                                <div class="field-set">
                                    <label>{{ __('frontend.password') }}</label>
                                    <input type='password' name='password' id='password' class="form-control">
                                </div>
                                <div class="field-set">
                                    <input type="checkbox" checked id="html" name="remember" value="HTML">
                                    <label for="html"><span class="op-5">{{ __('frontend.remember_me') }}</span></label><br>
                                </div>
                                <div class="spacer-20"></div>
                                <div id="submit">
                                    <input type="submit" id="send_message" value="{{ __('frontend.login_button') }}" class="btn-main btn-fullwidth rounded-3" />
                                </div>
                            </form>
                            <div class="text-center">
                            <h4 class="mt-3">{{ __('frontend.no_account') }}</h4>
                            </div>

                            <div class="title-line text-center">
                                <a class="btn-sc btn-fullwidth mb10" href="{{route('customer.register')}}">{{ __('frontend.register_now') }}</a>
                            </div>
                        </div>
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
<script src="{{asset('js/custom-marquee.js')}}"></script>
</body>

</html>
