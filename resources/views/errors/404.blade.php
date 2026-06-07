@include('partials.main.header')
<div class="no-bottom no-top" id="content">

    <section id="swiper-s2" class="no-top no-bottom position-relative z-1000">
        <img src="{{asset('images/background/404.png')}}" alt="">
    </section>
    <footer>
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4">
                    <img src="images/footerLogo.png"  height="300px" width="300px" alt="" >
                    <div class="spacer-20"></div>
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
                        <h5>درباره ما</h5>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        <div class="spacer-10"></div>
                        <div class="spacer-30"></div>
                        <div class="widget">
                            <h5>ما را دنبال کنید</h5>
                            <div class="social-icons">
                                <a href="#"><i class="fa-brands fa-telegram"></i></a>
                                <a href="https://discord.com/invite/cxVkzQvA"><i class="fa-brands fa-discord"></i></a>
                                {{--                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>--}}
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

</div>




<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="{{asset('js/swiper.js')}}"></script>
<script src="{{asset('js/custom-marquee.js')}}"></script>
<script src="{{asset('js/custom-swiper-2.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
