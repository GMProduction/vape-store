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
                        <h5 class="text-center">Tidak ada data keranjang</h5>
                    @endforelse
                </div>
                <div class="d-flex mt-4 justify-content-end">
                   <div>
                       <a class="btn bt-orange btn-sm ms-auto" id="showTerima" data-id="{{$d->id}}">Terima Barang</a>
                       <a class="btn bt-primary btn-sm ms-auto" id="showRetur" data-id="{{$d->id}}">Retur Barang</a>
                   </div>
                </div>
            </div>
        @empty
            <h4 class="text-center">Tidak ada data pesanan</h4>
        @endforelse




    </section>

    <div class="modal fade" id="returbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Retur Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRetur" onsubmit="return SaveRetur()">
                        @csrf
                        <input id="id" name="id">
                        <div class="mb-3">
                            <label for="alasanretur" class="form-label">Alasan Retur</label>
                            <textarea class="form-control" id="alasanretur" name="alasan" rows="3"></textarea>
                        </div>
                        <div class="mb-4"></div>
                        <button type="submit" class="btn bt-primary">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scriptUser')

    <script>
        $(document).ready(function() {

            $("#pengiriman").addClass("active");
        });

        $(document).on('click', '#showRetur', function () {
            var id = $(this).data('id');

            $('#returbarang #id').val(id);
            $('#returbarang #alasanretur').val('');
            $('#returbarang').modal('show');
        })

        $(document).on('click','#showTerima', function () {
            var id = $(this).data('id');
            var form_data = {
                'id' : id,
                '_token' : '{{csrf_token()}}'
            }
            saveDataObject('Terima Pesanan',form_data)
            return false;
        })

        function SaveRetur() {
            saveData('Retur Pesanan','formRetur', window.location.pathname+'/retur');
            return false
        }
    </script>

@endsection
