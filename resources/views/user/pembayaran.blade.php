@extends('user.dashboard')

@section('contentUser')



    <section class="container">

        <div class="row item-box mb-5">
            <p class="fw-bold">Pembayaran Bisa di Lakukan di</p>

            @forelse($bank as $b)
                <div class="item-box">
                    <div class="d-flex">
                        <img
                            src="{{$b->url_gambar}}"/>
                        <div class="ms-4 flex-fill">
                            <div class="d-flex justify-content-between">
                                <p class="title">{{$b->nama_bank}}</p>
                            </div>
                            <p class=" qty mb-0">Holder Name : {{$b->holder_bank}}</p>
                            <p class="keterangan mb-3">No Rekening : {{$b->norek}}</p>
                        </div>

                    </div>

                </div>
            @empty
            @endforelse

        </div>

        @forelse($data as $d)
            <div class="row item-box mb-4">
                <div class="col-6">
                    <div class="d-flex">

                        <div class="ms-4">
                            <p class="title mb-0">Nomor Pesanan : {{$d->id}}</p>
                            <hr>
                            <p class="qty">{{date('d F Y', strtotime($d->tanggal_pesanan))}}</p>
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
                        <h5 class="text-center">Tidak ada data pembayaran</h5>
                    @endforelse

                    <div class="d-flex mt-4">

                        <a class="btn bt-primary btn-sm ms-auto" data-id="{{$d->id}}" id="addBukti">Upload Pembayaran</a>
                    </div>
                </div>

            </div>
        @empty
            <h4 class="text-center">Tidak ada data pesanan</h4>
    @endforelse

    <!-- Modal Tambah-->
        <div class="modal fade" id="uploadpembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return saveBukti()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="image" class="form-label">Bukti Transfer</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Bank</label>
                                <select id="bank" name="bank" class="form-control"></select>
                            </div>
                            <div class="mb-4"></div>
                            <button type="submit" class="btn bt-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

@section('scriptUser')

    <script>
        $(document).ready(function () {

            $("#pembayaran").addClass("active");
        });

        function afterSave() {

        }

        function saveBukti() {
            saveData('Upload Bukti', 'form')
            return false;
        }

        $(document).on('click', '#addBukti', function () {
            var id = $(this).data('id');
            getBank()
            $('#uploadpembayaran #id').val(id);
            $('#uploadpembayaran').modal('show');
        })

        function getBank(idValue) {
            var select = $('#bank');
            select.empty();
            select.append('<option value="" disabled selected>Pilih Data</option>')
            $.get('/bank', function (data) {
                $.each(data, function (key, value) {
                    if (idValue === value['id']) {
                        select.append('<option value="' + value['id'] + '" selected>' + value['nama_bank'] + ' ( an. ' + value['holder_bank'] + ' )</option>')
                    } else {
                        select.append('<option value="' + value['id'] + '">' + value['nama_bank'] + ' ( an. ' + value['holder_bank'] + ' )</option>')
                    }
                })
            })
        }
    </script>

@endsection
