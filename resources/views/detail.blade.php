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


                    <p class="mt-5">
                        {!! $data->deskripsi !!}
                    </p>
                </div>

                <div class="col-5">

                    <div class="table-container p-5">

                        <p class="mb-0 fw-bold">Harga</p>
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-0 fw-bold t-yellow">Rp. {{number_format($data->harga, 0)}}</h4>

                        </div>

                        <form id="form" onsubmit="return savePesanan()">
                            @csrf
                            <label for="qty" class="form-label mt-3">Jumlah Pembelian</label><br>
                            <div class="qty-input mb-3">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="qty" id="qty" min="1" max="10" value="1" onchange="changeQty()">
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
        </div>
    </section>


@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        var ongkir = 0, hargaPesanan, qty = 1, service, estimasi, total;

        $(document).ready(function () {
            hargaPesanan = parseInt('{{$data->harga}}');
            getImage()
            ganti()
        })

        function afterOrder() {
            window.location = '/user/keranjang'
        }

        function beliSekarang() {
            @if(auth()->user() && auth()->user()->roles == 'user')
            saveData('Beli Sekarang', 'form', null, afterOrder);
            return false;
            @else
            swal('Silahkan login / register sebagai member untuk dapat melakukan pemesanan');
            return false;
            @endif
        }
        function savePesanan() {

            @if(auth()->user() && auth()->user()->roles == 'user')
            saveData('Masukkan keranjang', 'form');
            return false;
            @else
            swal('Silahkan login / register sebagai member untuk dapat melakukan pemesanan');
            return false;
            @endif
        }

        function getImage(){
            $.get('/produk/detail/{{$data->id}}/image', function (data) {
                var sliderAtas = $('.slider-for');
                var sliderBawah =  $('.slider-nav');
                sliderAtas.empty();
                sliderBawah.empty();
                $.each(data, function (key, value) {
                    sliderAtas.append('<img src="'+value['url_foto']+'" class="gambar-detail"/>')
                    sliderBawah.append('<img src="'+value['url_foto']+'" class="m-2">')
                })

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
            var total = (hargaPesanan * qty) + ongkir;
            $('#totalHarga').val(total);
        })




        function ganti() {
            total = (hargaPesanan * qtyPesanan) + ongkir;
            $('#ongkir').val(ongkir);
            $('#service').val(service);
            $('#estimasi').val(estimasi);
            $('#tampilBiaya').html(ongkir.toLocaleString());
            $('#tampilTotal').html(total.toLocaleString());
            $('#totalHarga').val(total);
        }


    </script>
@endsection
