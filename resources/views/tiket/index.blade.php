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
                                        <td>
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
                <form action="/divisi" method="POST">
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
                                    <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">Ya</button>
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
    {{-- <div class="modal modal-blur fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/akun" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label required">Nama Tiket</label>
                                    <input type="text" class="form-control @error('nama_akun') is-invalid @enderror"
                                        name="nama_akun" placeholder="Masukan Nama Tiket" value="{{ old('nama_akun') }}">
                                    @error('nama_akun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Masukan Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">NIP</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                        name="nip" placeholder="Masukan NIP" value="{{ old('nip') }}">
                                    @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No WhatsApp</label>
                                    <input type="number" class="form-control @error('no_whatsapp') is-invalid @enderror"
                                        name="no_whatsapp" placeholder="Masukan No WhatsApp"
                                        value="{{ old('no_whatsapp') }}">
                                    @error('no_whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Role</label>
                                    <select type="text" class="form-select @error('role') is-invalid @enderror"
                                        id="select-users" name="role">
                                        <option value="" hidden>-- Pilih --</option>
                                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="Agent" {{ old('role') == 'Agent' ? 'selected' : '' }}>Agent
                                        </option>
                                        <option value="General Manager"
                                            {{ old('role') == 'General Manager' ? 'selected' : '' }}>General Manager
                                        </option>
                                        <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label required">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Masukan Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label ">Tim</label>
                                    <select type="text" class="form-select @error('tim_id') is-invalid @enderror"
                                        id="select-users" name="tim_id">
                                        <option value="" hidden>-- Pilih Tim --</option>
                                        @foreach ($tims as $tim)
                                            <option value="{{ $tim->id }}"
                                                {{ old('tim_id') == $tim->id ? 'selected' : '' }}>{{ $tim->nama_tim }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label ">Jabatan</label>
                                    <select type="text" class="form-select @error('jabatan_id') is-invalid @enderror"
                                        id="select-users" name="jabatan_id">
                                        <option value="" hidden>-- Pilih Jabatan --</option>
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}"
                                                {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                                {{ $jabatan->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label ">Divisi</label>
                                    <select type="text" class="form-select @error('divisi_id') is-invalid @enderror"
                                        id="select-users" name="divisi_id">
                                        <option value="" hidden>-- Pilih Divisi --</option>
                                        @foreach ($divisis as $divisi)
                                            <option value="{{ $divisi->id }}"
                                                {{ old('divisi_id') == $divisi->id ? 'selected' : '' }}>
                                                {{ $divisi->nama_divisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
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
    </div> --}}

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
