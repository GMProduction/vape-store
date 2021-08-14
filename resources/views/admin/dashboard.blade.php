@extends('admin.base')
@section('title')
    Dashboard
@endsection
@section('content')

    <section class="m-2">


        <div class="table-container">

            <h5 class="mb-3">Pesanan Baru</h5>

            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                        Nama Pelanggan
                    </th>
                    <th>
                        Tanggal Pesan
                    </th>

                    <th>
                        Total Harga
                    </th>

                    <th>
                        Action
                    </th>

                </thead>

                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Joko
                    </td>
                    <td>
                        13 Agustus 2021
                    </td>
                    <td>
                        1.000.000
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail1">Detail</button>
                    </td>
                </tr>

            </table>

        </div>

        <div class="table-container">

            <h5 class="mb-3">Pesanan Yang Harus Dikirim</h5>

            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                        Nama Pelanggan
                    </th>
                    <th>
                        Tanggal Pesan
                    </th>

                    <th>
                        Total Harga
                    </th>

                    <th>
                        Action
                    </th>

                </thead>

                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Joko
                    </td>
                    <td>
                        13 Agustus 2021
                    </td>
                    <td>
                        1.000.000
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail2">Detail</button>
                    </td>
                </tr>

            </table>

        </div>

    </section>

    <!-- Modal Detail-->
    <div class="modal fade" id="detail1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row ">
                        <div class="col-8">
                            <div class="row  border rounded p-3 g-2">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dtanggalPesanan" class="form-label fw-bold">Tanggal</label>
                                        <p  id="dtanggalPesanan">21 Agustus 2021</p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dNamaPelanggan" class="form-label fw-bold">Nama Pelanggan</label>
                                        <p id="dNamaPelanggan">Joko</p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dAlamatPengiriman" class="form-label fw-bold">Alamat Pengiriman</label>
                                        <textarea type="text" class="form-control" readonly
                                            id="dAlamatPengiriman"></textarea>
                                    </div>
                                </div>

                                <div class="col-6">


                                    <p class="mb-0 fw-bold">Biaya</p>
                                    <div class="d-flex justify-content-between">
                                        <p>Pesanan</p>
                                        <h5 class="mb-0">Rp. 1.000.000</h5>

                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p>Ongkir</p>
                                        <h5 class="mb-0">Rp. 12.000</h5>

                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <p>Total</p>
                                        <h4 class="mb-5 fw-bold">Rp. 1.012.000</h4>

                                    </div>


                                </div>
                            </div>

                        </div>



                        <div class="col-4 border rounded p-3">

                            <div class="mb-3">
                                <a for="dBuktiTransfer" class="d-block">Bukti Transfer</a>
                                <a style="cursor: pointer"
                                    href="https://images.tokopedia.net/img/cache/900/product-1/2020/4/10/22258225/22258225_4e32e5f1-82ec-47bd-8202-5b0ca54ded39_1000_1000"
                                    target="_blank">
                                    <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/4/10/22258225/22258225_4e32e5f1-82ec-47bd-8202-5b0ca54ded39_1000_1000"
                                        style="width: 100px; height: 50px; object-fit: cover" />
                                </a>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Pembayaran</label>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-sm btn-success me-2">Terima</button>
                                    <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                </div>
                            </div>

                            <div>
                                <p>Kontak Pelanggan</p>
                                <a  class="btn btn-sm btn-primary">chat</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-container mt-5">

                        <h5 class="mb-3">Isi Keranjang Pesanan</h5>
            
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <th>
                                    #
                                </th>
                                <th>
                                    Produk
                                </th>
                                <th>
                                    Qty
                                </th>
            
                                <th>
                                    Total Harga
                                </th>
            
            
                            </thead>
            
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Mainan Anak
                                </td>
                                <td>
                                    13
                                </td>
                                <td>
                                    1.012.000
                                </td>
            
                            
                            </tr>
            
                        </table>
            
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Detail-->
<div class="modal fade" id="detail2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="row ">
                    <div class="col-8">
                        <div class="row  border rounded p-3 g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="dtanggalPesanan2" class="form-label fw-bold">Tanggal</label>
                                    <p  id="dtanggalPesanan2">21 Agustus 2021</p>
                                </div>

                                <div class="mb-3">
                                    <label for="dNamaPelanggan2" class="form-label fw-bold">Nama Pelanggan</label>
                                    <p id="dNamaPelanggan2">Joko</p>
                                </div>

                                <div class="mb-3">
                                    <label for="2" class="form-label fw-bold">Alamat Pengiriman</label>
                                    <textarea type="text" class="form-control" readonly
                                        id="dAlamatPengiriman2"></textarea>
                                </div>
                            </div>

                            <div class="col-6">


                                <p class="mb-0 fw-bold">Biaya</p>
                                <div class="d-flex justify-content-between">
                                    <p>Pesanan</p>
                                    <h5 class="mb-0">Rp. 1.000.000</h5>

                                </div>

                                <div class="d-flex justify-content-between">
                                    <p>Ongkir</p>
                                    <h5 class="mb-0">Rp. 12.000</h5>

                                </div>

                                <hr>

                                <div class="d-flex justify-content-between">
                                    <p>Total</p>
                                    <h4 class="mb-5 fw-bold">Rp. 1.012.000</h4>

                                </div>


                            </div>
                        </div>

                    </div>



                    <div class="col-4 border rounded p-3">

                        <div class="mb-3">
                            <a for="dBuktiTransfer" class="d-block">Bukti Transfer</a>
                            <a style="cursor: pointer"
                                href="https://images.tokopedia.net/img/cache/900/product-1/2020/4/10/22258225/22258225_4e32e5f1-82ec-47bd-8202-5b0ca54ded39_1000_1000"
                                target="_blank">
                                <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/4/10/22258225/22258225_4e32e5f1-82ec-47bd-8202-5b0ca54ded39_1000_1000"
                                    style="width: 100px; height: 50px; object-fit: cover" />
                            </a>
                        </div>

                        <div>
                            <p>Action</p>
                            <a  class="btn btn-sm btn-primary">chat</a>
                            <a  class="btn btn-sm btn-success">Kirim Barang</a>
                        </div>
                    </div>
                </div>

                <div class="table-container mt-5">

                    <h5 class="mb-3">Isi Keranjang Pesanan</h5>
        
                    <table class="table table-striped table-bordered ">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                Produk
                            </th>
                            <th>
                                Qty
                            </th>
        
                            <th>
                                Total Harga
                            </th>
        
        
                        </thead>
        
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Mainan Anak
                            </td>
                            <td>
                                13
                            </td>
                            <td>
                                1.012.000
                            </td>
        
                        
                        </tr>
        
                    </table>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection
