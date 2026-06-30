
@include('partials.main.header')

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
                            @csrf                                <h4>{{ __('frontend.register_heading') }}</h4>
                            <p>{{ __('frontend.register_intro') }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.name') }}:<span style="color: red"> * </span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.username') }}:<span style="color: red"> * </span></label>
                                        <input type="text" name="user_name" value="{{ old('user_name') }}" required autocomplete="username" class="form-control">
                                        @error('user_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.password') }}:<span style="color: red"> * </span></label>
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
                                        <label>{{ __('frontend.confirm_password') }}:<span style="color: red"> * </span></label>
                                        <input  type="password"
                                                name="password_confirmation" required autocomplete="new-password" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>{{ __('frontend.phone_short') }}:</label>
                                        <input type='text' name='p_num' id='phone' value="{{ old('p_num') }}" class="form-control">
                                        @error('p_num')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 offset-lg-3 text-center">
                                    <div id='submit'>
                                        <input type='submit'  value='{{ __('frontend.register_submit') }}' class="btn-main color-2">
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div id='mail_success' class='success'>{{ __('frontend.mail_success') }}</div>
                                    <div id='mail_fail' class='error'>{{ __('frontend.mail_fail') }}</div>
                                    <div class="clearfix"></div>

                                </div>

                                <div class="col-lg-6 offset-lg-3">
                                    <div class="text-center">
                                        <h4 class="mt-3">{{ __('frontend.already_have_account') }}</h4>
                                    </div>

                                    <div class="title-line text-center">
                                        <a class="btn-sc btn-fullwidth mb10" href="{{route('customer.login')}}">{{ __('frontend.login') }}</a>
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
@include('partials.main.footer')


<!-- Javascript Files
================================================== -->
<script src="{{asset('main/js/plugins.js')}}"></script>
<script src="{{asset('main/js/designesia.js')}}"></script>
<script src="{{asset('main/js/swiper.js')}}"></script>
<script src="{{asset('main/js/custom-marquee.js')}}"></script>

</body>

</html>
