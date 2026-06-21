@include('partials.main.header')
    <!-- header close -->
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <!-- section begin -->
        <section id="subheader" class="jarallax">
            <img src="{{asset('images/background/9.webp')}}" class="jarallax-img" alt="">
            <div class="container z-1000">
                <div class="row">

                    <div class="col-lg-6">
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">{{ __('frontend.news_and_articles') }}</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->
            <section id="section-content" aria-label="section">
            <div class="container">
                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6 mb10">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{asset('storage/'.$post->image)}}" class="lazy">
                                </div>
                                <div class="post-text">
                                    <div class="d-date">{{ $post->created_at->format('Y-m-d') }}</div>
                                    <h4><a href="{{route('post.show',['post'=>$post->id])}}">{{$post->title}}<span></span></a></h4>
                                    <p>
                                        {!! Str::limit(strip_tags(html_entity_decode($post->text)), 163) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="spacer-single"></div>

                    <div class="col-md-12">
                        <ul class="pagination">
                            {{ $posts->links() }}
                        </ul>
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

</body>

</html>
