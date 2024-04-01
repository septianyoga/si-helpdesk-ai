@extends('layouts_front.main')
@section('content_front')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    {{-- <button type="button" class="btn btn-primary" id="tambah" data-bs-toggle="modal"
                        data-bs-target="#modal-tambah">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Tiket
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table id="example" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiket</th>
                                    <th>Dibuat Tanggal</th>
                                    <th>Subjek</th>
                                    <th>Penjawab</th>
                                    <th>Status</th>
                                    <th>Tim</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($tikets as $tiket)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="/tiket_user/detail?tiket={{ $tiket->id }}">#{{ $tiket->id }}</a>
                                        </td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}</td>
                                        <td><a
                                                href="/tiket_user/detail?tiket={{ $tiket->id }}">{{ $tiket->ringkasan_masalah }}</a>
                                        </td>
                                        <td>{{ $tiket->penjawab?->nama_akun }}</td>
                                        <td>{{ $tiket->status }}</td>
                                        <td>{{ $tiket->kategori_permasalahan->tim->nama_tim }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal hapus --}}
@endsection
