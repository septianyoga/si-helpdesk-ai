@extends('layouts.main')
@section('content')
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
                            {{-- <ul class="steps steps-counter steps-vertical"> --}}
                            @foreach ($tiket->respon as $key => $respons)
                                {{-- card agent --}}
                                @if ($respons->action_by)
                                    <div class="my-2 d-flex ">
                                        <div class="card w-100">
                                            <div class="card-header bg-azure-lt py-2 border d-flex align-items-center ">
                                                <h3 class="card-title fw-bold ">{{ $tiket->penjawab->nama_akun }} </h3>
                                                <p class="my-0 ms-3">dibalas pada
                                                    {{ date('d/m/Y H:i:s', strtotime($respons->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="card-body ">
                                                {!! $respons->pesan !!}
                                            </div>
                                            <div class="card-footer">
                                                @foreach ($respons->lampiran as $file)
                                                    <a class="mx-1"
                                                        href="/download/{{ $file->nama_lampiran }}">{{ $file->nama_lampiran }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <span class="avatar avatar-lg ms-2"
                                            style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>

                                    </div>
                                @else
                                    {{-- card user --}}
                                    <div class="my-2 d-flex ">
                                        <span class="avatar avatar-lg me-2"
                                            style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>

                                        <div class="card w-100">
                                            <div class="card-header bg-cyan-lt py-2 border d-flex align-items-center ">
                                                <h3 class="card-title fw-bold ">{{ $tiket->akun->nama_akun }} </h3>
                                                <p class="my-0 ms-3">{{ $key == 0 ? 'dibuat' : 'dibalas' }}
                                                    {{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="card-body ">
                                                {!! $respons->pesan !!}
                                            </div>
                                            <div class="card-footer">
                                                @foreach ($respons->lampiran as $file)
                                                    <a class="mx-1"
                                                        href="/download/{{ $file->nama_lampiran }}">{{ $file->nama_lampiran }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- <li class="step-item">Step one</li> --}}
                            @endforeach
                            {{-- </ul> --}}
                        </div>
                        <div class="card-body">
                            <form method="post" class="row" action="/jawab_tiket/{{ $tiket->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3">
                                    <label class="form-label required">Jawab Tiket</label>
                                    <textarea name="pesan" class="@error('pesan') is-invalid @enderror" id="summernote" cols="30" rows="10"></textarea>
                                    @error('pesan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-12 mb-3">
                                    <label class="form-label">Lampiran</label>
                                    <input type="file" name="lampiran[]" class="form-control" multiple />
                                </div>
                                <div class="mb-3 d-flex justify-content-between ">
                                    <a href="/tiket" class="btn btn-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M11 7l-5 5l5 5" />
                                            <path d="M17 7l-5 5l5 5" />
                                        </svg>
                                        Kembali</a>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
