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
                                            <a href="#"
                                                onclick="handleDelete('{{ $akun->id }}', '{{ $akun->nama_akun }}', '{{ $akun->is_active }}')"
                                                class="btn btn-{{ $akun->is_active == 1 ? 'danger' : 'success' }} btn-icon btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#modal-danger"
                                                title="{{ $akun->is_active == 1 ? 'Non Aktifkan' : 'Aktifkan' }}">
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
                                            <a href="/akun/{{ $akun->id }}" class="btn btn-info btn-icon btn-sm"
                                                title="Edit">
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
@endsection
