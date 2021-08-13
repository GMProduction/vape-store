@extends('user.dashboard')

@section('contentUser')

  

<section class="container">
    <div class="row item-box">
        <div class="col-6">
            <div class="d-flex">

                <div class="ms-4">
                    <p class="title mb-0">Nomor Pesanan : 123</p>
                    <hr>
                    <p class="qty">tanggal</p>
                    <p class="keterangan">alamat pengiriman</p>
                    <p class="totalHarga">Total Harga</p>
                </div>

            </div>

        </div>

        <div class="col-6">
            <p>Produk yang di beli</p>
            <div class="item-box">
                <div class="d-flex">
                    <img
                        src="https://vp.vapehan.com/api/images/product/aaa-jarvis-pro-pod-cartridge-1.4-ohm-1pcs-.jpg" />
                    <div class="ms-4 flex-fill">
                        <div class="d-flex justify-content-between">
                            <p class="title">Nama Produk</p>
                            
                        </div>
                        <p class="qty mb-3">Qty</p>
                        <p class="keterangan mb-0">Keterangan</p>
                    </div>

                </div>

            </div>

            <div class="item-box">
                <div class="d-flex">
                    <img
                        src="https://vp.vapehan.com/api/images/product/aaa-jarvis-pro-pod-cartridge-1.4-ohm-1pcs-.jpg" />
                    <div class="ms-4 flex-fill">
                        <div class="d-flex justify-content-between">
                            <p class="title">Nama Produk</p>
                           
                        </div>
                        <p class="qty mb-3">Qty</p>
                        <p class="keterangan mb-0">Keterangan</p>
                    </div>

                </div>

            </div>
           
        </div>

        <div class="d-flex mt-4">

            <a class="btn bt-primary btn-sm ms-auto" data-bs-toggle="modal"
                data-bs-target="#returbarang">Retur Barang</a>
        </div>
    </div>
    

    <div class="modal fade" id="returbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Retur Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="alasanretur" class="form-label">Alasan Retur</label>
                            <textarea class="form-control" id="alasanretur" rows="3"></textarea>
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
        $(document).ready(function() {
            
            $("#selesai").addClass("active");
        });
    </script>

@endsection
