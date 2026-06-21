@include('partials.main.header')
<!-- header close -->
<!-- content begin -->
@if(session('message'))
    <p class="msg" style="display: none;">{{ session('message') }}</p>
@endif
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <section class="v-center jarallax">
        <div class="de-gradient-edge-top"></div>
        <div class="de-gradient-edge-bottom"></div>
        <img src="{{asset('main/images/background/5.webp')}}" class="jarallax-img" alt="">
        <div class="container z-1000">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2">
                    <div class="p-5 rounded-10 shadow-soft bg-dark-1">
                        <form class="form-border" method="POST" action="{{ route('customer.profile.update') }}">
                            @csrf
                            <h4>🎮 {{ __('frontend.profile_title') }}</h4>
                            <p>{{ __('frontend.profile_description') }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.name') }}:<span style="color: red">  </span></label>
                                        <input type="text" name="name" value="{{$user->name}}" required autofocus
                                               autocomplete="name" class="form-control">
                                        @error('name')
                                        <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.username') }}:<span style="color: red">  </span></label>
                                        <input type="text" name="user_name" value="{{$user->user_name}}" readonly
                                               class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.phone_short') }}:</label>
                                        <input type='text' value="{{$user->p_num}}" name='p_num' id='phone'
                                               class="form-control">
                                        @error('p_num')
                                        <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 offset-lg-3 text-center">
                                    <div id='submit'>
                                        <input type='submit' value='{{ __('frontend.edit_profile') }}' class="btn-main color-2">
                                    </div>
                                </div>
                        </form>

                        <form method="post" action="{{route('customer.password.update')}}">
                            @csrf
                            <h4>{{ __('frontend.change_password') }}</h4>
                            <br>
                            <div class="col-md-6">
                                <div class="field-set">

                                    <label>{{ __('frontend.current_password') }}:<span style="color: red"> * </span></label>
                                    <input type="password"
                                           name="current_password"
                                           required autocomplete="new-password" class="form-control">
                                    @error('current_password')
                                    <small style="color: red;">{{ $message }}</small>
                                    <br>
                                    @enderror

                                    <label>{{ __('frontend.new_password') }}:<span style="color: red"> * </span></label>
                                    <input type="password"
                                           name="password"
                                           required autocomplete="new-password" class="form-control">
                                    @error('password')
                                    <small style="color: red;">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="field-set">
                                    <label>{{ __('frontend.confirm_new_password') }}:<span style="color: red"> * </span></label>
                                    <input type="password"
                                           name="password_confirmation" required autocomplete="new-password"
                                           class="form-control">
                                    @error('password_confirmation')
                                    <small style="color: red;">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div id='mail_success' class='success'>{{ __('frontend.mail_success') }}</div>
                                <div id='mail_fail' class='error'>{{ __('frontend.mail_fail') }}
                                </div>
                                <div class="clearfix"></div>

                            </div>

                            <div class="col-lg-6 offset-lg-3 mt-2">
                                <div class="col-lg-6 offset-lg-3 text-center">
                                    <div id='submit'>
                                        <input type='submit' value='{{ __('frontend.change_password') }}' class="btn-main color-2">
                                    </div>
                                </div>
                            </div>
                        </form>
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
                <img src="images/logo.png" alt="">
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
                    <form action="blank.php" class="row form-dark" id="form_subscribe" method="post"
                          name="form_subscribe">
                        <div class="col text-center">
                            <a href="#" id="btn-subscribe"><i class="arrow_left bg-color-secondary"></i></a> <input
                                class="form-control" id="txt_subscribe" name="txt_subscribe"
                                placeholder="{{ __('frontend.email_placeholder') }}" type="text">
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
<script src="{{asset('main/js/plugins.js')}}"></script>
<script src="{{asset('main/js/designesia.js')}}"></script>
<script src="{{asset('main/js/swiper.js')}}"></script>
<script src="{{asset('main/js/custom-marquee.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let msgBox = document.querySelector('.msg');
        if (msgBox && msgBox.textContent.trim() !== '') {
            msgBox.style.display = 'block';

            // Optional: Hide after 3 seconds
            setTimeout(() => {
                msgBox.style.display = 'none';
            }, 3000);
        }
    });
</script>


</body>

</html>
