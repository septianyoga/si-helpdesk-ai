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
                        Tambah Akun
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NIP</th>
                                    <th>No WhatsApp</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($akuns as $akun)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $akun->nama_akun }}</td>
                                        <td>{{ $akun->email }}</td>
                                        <td>{{ $akun->nip }}</td>
                                        <td>{{ $akun->no_whatsapp }}</td>
                                        <td>{{ $akun->role }}</td>
                                        <td>{{ $akun->is_active ? 'Aktif' : 'Non Aktif' }}</td>
                                        <td>
                                            <a href="#"
                                                onclick="handleDelete('{{ $akun->id }}', '{{ $akun->nama_akun }}', '{{ $akun->is_active }}')"
                                                class="btn btn-{{ $akun->is_active == 1 ? 'danger' : 'success' }} btn-icon btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#modal-danger"
                                                title="{{ $akun->is_active == 1 ? 'Non' : '' }} Aktifkan">
                                                @if ($akun->is_active == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-check" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-ban" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                        <path d="M5.7 5.7l12.6 12.6" />
                                                    </svg>
                                                @endif
                                            </a>
                                            <a href="/akun/{{ $akun->id }}" class="btn btn-info btn-icon btn-sm">
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
                    <div class="text-secondary">Apakah anda yakin ingin <span id="is-active"></span> akun bernama <span
                            class="fw-bolder" id="nama"></span>
                        ?
                    </div>
                </div>
                <form action="/akun" method="POST">
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
                    <h5 class="modal-title">Add a new team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/akun" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Akun</label>
                                    <input type="text" class="form-control @error('nama_akun') is-invalid @enderror"
                                        name="nama_akun" placeholder="Masukan Nama Akun" value="{{ old('nama_akun') }}">
                                    @error('nama_akun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Masukan Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIP</label>
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
                                    <label class="form-label">Role</label>
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
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Masukan Password">
                                    @error('password')
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
        function handleDelete(id, nama, isActive) {
            var pasteNama = document.getElementById('nama');
            var pasteIsActive = document.getElementById('is-active');
            var idDelete = document.getElementById('id_delete');
            pasteNama.textContent = '';
            pasteNama.textContent += nama;
            idDelete.value = id;
            pasteIsActive.textContent = '';
            pasteIsActive.textContent += isActive == 1 ? 'menonaktifkan' : 'mengaktifkan'
        }
    </script>
@endsection
