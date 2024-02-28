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
                    <button type="button" class="btn btn-primary" id="tambah" data-bs-toggle="modal"
                        data-bs-target="#modal-tambah">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Knowledgebase
                    </button>
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
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Isi Knowledgebase</th>
                                    {{-- <th>Akun</th> --}}
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($knowledgebases as $kb)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $kb->isi_kb }}</td>
                                        {{-- <td>
                                            @foreach ($kb->akun as $user)
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto"><span class="badge bg-green"></span></div>
                                                        <div class="col text-truncate">
                                                            <a href="#"
                                                                class="text-reset d-block">{{ $user->nama_akun }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td> --}}
                                        <td class="text-center">
                                            <a href="#"
                                                onclick="handleDelete('{{ $kb->id }}', '{{ $kb->isi_kb }}')"
                                                class="btn btn-danger btn-icon" data-bs-toggle="modal"
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
                                            <a href="/kb/{{ $kb->id }}" class="btn btn-info btn-icon" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
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
                    <div class="text-secondary">Apakah anda yakin ingin menghapus knowledgebase berisi <span
                            class="fw-bolder" id="nama"></span>
                        ?
                    </div>
                </div>
                <form action="/kb" method="POST">
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
    {{-- modal tambah --}}
    <div class="modal modal-blur fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Knowledgebase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/kb" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label required">Isi Knowledgebase</label>
                                    <textarea class="form-control @error('isi_kb') is-invalid @enderror" name="isi_kb" rows="6"
                                        placeholder="Masukan Isi Knowledgebase" value="{{ old('isi_kb') }}"></textarea>
                                    @error('isi_kb')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    </script>
@endsection
