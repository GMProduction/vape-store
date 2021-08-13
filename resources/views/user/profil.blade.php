@extends('user.dashboard')

@section('contentUser')

  

    <section class="container">

        <div class="row">
            <div class="col-6">
                <div class="item-box">
                    <div >
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" readonly id="nama">
                        </div>

                        <div class="mb-3">
                            <label for="nohp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" readonly id="nohp">
                        </div>

                        
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" readonly rows="3"></textarea>
                    </div>
                    </div>
                </div>
            </div>
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

@section('scriptUser')

    <script>
        $(document).ready(function() {
            
            $("#profil").addClass("active");
        });
    </script>

@endsection
