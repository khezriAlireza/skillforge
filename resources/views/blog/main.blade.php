@include('partials.main.header')

<!-- header close -->
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section id="subheader" class="jarallax">
            <img src="{{asset('storage/'.$post->image)}}" class="jarallax-img" alt="">
            <div class="container z-1000">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">{{ $post->title }}</h2>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-read">

                            <div class="post-text">

                              {!! $post->text !!}

                            </div>

                        </div>

                        <div class="spacer-single"></div>


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

</body>

</html>
