@extends('base')

@section('moreCss')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shimer.css') }}"/>

@endsection

@section('content')


    <section class="container">


        <div>
            <div style="height: 130px"></div>
            <h4 class="mb-4  fw-bold"><span class="t-primary">{{$data->nama_produk}}</span> ({{$data->getKategori->nama_kategori}})</h4>
            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="slider-for">
                        <div class="shine" style="width: 100%; height: 620px"></div>
                    </div>
                    <div class="slider-nav mt-3">
                        <div class="row">
                            <div class="shine m-2 col" style="width: 100%; height: 150px"></div>
                            <div class="shine m-2 col" style="width: 100%; height: 150px"></div>
                            <div class="shine m-2 col" style="width: 100%; height: 150px"></div>
                            <div class="shine m-2 col" style="width: 100%; height: 150px"></div>
                        </div>
                    </div>

                </div>

                <div class="col-6">
                    <div class="table-container px-5">
                        <p class="mb-0 fw-bold">Harga</p>
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-0 fw-bold t-yellow">Rp. {{number_format($data->harga, 0)}}</h4>
                        </div>
                        <p class="mb-0 mt-2">Stok tersedia : {{$data->sisa}}</p>

                        <form id="form" onsubmit="return savePesanan()">
                            @csrf
                            <label for="qty" class="form-label mt-3">Jumlah Pembelian</label><br>
                            <div class="qty-input mb-3">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="qty" id="qty" min="1" max="{{$data->sisa}}" readonly value="1" onchange="changeQty()">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>
                            <div class="mb-5 mt-4">
                                <label for="keteranganTambahan" class="form-label">Keterangan Tambahan</label>
                                <textarea class="form-control" id="keteranganTambahan" name="keterangan" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Total</p>
                                <h4 class="mb-5 fw-bold">Rp. <span id="tampilTotal">0</span></h4>
                            </div>
                            <input id="totalHarga" name="totalHarga" hidden>

                            <div class="mb-3"></div>
                            <button type="submit" class="btn bt-primary w-100">Tambah Ke keranjang</button>
                            <button type="button" class="btn bt-orange w-100" onclick="beliSekarang()">Beli Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row table-container">
                <p class="mb-0 fw-bold">Deskripsi</p>
                <p class="">
                    {!! $data->deskripsi !!}
                </p>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        var hargaPesanan, qty = 1, service, estimasi, total;

        $(document).ready(function () {
            hargaPesanan = parseInt('{{$data->harga}}');
            getImage()
            ganti()
            if ('{{$data->sisa}}' <= 1) {
                $('.qty-count--add, .qty-count--minus').attr('disabled', '')
                if ('{{$data->sisa}}' == 0) {
                    $('#qty').val(0)
                    qty = 0;
                    qtyPesanan = 0;
                }
            }

        })

        function afterOrder() {
            window.location = '/user/keranjang'
        }

        function beliSekarang() {
            @if(auth()->user() && auth()->user()->roles == 'user')
            @if($data->sisa == 0)
            swal('Stok tidak tersedia');
            @else
            saveData('Masukkan keranjang', 'form');
            @endif
                return false;
            @else
            swal('Silahkan login / register sebagai member untuk dapat melakukan pemesanan');
            return false;
            @endif
        }

        function savePesanan() {

            @if(auth()->user() && auth()->user()->roles == 'user')
            @if($data->sisa == 0)
            swal('Stok tidak tersedia');
            @else
            saveData('Masukkan keranjang', 'form');
            @endif
                return false;
            @else
            swal('Silahkan login / register sebagai member untuk dapat melakukan pemesanan');
            return false;
            @endif
        }

        function getImage() {
            $.get('/produk/detail/{{$data->id}}/image', function (data) {
                var sliderAtas = $('.slider-for');
                var sliderBawah = $('.slider-nav');
                sliderAtas.empty();
                sliderBawah.empty();
                if (data.length > 0) {

                    $.each(data, function (key, value) {
                        sliderAtas.append('<div  style="height: 620px; display: flex; align-items: center; justify-content: center"><img src="' + value['url_foto'] + '" width="400" class="m-2" style="object-fit: cover"/></div>')
                        sliderBawah.append('<div class="imgSlider" style="height: 150px; width: 150px; display: flex; align-items: center; justify-content: center"><img src="' + value['url_foto'] + '" width="130" class="m-2" style="object-fit: cover"/></div>')
                    })
                } else {
                    sliderAtas.append('<img src="{{asset('/static-image/logo.png')}}" class="gambar-detail"/>')
                    sliderBawah.append('<img src="{{asset('/static-image/logo.png')}}" class="m-2">')
                }
                sliderAtas.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                sliderBawah.slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    dots: true,
                    centerMode: true,
                    focusOnSelect: true
                });
            })
        }

        $('.product-qty').change(function () {
            qty = parseInt($('#qty').val());
            console.log(qty)
            var total = (hargaPesanan * qty);
            $('#totalHarga').val(total);
        })

        function ganti() {
            total = (hargaPesanan * qtyPesanan);
            $('#service').val(service);
            $('#estimasi').val(estimasi);
            $('#tampilTotal').html(total.toLocaleString());
            $('#totalHarga').val(total);
        }


    </script>
@endsection
