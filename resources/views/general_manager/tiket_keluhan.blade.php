@extends('layouts.main')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
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
                                    <th>Dari</th>
                                    <th>Prioritas</th>
                                    <th>Penjawab</th>
                                    <th>Status</th>
                                    <th>Tim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($tikets as $tiket)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="/tiket/{{ $tiket->id }}">#{{ $tiket->id }}</a></td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}</td>
                                        <td><a href="/tiket/{{ $tiket->id }}">{{ $tiket->ringkasan_masalah }}</a></td>
                                        <td>{{ $tiket->akun->nama_akun }}</td>
                                        <td>
                                            <div class="badges-list">
                                                @if ($tiket->dampak_permasalahan->prioritas == 'Tinggi')
                                                    <span class="badge bg-red text-red-fg">
                                                        {{ $tiket->dampak_permasalahan->prioritas }}
                                                    </span>
                                                @elseif($tiket->dampak_permasalahan->prioritas == 'Sedang')
                                                    <span class="badge bg-yellow text-yellow-fg">
                                                        {{ $tiket->dampak_permasalahan->prioritas }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-green text-green-fg">
                                                        {{ $tiket->dampak_permasalahan->prioritas }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $tiket->penjawab?->nama_akun }}</td>
                                        <td>{{ $tiket->status }}</td>
                                        <td>{{ $tiket->kategori_permasalahan->tim->nama_tim }}</td>
                                        <td class="text-center">
                                            <button onclick="document.location.href='/cetak_tiket_keluhan'"
                                                class="btn btn-sm btn-icon btn-success" title="Cetak Tiket"
                                                data-bs-toggle="modal" data-bs-target="#modal-alih">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                    <path
                                                        d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
