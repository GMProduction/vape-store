@extends('base')

@section('moreCss')
@endsection

@section('content')

    <section>
        <div style="height: 57px"></div>

            
        <div class="slider">
            <img src="https://lostvape.com/wp-content/uploads/2020/09/Z100A_01.jpg" alt="img04" />
        </div>
        <div style="height: 50px"></div>
    </section>
    <section class="container">

        <div>
            <h4 class="mb-5 text-center fw-bold">Mainan Anak Yang Kami Punya</h4>

            <div class="row">
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://lostvape.com/wp-content/uploads/2020/09/Z100A_01.jpg" />
                        <div class="content">
                            <p class="title mb-0">AAA JARVIS PRO POD CARTRIDGE 1.4 OHM<</p>
                            <p class="description mb-0">Rp. 24,000</p>

                        </div>
                    </a>
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

@section('script')

    <script>
       
    </script>

@endsection
