@include('partials.main.header')
<div class="no-bottom no-top" id="content">

    <section id="swiper-s2" class="no-top no-bottom position-relative z-1000">
        <img src="{{ asset('images/background/404.png') }}" alt="">
    </section>

</div>
<!-- content close -->
@include('partials.main.footer')




<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="{{asset('js/swiper.js')}}"></script>
<script src="{{asset('js/custom-marquee.js')}}"></script>
<script src="{{asset('js/custom-swiper-2.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
