@extends('layouts_front.main')
@section('content_front')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-6 align-items-center d-flex">
                    <div>
                        <h1 data-aos="fade-up" class="title text-blue"
                            style="font-size:5vh; line-height: 5vh; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                            Selamat
                            Datang Di Support Center
                            Helpdesk IT WIKA</h1>
                        <span data-aos="fade-up" data-aos-delay="400" class="d-block">Silahkan tanyakan pertanyaan anda kepada
                            AI Helpdesk
                            sebelum melakukan
                            pembuatan
                            tiket.</span>
                        <a data-aos="fade-up" data-aos-delay="600" href="/tanya_ai"
                            class="btn btn-ghost-blue active mt-3">Let's Talk With
                            AI</a>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/img/icon.png') }}" class="w-75" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
