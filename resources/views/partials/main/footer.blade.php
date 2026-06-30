<!-- footer begin -->
<footer>
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4">
                <img src="{{ asset('images/footerLogo.png') }}" height="300" width="300" alt="{{ config('app.name') }}">
                <div class="spacer-20"></div>
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
                                <li><a href="{{ route('post.list') }}">{{ __('frontend.news') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h5>{{ __('frontend.about_us') }}</h5>
                    {{ __('frontend.footer_lorem') }}
                    <div class="spacer-10"></div>
                    <div class="spacer-30"></div>
                    <div class="widget">
                        <h5>{{ __('frontend.follow_us') }}</h5>
                        <div class="social-icons">
                            <a href="#"><i class="fa-brands fa-telegram"></i></a>
                            <a href="https://discord.com/invite/cxVkzQvA"><i class="fa-brands fa-discord"></i></a>
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
                            <a href="{{ route('welcome') }}">
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
