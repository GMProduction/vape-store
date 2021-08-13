@extends('base')

@section('moreCss')
@endsection

@section('content')

    <section>
        <div style="height: 57px"></div>

        <div class="slider">
            <img src="https://lostvape.com/wp-content/uploads/2020/09/Z100A_01.jpg" />
            <img src="https://vp.vapehan.com/api/images/banners/1.jpg" />
        </div>

        <div style="height: 50px"></div>
    </section>
    <section class="container">
        <h4 class="text-center fw-bold">Kategori Pilihan</h4>
        <hr class="underline">

        <div class="slider-kategori ">
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://vp.vapehan.com/api/images/product/bcatp-imr-18650-2500mah-35a-.jpg">
                    <p class="title">Battery</p>

                </a>
            </div>
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://vp.vapehan.com/api/images/product/uwell-caliburn-koko-cartridge-1pcs-.jpg">
                    <p class="title">Catridge</p>

                </a>
            </div>
            <div>
                <a class="card-kategori" href="/kategori">
                    <img
                        src="https://vp.vapehan.com/api/images/product/oris-el-lien-prebuild-alien-fused-clapton-.jpg">
                    <p class="title">Coil</p>

                </a>
            </div>
          
        </div>


        <div style="height: 50px"></div>
        <div>
            <h4 class="mb-5 text-center fw-bold">Produk Baru</h4>
            <hr class="underline">

            <div class="row">


                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://vp.vapehan.com/api/images/product/rpm-80-rgc-empty-cartridge-1pcs-.jpg" />
                        <div class="content">
                            <p class="title mb-0">AAA JARVIS PRO POD CARTRIDGE 1.4 OHM</p>
                            <p class="description mb-0">Rp. 24,000</p>

                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://vp.vapehan.com/api/images/product/rpm-80-rgc-empty-cartridge-1pcs-.jpg" />
                        <div class="content">
                            <p class="title mb-0">AAA JARVIS PRO POD CARTRIDGE</p>
                            <p class="description mb-0">Rp. 24,000</p>

                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://vp.vapehan.com/api/images/product/rpm-80-rgc-empty-cartridge-1pcs-.jpg" />
                        <div class="content">
                            <p class="title mb-0">AAA JARVIS PRO POD CARTRIDGE</p>
                            <p class="description mb-0">Rp. 24,000</p>

                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="cardku" href="/detail">
                        <img
                            src="https://vp.vapehan.com/api/images/product/rpm-80-rgc-empty-cartridge-1pcs-.jpg" />
                        <div class="content">
                            <p class="title mb-0">AAA JARVIS PRO POD CARTRIDGE</p>
                            <p class="description mb-0">Rp. 24,000</p>

                        </div>
                    </a>
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
        $(document).ready(function() {
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.slider-kategori').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
        });
    </script>

@endsection
