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
                                            @if (!$tiket->penjawab_id)
                                                <button onclick="handleAlih({{ $tiket->id }})"
                                                    class="btn btn-sm btn-icon btn-azure" title="Alihkan Tiket"
                                                    data-bs-toggle="modal" data-bs-target="#modal-alih">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-share-3">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M13 4v4c-6.575 1.028 -9.02 6.788 -10 12c-.037 .206 5.384 -5.962 10 -6v4l8 -7l-8 -7z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <a href="#"
                                                onclick="handleDelete('{{ $tiket->id }}', '{{ $tiket->id }}')"
                                                class="btn btn-danger btn-icon btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-danger" title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash-x" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7h16" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                                </svg>
                                            </a>
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
