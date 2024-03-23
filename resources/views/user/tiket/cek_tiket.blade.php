@extends('layouts_front.main')
@section('content_front')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title mb-2">
                        {{ $title }}
                    </h2>
                    <p class="my-0">
                        Silakan masukan alamat email Anda dan nomor tiket untuk masuk dan melihat tiket Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="row" action="/cek_tiket" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label class="form-label required">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Contoh : tiket@gmail.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label required">Nomor Tiket</label>
                                    <input type="text" class="form-control @error('tiket_id') is-invalid @enderror"
                                        name="tiket_id" placeholder="Contoh : 123123" value="{{ old('tiket_id') }}">
                                    @error('tiket_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Cek Tiket</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12 d-flex flex-column justify-content-between ">
                    <div class="card">
                        <div class="card-status-start bg-primary"></div>
                        <div class="card-body">
                            <h3 class="card-title">Sudah mempunyai akun ?</h3>
                            <p class="text-secondary">Silahkan <a href="/login">Login</a> atau <a
                                    href="/registrasi">Registrasi</a> untuk melihat semua tiket anda.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-status-start bg-success"></div>
                        <div class="card-body">
                            <h3 class="card-title">Belum mempunyai tiket ?</h3>
                            <p class="text-secondary">Silahkan <a href="/buat_tiket">Buat Tiket</a> anda terlebih dahulu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
