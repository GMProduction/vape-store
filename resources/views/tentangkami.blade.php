@extends('base')

@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/tentang.css') }}" type="text/css">
@endsection

@section('content')

    <section class="about-section">
        <div style="height: 100px"></div>
        <div class="container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">Tentang Kami</span>
                            <h2>KAKA ACC </h2>
                        </div>
                        <div class="text">Jl. Pengging- Banyudono, Cikalang, Ngaru Aru, Kec. Banyudono, Kabupaten Boyolali, Jawa Tengah 57373.</div>
                        <ul class="list-style-one">
                            <li>Berbagai macam aksesoris</li>
                            <li>Mainan Anak</li>
                        </ul>
                        <div class="btn-box">
                            <a href="#" class="theme-btn btn-style-one">Contact Us</a>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image-1"><a href="#" class="lightbox-image" data-fancybox="images"><img
                                    src="{{asset('static-image/aboutus.png')}}" alt="" style="width: 500px;"></a></figure>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.8280369817317!2d110.68103093040814!3d-7.540896209838515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6b6447208feb%3A0x9cabc054259798b7!2sKaka%20ACC!5e0!3m2!1sen!2sid!4v1628828546200!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.slider-kategori').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
        });
    </script>

@endsection
