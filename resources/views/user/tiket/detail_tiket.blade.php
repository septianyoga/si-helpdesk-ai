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
                            @foreach ($tiket->respon as $key => $respons)
                                {{-- card agent --}}
                                @if ($key == 0)
                                    <div class="my-0 d-flex">
                                        <span class="avatar avatar-lg me-2"
                                            style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>

                                        <div class="card w-100">
                                            <div class="card-header bg-cyan-lt py-2 border d-flex align-items-center ">
                                                <h3 class="card-title fw-bold ">{{ $tiket->akun->nama_akun }} </h3>
                                                <p class="my-0 ms-3">{{ $key == 0 ? 'dibuat' : 'dibalas' }} pada
                                                    {{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="card-body ">
                                                {!! $respons->pesan !!}
                                            </div>
                                            @if (count($respons->lampiran) > 0)
                                                <div class="card-footer d-flex ">
                                                    @foreach ($respons->lampiran as $file)
                                                        <div class="d-flex">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-paperclip">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
                                                            </svg>
                                                            <a class="mx-1"
                                                                href="/download/{{ $file->nama_lampiran }}">{{ $file->nama_lampiran }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="step"> --}}
                                    <div class="my-0" style="margin-left: 5rem">
                                        <div class="d-flex ms-2" style="height: 30px; padding-left: 1.5px;">
                                            <div class="vr"></div>
                                        </div>
                                        <span class="d-flex ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-plus border border-secondary-subtle rounded-3 text-secondary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                <path d="M13.5 6.5l4 4" />
                                                <path d="M16 19h6" />
                                                <path d="M19 16v6" />
                                            </svg>
                                            <span>
                                                Dibuat oleh
                                                <span class="avatar avatar-xs me-2"
                                                    style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>
                                                {{ $tiket->akun->nama_akun }}
                                                {{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}
                                            </span>
                                        </span>
                                    </div>
                                    {{-- </div> --}}
                                @elseif($respons->tipe != 'Chat')
                                    @if ($respons->tipe != 'Assigned')
                                        <div class="my-0" style="margin-left: 5rem">
                                            <div class="d-flex ms-2" style="height: 30px; padding-left: 1.5px;">
                                                <div class="vr"></div>
                                            </div>
                                            <span class="d-flex ">
                                                @if ($respons->tipe == 'Closed')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-thumb-up border border-secondary-subtle rounded-3 text-secondary">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" />
                                                    </svg>
                                                @elseif($respons->tipe == 'Reopened')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-reload border border-secondary-subtle rounded-3 text-secondary">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747" />
                                                        <path d="M20 4v5h-5" />
                                                    </svg>
                                                @elseif($respons->tipe == 'Updated')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-minus border border-secondary-subtle rounded-3 text-secondary">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                        <path d="M13.5 6.5l4 4" />
                                                        <path d="M16 19h6" />
                                                    </svg>
                                                @elseif($respons->tipe == 'Assigned')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-hand-move border border-secondary-subtle rounded-3 text-secondary">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                                                        <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" />
                                                        <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                                                        <path
                                                            d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                                                        <path d="M2.541 5.594a13.487 13.487 0 0 1 2.46 -1.427" />
                                                        <path d="M14 3.458c1.32 .354 2.558 .902 3.685 1.612" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-clock border border-secondary-subtle rounded-3 text-secondary">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                        <path d="M12 7v5l3 3" />
                                                    </svg>
                                                @endif
                                                <span class="mx-1">
                                                    {{ $respons->tipe }} by
                                                    <span class="avatar avatar-xs mx-1"
                                                        style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>
                                                    {{ $respons->action_by ? $respons->agent->nama_akun : $tiket->akun->nama_akun }}
                                                    dengan status {{ $respons->pesan }}
                                                    {{ date('d/m/Y H:i:s', strtotime($respons->created_at)) }}
                                                </span>
                                            </span>
                                        </div>
                                    @endif
                                @elseif ($respons->action_by)
                                    <div class="my-0" style="margin-left: 5rem">
                                        <div class="d-flex ms-2" style="height: 30px; padding-left: 1.5px;">
                                            <div class="vr"></div>
                                        </div>
                                    </div>
                                    <div class=" d-flex">
                                        <div class="card w-100">
                                            <div class="card-header bg-azure-lt py-2 border d-flex align-items-center ">
                                                <h3 class="card-title fw-bold ">{{ $tiket->penjawab->nama_akun }}
                                                </h3>
                                                <p class="my-0 ms-3">dibalas pada
                                                    {{ date('d/m/Y H:i:s', strtotime($respons->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="card-body ">
                                                {!! $respons->pesan !!}
                                            </div>
                                            @if (count($respons->lampiran) > 0)
                                                <div class="card-footer d-flex ">
                                                    @foreach ($respons->lampiran as $file)
                                                        <div class="d-flex">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-paperclip">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
                                                            </svg>
                                                            <a class="mx-1"
                                                                href="/download/{{ $file->nama_lampiran }}">{{ $file->nama_lampiran }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        <span class="avatar avatar-lg ms-2"
                                            style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>

                                    </div>
                                @else
                                    {{-- card user --}}
                                    <div class="my-0" style="margin-left: 5rem">
                                        <div class="d-flex ms-2" style="height: 30px; padding-left: 1.5px;">
                                            <div class="vr"></div>
                                        </div>
                                    </div>
                                    <div class=" d-flex">
                                        <span class="avatar avatar-lg me-2"
                                            style="background-image: url({{ asset('/assets/img/avatar.png') }})"></span>

                                        <div class="card w-100">
                                            <div class="card-header bg-cyan-lt py-2 border d-flex align-items-center ">
                                                <h3 class="card-title fw-bold ">{{ $tiket->akun->nama_akun }} </h3>
                                                <p class="my-0 ms-3">{{ $key == 0 ? 'dibuat' : 'dibalas' }} pada
                                                    {{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="card-body ">
                                                {!! $respons->pesan !!}
                                            </div>
                                            @if (count($respons->lampiran) > 0)
                                                <div class="card-footer d-flex ">
                                                    @foreach ($respons->lampiran as $file)
                                                        <div class="d-flex">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-paperclip">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
                                                            </svg>
                                                            <a class="mx-1"
                                                                href="/download/{{ $file->nama_lampiran }}">{{ $file->nama_lampiran }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-body">
                            <form method="post" class="row" action="/balas_tiket/{{ $tiket->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">Balas Tiket</label>
                                    <textarea name="pesan" class="@error('pesan') is-invalid @enderror" id="summernote" cols="30"
                                        rows="10"></textarea>
                                    @error('pesan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-12 mb-3">
                                    <label class="form-label">Lampiran <small>*Dapat lebih dari satu</small></label>
                                    <input type="file" name="lampiran[]"
                                        class="form-control @error('lampiran') is-invalid @enderror"
                                        accept=".jpeg,.jpg,.png,.gif,.pdf,.xlsx,.xls,.docx,.doc,.mp4" multiple />
                                    <small>Maks. 3MB.</small>
                                    @error('lampiran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                        @if ($tiket->status != 'Open')
                                            <div class="alert alert-warning" role="alert">
                                                <div class="d-flex">
                                                    <div>
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                            <path d="M12 9v4" />
                                                            <path d="M12 17h.01" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        Tiket akan dibuka kembali jika anda membalas respon lagi.
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        @if ($tiket->status == 'Open')
                                            <a href="/tiket_user/closed/{{ $tiket->id }}"
                                                class="btn btn-warning">Tutup Tiket</a>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Balas</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
