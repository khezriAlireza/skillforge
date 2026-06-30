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
    @include('partials.main.footer')


<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>

</body>

</html>
