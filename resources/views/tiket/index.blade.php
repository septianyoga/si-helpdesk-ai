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
    {{-- modal hapus --}}
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4 ">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <div class="d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                            <path d="M12 9v4" />
                            <path d="M12 17h.01" />
                        </svg>
                    </div>
                    <h3>Apakah kamu yakin?</h3>
                    <div class="text-secondary">Apakah anda yakin ingin menghapus tiket <span class="fw-bolder"
                            id="nama"></span>
                        ?
                    </div>
                </div>
                <form action="/tiket" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" id="id_delete">
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Batal
                                    </a></div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger w-100"
                                        data-bs-dismiss="modal">Ya</button>
                                    {{-- <a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                        Hapus
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal alih --}}
    <div class="modal modal-blur fade" id="modal-alih" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-azure"></div>
                <div class="modal-body text-center py-4 ">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <div class="d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-share-3 mb-2 text-azure icon-lg">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M13 4v4c-6.575 1.028 -9.02 6.788 -10 12c-.037 .206 5.384 -5.962 10 -6v4l8 -7l-8 -7z" />
                        </svg>
                    </div>
                    <h3>Mengalihkan Tiket</h3>
                    <div class="text-secondary">Pilih Agent untuk Alihkan Tiket #<span class="fw-bolder"
                            id="tiket"></span>
                        !
                    </div>
                </div>
                <form action="/tiket/alih" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="tiket_id">
                    <div class="modal-footer">
                        <div class="w-100">
                            <select type="text" name="agent_id" class="form-select mb-3" placeholder="Pilih Agent"
                                id="select-tags" value="">
                                <option value="" hidden>Pilih Agent</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->nama_akun }}</option>
                                @endforeach
                            </select>
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Batal
                                    </a></div>
                                <div class="col">
                                    <button type="submit" class="btn btn-azure w-100"
                                        data-bs-dismiss="modal">Ya</button>
                                    {{-- <a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                        Hapus
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal tambah --}}

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var tombol = document.getElementById("tambah");
                tombol.click();
            });
        </script>
    @endif

    <script>
        function handleDelete(id, nama) {
            var pasteNama = document.getElementById('nama');
            var idDelete = document.getElementById('id_delete');
            pasteNama.textContent = '';
            pasteNama.textContent += nama;
            idDelete.value = id;
        }

        function handleAlih(id) {
            var pasteNama = document.getElementById('tiket');
            var idDelete = document.getElementById('tiket_id');
            pasteNama.textContent = '';
            pasteNama.textContent += id;
            idDelete.value = id;

        }
    </script>
@endsection
