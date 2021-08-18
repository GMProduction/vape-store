@extends('user.dashboard')

@section('contentUser')



    <section class="container">

        @forelse($data as $d)
            <div class="row item-box mb-4">
                <div class="col-6">
                    <div class="d-flex">

                        <div class="ms-4">
                            <p class="title mb-0">Nomor Pesanan : {{$d->id}}</p>
                            <hr>
                            <p class="qty">{{date('d F Y', strtotime($d->tanggal_pesan))}}</p>
                            <p class="keterangan">{{$d->getExpedisi->nama_kota}} - {{$d->getExpedisi->nama_propinsi}}</p>
                            <p class="keterangan">{{$d->alamat_pengiriman}}</p>
                            <p class="totalHarga">Rp. {{number_format($d->total_harga, 0)}}</p>
                        </div>

                    </div>

                </div>

                <div class="col-6">
                    <p>Produk yang di beli</p>
                    @forelse($d->getKeranjang as $k)
                        <div class="item-box mb-2">
                            <div class="d-flex">
                                <img
                                    src="{{$k->getProduk->getImage[0]->url_foto}}"/>
                                <div class="ms-4 flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <p class="title">{{$k->getProduk->nama_produk}}</p>
                                    </div>
                                    <p class="qty mb-3">Qty : {{$k->qty}}</p>
                                    <p class="totalHarga mb-3" style="font-size: 1rem; color: black">Harga : Rp. {{number_format($k->total_harga,0)}}</p>
                                    <p class="keterangan mb-0">{{$k->keterangan}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5 class="text-center">Tidak ada data menunggu konfirmasi</h5>
                    @endforelse
                </div>

            </div>
        @empty
            <h4 class="text-center">Tidak ada data pesanan</h4>
        @endforelse




    </section>


@endsection

@section('scriptUser')

    <script>
        $(document).ready(function() {

            $("#menunggu").addClass("active");
        });
    </script>

@endsection
