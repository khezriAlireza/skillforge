{{--@include('partials.main.header')--}}
{{--<!-- header close -->--}}
{{--<!-- content begin -->--}}
{{--<div class="no-bottom no-top" id="content">--}}
{{--    <div id="top"></div>--}}

{{--    <section class="v-center jarallax">--}}
{{--        <div class="de-gradient-edge-top"></div>--}}
{{--        <div class="de-gradient-edge-bottom"></div>--}}
{{--        <img src="{{asset('main/images/background/5.webp')}}" class="jarallax-img" alt="">--}}
{{--        <div class="container z-1000">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-8 offset-lg-2">--}}
{{--                    <div class="login-box">--}}
{{--                        <div id="error" class="mb-3 text-danger"></div>--}}
{{--                        <div id="success" class="mb-3 text-success"></div>--}}



{{--                        <form class="text-center" id="auth-form">--}}
{{--                            <h3>ورود / ثبت نام</h3>--}}
{{--                            <input class="text-center" placeholder="شماره موبایل،نام کاربری..." type="text" name="login" id="login" required value="{{ old('login') }}">--}}
{{--                            <br><br>--}}
{{--                            <button class="btn-main w-100">ادامه</button>--}}
{{--                        </form>--}}

{{--                        <form id="verify-form" style="display: none;">--}}
{{--                            <label for="code">کد تایید:</label>--}}
{{--                            <input type="text" id="code"  placeholder="کد ۵ رقمی">--}}
{{--                            <br><br>--}}
{{--                            <button class="btn-main w-100">تایید و ورود</button>--}}
{{--                        </form>--}}

{{--                        <form method="POST" action="{{ route('login') }}" id="login-form" style="display: none;">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="user_name" id="user_name" value="{{ old('user_name') }}">--}}

{{--                            <label>رمز عبور:</label>--}}
{{--                            <input type="password" name="password" required>--}}
{{--                            @error('password')--}}
{{--                            <div class="text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}

{{--                            <div class="g-recaptcha" data-sitekey="{{ config('app.debug') ? env('RECAPTCHA_SITE_KEY') : 'DEBUGGING_FAILED' }}"></div>--}}
{{--                            @error('captcha')--}}
{{--                            <div class="text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}

{{--                            <button class="btn-main w-100">تایید و ورود</button>--}}
{{--                        </form>--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



{{--</div>--}}
{{--<!-- content close -->--}}
{{--<!-- footer begin -->--}}
{{--<footer>--}}
{{--    <div class="container">--}}
{{--        <div class="row gx-5">--}}
{{--            <div class="col-lg-4">--}}
{{--                <img src="images/logo.png" alt="" >--}}
{{--                <div class="spacer-20"></div>--}}
{{--                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6 col-sm-6">--}}
{{--                        <div class="widget">--}}
{{--                            <h5> سرور بازی</h5>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">تندر و شهر</a></li>--}}
{{--                                <li><a href="#">مسابقه مرموز الف</a></li>--}}
{{--                                <li><a href="#">خشم خاموش</a></li>--}}
{{--                                <li><a href="#">سیاهچال فانک</a></li>--}}
{{--                                <li><a href="#">اودیسه کهکشانی</a></li>--}}
{{--                                <li><a href="#">افسانه جنگ</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6 col-sm-6">--}}
{{--                        <div class="widget">--}}
{{--                            <h5>صفحات</h5>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"> سرور بازی</a></li>--}}
{{--                                <li><a href="#">پایگاه دانش</a></li>--}}
{{--                                <li><a href="#">درباره ما</a></li>--}}
{{--                                <li><a href="#">بازاریابی</a></li>--}}
{{--                                <li><a href="#">مکان ها</a></li>--}}
{{--                                <li><a href="#">اخبار</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="widget">--}}
{{--                    <h5>خبرنامه</h5>--}}
{{--                    <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">--}}
{{--                        <div class="col text-center">--}}
{{--                            <a href="#" id="btn-subscribe"><i class="arrow_left bg-color-secondary"></i></a> <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="ایمیل خود را وارد کنید" type="text" >--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="spacer-10"></div>--}}
{{--                    <small>ایمیل شما نزد ما محفوظ است. ما اسپم نمی کنیم.</small>--}}
{{--                    <div class="spacer-30"></div>--}}
{{--                    <div class="widget">--}}
{{--                        <h5>ما را دنبال کنید</h5>--}}
{{--                        <div class="social-icons">--}}
{{--                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>--}}
{{--                            <a href="#"><i class="fa-brands fa-twitter"></i></a>--}}
{{--                            <a href="#"><i class="fa-brands fa-discord"></i></a>--}}
{{--                            <a href="#"><i class="fa-brands fa-tiktok"></i></a>--}}
{{--                            <a href="#"><i class="fa-brands fa-youtube"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="subfooter">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="de-flex">--}}
{{--                        <div class="de-flex-col">--}}
{{--                            <a href="index.html">--}}
{{--                                کپی رایت 2024 - طراحی شده توسط روشاک--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <ul class="menu-simple">--}}
{{--                            <li><a href="#">شرایط &amp; قوانین</a></li>--}}
{{--                            <li><a href="#">سیاست حفظ حریم خصوصی</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
{{--<!-- footer close -->--}}
{{--</div>--}}


{{--<!-- Javascript Files--}}
{{--================================================== -->--}}
{{--<script src="{{asset('main/js/plugins.js')}}"></script>--}}
{{--<script src="{{asset('main/js/designesia.js')}}"></script>--}}
{{--<script src="{{asset('main/js/swiper.js')}}"></script>--}}
{{--<script src="{{asset('main/js/custom-marquee.js')}}"></script>--}}

{{--<script>--}}
{{--    const authForm = document.getElementById('auth-form');--}}
{{--    const verifyForm = document.getElementById('verify-form');--}}
{{--    const loginForm = document.getElementById('login-form');--}}
{{--    const error = document.getElementById('error');--}}
{{--    const success = document.getElementById('success');--}}

{{--    authForm.addEventListener('submit', function(e) {--}}
{{--        e.preventDefault();--}}

{{--        const login = document.getElementById('login').value;--}}
{{--        const checkUser = @json(route('check.user'));--}}
{{--        const sendSMS = @json(route('sendSMS'));--}}


{{--        fetch(checkUser, {--}}
{{--            method: 'POST',--}}
{{--            headers: {--}}
{{--                'Content-Type': 'application/json',--}}
{{--                'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--            },--}}
{{--            body: JSON.stringify({ login })--}}
{{--        }).then(res => res.json())--}}
{{--            .then(data => {--}}
{{--                if (data.exists) {--}}
{{--                    document.getElementById('user_name').value = login;--}}
{{--                    authForm.style.display = 'none';--}}
{{--                    verifyForm.style.display = 'none';--}}
{{--                    loginForm.style.display = 'block';--}}
{{--                } else {--}}
{{--                    fetch(sendSMS, {--}}
{{--                        method: 'POST',--}}
{{--                        headers: {--}}
{{--                            'Content-Type': 'application/json',--}}
{{--                            'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--                        },--}}
{{--                        body: JSON.stringify({ login })--}}
{{--                    }).then(res => res.json())--}}
{{--                        .then(smsData => {--}}
{{--                            if (smsData.success) {--}}
{{--                                success.innerText = 'کد تایید ارسال شد.';--}}
{{--                                authForm.style.display = 'none';--}}
{{--                                verifyForm.style.display = 'block';--}}
{{--                            } else {--}}
{{--                                error.innerText = 'خطا در ارسال پیامک.';--}}
{{--                            }--}}
{{--                        });--}}
{{--                }--}}
{{--            });--}}
{{--    });--}}

{{--    verifyForm.addEventListener('submit', function(e) {--}}
{{--        e.preventDefault();--}}
{{--        const code = document.getElementById('code').value;--}}
{{--        const username = document.getElementById('username').value;--}}
{{--        const phone = document.getElementById('phone').value;--}}

{{--        fetch('/verify-sms-code', {--}}
{{--            method: 'POST',--}}
{{--            headers: {--}}
{{--                'Content-Type': 'application/json',--}}
{{--                'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--            },--}}
{{--            body: JSON.stringify({ phone, code, username })--}}
{{--        }).then(res => res.json())--}}
{{--            .then(data => {--}}
{{--                if (data.success) {--}}
{{--                    message.innerText = 'ثبت‌نام / ورود با موفقیت انجام شد!';--}}
{{--                    verifyForm.style.display = 'none';--}}
{{--                    // location.href = '/dashboard'; // انتقال بعد از ورود--}}
{{--                } else {--}}
{{--                    message.innerText = 'کد وارد شده اشتباه است.';--}}
{{--                }--}}
{{--            });--}}
{{--    });--}}
{{--</script>--}}
{{--@if ($errors->has('password') || $errors->has('login'))--}}
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            document.getElementById('auth-form')?.style.display = 'none';--}}
{{--            document.getElementById('verify-form')?.style.display = 'none';--}}
{{--            document.getElementById('login-form')?.style.display = 'block';--}}
{{--        });--}}
{{--    </script>--}}
{{--    @endif--}}





{{--</body>--}}

{{--</html>--}}
@include('partials.main.header')
<!-- header close -->
<!-- content begin -->
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
                        <form  class="form-border" method="POST" action="{{ route('customer.register.store') }}">
                            @csrf                                <h4>حساب کاربری ندارید؟ همین الان ثبت نام کنید.</h4>
                            <p>به اسکیل فورج خوش آمدید. ما از اینکه شما را در اینجا داریم هیجان زده ایم. با ایجاد یک حساب کاربری در سایت ما، به طیف وسیعی از خدمات بازی دسترسی خواهید داشت.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>نام:<span style="color: red"> * </span></label>
                                        <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>نام کاربری:<span style="color: red"> * </span></label>
                                        <input type="text" name="user_name" :value="old('user_name')" required autocomplete="username" class="form-control">
                                        @error('user_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>رمزعبور:<span style="color: red"> * </span></label>
                                        <input  type="password"
                                                name="password"
                                                required autocomplete="new-password"  class="form-control">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>تکرار رمزعبور:<span style="color: red"> * </span></label>
                                        <input  type="password"
                                                name="password_confirmation" required autocomplete="new-password" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>تلفن:</label>
                                        <input type='text' name='phone' id='phone' class="form-control">
                                        @error('phone')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 offset-lg-3 text-center">
                                    <div id='submit'>
                                        <input type='submit'  value=' ثبت نام کنید' class="btn-main color-2">
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div id='mail_success' class='success'>پیام شما با موفقیت ارسال شد.</div>
                                    <div id='mail_fail' class='error'>با عرض پوزش، این بار در ارسال پیام شما خطایی رخ داد.</div>
                                    <div class="clearfix"></div>

                                </div>

                                <div class="col-lg-6 offset-lg-3">
                                    <div class="text-center">
                                        <h4 class="mt-3">در صورتی که ثبلا ثبت نام کرده اید میتوانید از طریق لینک زیر وارد شوید.</h4>
                                    </div>

                                    <div class="title-line text-center">
                                        <a class="btn-sc btn-fullwidth mb10" href="{{route('customer.login')}}">ورود</a>
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
                <img src="images/logo.png" alt="" >
                <div class="spacer-20"></div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget">
                            <h5> سرور بازی</h5>
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
                            <h5>صفحات</h5>
                            <ul>
                                <li><a href="#"> سرور بازی</a></li>
                                <li><a href="#">پایگاه دانش</a></li>
                                <li><a href="#">درباره ما</a></li>
                                <li><a href="#">بازاریابی</a></li>
                                <li><a href="#">مکان ها</a></li>
                                <li><a href="#">اخبار</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h5>خبرنامه</h5>
                    <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                        <div class="col text-center">
                            <a href="#" id="btn-subscribe"><i class="arrow_left bg-color-secondary"></i></a> <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="ایمیل خود را وارد کنید" type="text" >
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <div class="spacer-10"></div>
                    <small>ایمیل شما نزد ما محفوظ است. ما اسپم نمی کنیم.</small>
                    <div class="spacer-30"></div>
                    <div class="widget">
                        <h5>ما را دنبال کنید</h5>
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
                                کپی رایت 2024 - طراحی شده توسط روشاک
                            </a>
                        </div>
                        <ul class="menu-simple">
                            <li><a href="#">شرایط &amp; قوانین</a></li>
                            <li><a href="#">سیاست حفظ حریم خصوصی</a></li>
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

</body>

</html>
