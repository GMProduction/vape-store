@extends('admin.base')

@section('title')
    Data Barang
@endsection

@section('content')

    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            swal("Berhasil!", "Berhasil Menambah data!", "success");
        </script>
    @endif

    <section class="m-2">


        <div class="table-container">


            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Data Banner</h5>
                <button type="button ms-auto" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#tambahbarang">Tambah Data</button>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                       URL Banner
                    </th>
                    <th>
                        Gambar Banner
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
                       <a href="https://google.com">http://google.com</a> 
                    </td>
                    <td>
                        <img src="https://vp.vapehan.com/api/images/product/bcatp-imr-18650-2500mah-35a-.jpg" style="height: 75px; width: 75px; object-fit: cover"/>
                    </td>
                   
                    <td>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahbarang">Ubah</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('id', 'nama') ">hapus</button>
                    </td>

                </tr>

            </table>

        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="url" class="form-label">URL Webste</label>
                                <input type="text" class="form-control" id="url">
                            </div>

                       

                            <div class="mt-3 mb-2">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="gambar">
                            </div>


                            <div class="mb-4"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </section>

@endsection

@section('script')

@endsection
