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
    @include('partials.main.footer')


<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="{{asset('js/custom-marquee.js')}}"></script>
</body>

</html>
