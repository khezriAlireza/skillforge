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
                                <h4>به حساب خود وارد شوید</h4>
                                <div ><h5 class="text-danger">{{ $errors->first('login')}}</h5></div>

                            </div>

                            @error('login')
                            @enderror
                            <div class="spacer-10"></div>

                            <form id="form_register" class="form-border" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field-set">
                                    <label>نام کاربری</label>
                                    <input type='text' name='user_name' id='name' class="form-control">

                                </div>
                                <div class="field-set">
                                    <label>رمزعبور</label>
                                    <input type='password' name='password' id='password' class="form-control">
                                </div>
                                <div class="field-set">
                                    <input type="checkbox" checked id="html" name="remember" value="HTML">
                                    <label for="html"><span class="op-5">مرا به خاطر بسپار</span></label><br>
                                </div>
                                <div class="spacer-20"></div>
                                <div id="submit">
                                    <input type="submit" id="send_message" value="ورود" class="btn-main btn-fullwidth rounded-3" />
                                </div>
                            </form>
                            <div class="text-center">
                            <h4 class="mt-3">در صورتی که هنوز ثبت نام نکرده اید میتوانید از طریق لینک زیر اقدام کنید.</h4>
                            </div>

                            <div class="title-line text-center">
                                <a class="btn-sc btn-fullwidth mb10" href="{{route('customer.register')}}">ثبت نام کنید</a>
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
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="{{asset('js/custom-marquee.js')}}"></script>
</body>

</html>
