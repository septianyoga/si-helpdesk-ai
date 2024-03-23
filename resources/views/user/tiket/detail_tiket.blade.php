@extends('layouts_front.main')
@section('content_front')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title mb-2">
                        {{ $title }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $tiket->ringkasan_masalah }} #{{ $tiket->id }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <b>Informasi Tiket</b>
                                    <table class="table">
                                        <tr>
                                            <td>Status Tiket</td>
                                            <td>:</td>
                                            <td>{{ $tiket->status }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dibuat Tanggal</td>
                                            <td>:</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <b>Informasi Pengguna</b>
                                    <table class="table">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $tiket->akun->nama_akun }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dibuat Tanggal</td>
                                            <td>:</td>
                                            <td>{{ $tiket->akun->email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <b>Detail Tiket</b>
                                    <table class="table">
                                        <tr>
                                            <td class="w-25">Jabatan</td>
                                            <td class="w-5">:</td>
                                            <td>{{ $tiket->akun->jabatan->nama_jabatan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25">Dampak</td>
                                            <td class="w-5">:</td>
                                            <td>{{ $tiket->dampak_permasalahan->nama_dampak }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25">Tipe Permasalahan</td>
                                            <td class="w-5">:</td>
                                            <td>{{ $tiket->tipe }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <b>Respon</b>
                            <div class="my-2 d-flex ">
                                <span class="avatar avatar-lg me-2"
                                    style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>

                                <div class="card w-100">
                                    <div class="card-header bg-primary-subtle py-2 border d-flex align-items-center ">
                                        <h3 class="card-title fw-bold ">{{ $tiket->akun->nama_akun }} </h3>
                                        <p class="my-0 ms-3">dibuat pada
                                            {{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}
                                        </p>
                                    </div>
                                    <div class="card-body ">
                                        {!! $tiket->respon[0]->pesan !!}
                                    </div>
                                    <div class="card-footer">
                                        @foreach ($tiket->respon[0]->lampiran as $file)
                                            <a class="mx-1"
                                                href="/download/{{ $file->nama_lampiran }}">{{ $file->nama_lampiran }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
