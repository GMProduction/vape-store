@extends('admin.base')

@section('title')
    Data Barang
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/basic.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/dropzone.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}" type="text/css">
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
                <h5>Data Produk</h5>
                <button type="button ms-auto" class="btn btn-primary btn-sm" id="addData">Tambah Data
                </button>
            </div>


            <table class="table table-striped table-bordered ">
                <thead>
                <th>#</th>
                <th>nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Action</th>
                </thead>
                @forelse($data as $key => $d)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$d->nama_produk}}</td>
                        <td>{{$d->getKategori->nama_kategori}}</td>
                        <td>{{$d->harga}}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" id="editData" data-id="{{$d->id}}" data-harga="{{$d->harga}}" data-kategori="{{$d->id_kategori}}"
                                    data-nama="{{$d->nama_produk}}">Ubah
                            </button>
                            <button type="button" class="btn btn-primary btn-sm" id="editImage" data-id="{{$d->id}}">Gambar</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('id', 'nama') ">hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">Tidak ada data produk</td>
                    </tr>
                @endforelse
            </table>

        </div>


        <div>


            <!-- Modal Tambah-->
            <div class="modal fade" id="tambahproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formProduk" onsubmit="return saveProduk()">
                                <input id="id" name="id">
                                @csrf
                                <div class="mb-3">
                                    <label for="namaProduk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="namaProduk" name="nama_produk">
                                </div>

                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <div class="d-flex">
                                        <select class="form-select" aria-label="Default select example" id="id_kategori" name="id_kategori">
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                                </div>
                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="tambahImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="pl-lg-4">
                                <form id="formImg" action="/admin/produk/image" method="post" class="dropzone mb-2" enctype="multipart/form-data" style="border-radius: 10px">
                                    @csrf
                                    <input id="id" name="id" hidden>
                                    <div class="fallback">
                                        <input name="image" type="file" multiple/>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('css/dropzone/js/dropzone.min.js') }} "></script>
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function () {

        })

        $(document).on('click', '#addData', function () {
            getSelect('id_kategori', '/kategori', 'nama_kategori')
            $("#deskripsi").summernote('');
            $('#tambahproduk #id').val('');
            $('#tambahproduk #namaProduk').val('');
            $('#tambahproduk #harga').val('');
            $('#tambahproduk').modal('show')
        })
        $(document).on('click', '#editData', function () {
            $("#deskripsi").summernote('code', 'asd');
            $('#tambahproduk #id').val($(this).data('id'));
            $('#tambahproduk #namaProduk').val($(this).data('nama'));
            $('#tambahproduk #harga').val($(this).data('harga'));
            var kate = $(this).data('kategori');
            console.log(kate);
            getSelect('id_kategori', '/kategori', 'nama_kategori', kate)

            $('#tambahproduk').modal('show')
        })

        function saveProduk() {
            saveData('Simpan Produk', 'formProduk')
            return false;
        }

        $(document).on('click', '#editImage', function () {
            getImage($(this).data('id'))
            $('#tambahImage #id').val($(this).data('id'))
            $('#tambahImage').modal('show')
        })

        function getImage(id) {
            Dropzone.options.formImg = {
                // paramName: 'image',
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                addRemoveLinks: true,
                // thumbnailWidth: 120,
                // thumbnailHeight: 120,
                transformFile: function (file, done) {
                    // const imageCompressor = new ImageCompressor();
                    new Compressor(file, {
                        quality: 0.6,
                        success(result) {
                            console.log(result);
                            done(result)
                        },
                        error(err) {
                            console.log(err.message);
                        },
                    });

                },
                removedfile: function (file) {
                    var idImg, name;
                    console.log(file)
                    if (file.xhr){
                        idImg = JSON.parse(file.xhr.response)['payload']['id'];
                        name = JSON.parse(file.xhr.response)['payload']['image'];
                    }else {
                        idImg = file['idImg'];
                        name = file['name'];
                    }
                    console.log(idImg);
                    {{--var name = JSON.parse(file.xhr.response)['payload']['image'];--}}
                    {{--var idImg = JSON.parse(file.xhr.response)['payload']['id'];--}}
                    {{--console.log('delete')--}}
                    $.ajax({
                        type: 'POST',
                        url: '/admin/sarana-dan-prasarana/add-image',
                        data: {name: name, id: idImg, action: 2, '_token': '{{csrf_token()}}',},
                        sucess: function (data) {
                            console.log('success: ' + data);
                        }
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                sending: function (file, xhr, formData) {
                    file.myCustomName = "my-new-name" + file.name;
                    // formData.append("filesize", file.size);
                    formData.append("fileName", file.myCustomName);
                    formData.append("id_facility", $('#visi #id').val());
                },
                success: function (file, response) {

                    console.log(file);
                    console.log(response);
                    file.previewElement.querySelector("img").src = response['payload']['image'];
                    file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                    file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                    $('.dz-image img').attr('height', '120')

                },
                accept: function (file, done) {
                    this.options.resizeWidth = 650;
                    this.options.resizeQuality = 0.75;
                    console.log(this.options);
                    done();
                    return;
                },
                init: async function () {
                    let myDropzone = this;

                    var existing_files = $('[name="image[]"]').val();
                    $.get('/admin/produk/image', {'id': id}, function (data) {
                        if (data['status'] === 200) {
                            console.log(data)
                            var img = data['payload'];
                            $.each(img, function (key, value) {
                                var mockFile = {name: value['image'], size: value['size'], idImg: value['id'] };
                                myDropzone.displayExistingFile(mockFile, value['image']);
                            })

                        }
                    })
                    $('.dz-image img').attr('height', '120');
                }

            };
        }
    </script>

@endsection
