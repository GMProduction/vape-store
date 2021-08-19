@extends('base')

@section('moreCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shimer.css') }}"/>

@endsection

@section('content')
    <style>
        .card-shimer {
            height: 70px;
            padding: 16px;
            border-radius: 15px;
            margin: 16px;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        }
    </style>
    <section>
        <div style="height: 57px"></div>

        <div class="slider">
{{--            <img src="https://lostvape.com/wp-content/uploads/2020/09/Z100A_01.jpg"/>--}}
{{--            <img src="https://vp.vapehan.com/api/images/banners/1.jpg"/>--}}
        </div>

        <div style="height: 50px"></div>
    </section>
    <section class="container">
        <h4 class="text-center fw-bold">Kategori Pilihan</h4>
        <hr class="underline">

        <div class="slider-kategori ">
            @forelse($kategori as $d)
                <div>
                    <a class="card-kategori shine" href="/produk?kategori={{$d->nama_kategori}}">
                        <img
                            src="{{$d->url_foto}}">
                        <p class="title">{{$d->nama_kategori}}</p>
                    </a>
                </div>
            @empty
                <h4 class="text-center">Tidak ada Kategori</h4>
            @endforelse
        </div>


        <div style="height: 50px"></div>
        <div>
            <h4 class="mb-5 text-center fw-bold">Produk Baru</h4>
            <hr class="underline">

            <div class="row">
                @forelse($produk as $d)
                    <div class="col-lg-3">
                        <a class="cardku"  href="/produk/detail/{{$d->id}}">
                            <img
                                src="{{$d->getImage ? $d->getImage[0]->url_foto : '/static-image/logo.png'}}"/>
                            <div class="content">
                                <p class="title mb-0 ">{{$d->nama_produk}}</p>
                                <p class="description mb-0">{{$d->getKategori->nama_kategori}}</p>
                                <p class="description mb-0">Rp. {{number_format($d->harga,0)}}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <h4 class="text-center">Tidak ada Produk</h4>
                @endforelse
            </div>

            <!-- Modal Tambah-->
            <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Register</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Payment Slip</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>


                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </section>


@endsection

@section('script')

    <script>
        $(document).ready(function () {
            // $('.slider').slick({
            //     dots: true,
            //     infinite: true,
            //     speed: 500,
            //     fade: true,
            //     cssEase: 'linear',
            //     autoplay: true,
            //     autoplaySpeed: 2000,
            //     arrows: false
            // });
            getBaner();
        });

        function getBaner(){
            $.get('/baner', function (data) {
                var slider = $('.slider');
                if (data.length > 0){
                    $.each(data, function (key, value) {
                        slider.append('<a target="_blank" href="'+value['url_web']+'"><img src="'+value['url_gambar']+'"/></a>')
                    })

                    slider.slick({
                        dots: true,
                        infinite: true,
                        speed: 500,
                        fade: true,
                        cssEase: 'linear',
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: false
                    });
                }else{
                    slider.append('<h4>Tidak ada baner<h4>')
                }
            })
        }

        $(document).ready(function () {
            $('.slider-kategori').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
        });
    </script>

@endsection
