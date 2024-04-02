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
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NIP</th>
                                    <th>No WhatsApp</th>
                                    <th>Role</th>
                                    <th>Tim</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
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
                                        <td>{{ $akun->tim != null ? $akun->tim->nama_tim : '' }}</td>
                                        <td>{{ $akun->jabatan != null ? $akun->jabatan->nama_jabatan : '' }}</td>
                                        <td>{{ $akun->divisi != null ? $akun->divisi->nama_divisi : '' }}</td>
                                        <td>{{ $akun->is_active ? 'Aktif' : 'Non Aktif' }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-icon btn-success" title="Alihkan Tiket"
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
