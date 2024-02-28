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
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form class="card" action="/akun/{{ $akun->id }}" method="POST">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama Akun</label>
                        <div class="col">
                            <input type="text" class="form-control @error('nama_akun') is-invalid @enderror"
                                placeholder="Masukan Nama" value="{{ $akun->nama_akun }}" name="nama_akun">
                            @error('nama_akun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Email</label>
                        <div class="col">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                aria-describedby="emailHelp" placeholder="Masukan Email" value="{{ $akun->email }}"
                                name="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3
                                row">
                        <label class="col-3 col-form-label required">NIP</label>
                        <div class="col">
                            <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                placeholder="Masukan NIP" value="{{ $akun->nip }}" name="nip">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3
                                row">
                        <label class="col-3 col-form-label required">No WhatsApp</label>
                        <div class="col">
                            <input type="number" class="form-control @error('no_whatsapp') is-invalid @enderror"
                                placeholder="Masukan No WhatsApp" value="{{ $akun->no_whatsapp }}" name="no_whatsapp">
                            @error('no_whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Role</label>
                        <div class="col">
                            <select type="text" class="form-select @error('role') is-invalid @enderror" id="select-users"
                                name="role">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="Admin" {{ $akun->role == 'Admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="Agent" {{ $akun->role == 'Agent' ? 'selected' : '' }}>Agent
                                </option>
                                <option value="General Manager" {{ $akun->role == 'General Manager' ? 'selected' : '' }}>
                                    General Manager
                                </option>
                                <option value="User" {{ $akun->role == 'User' ? 'selected' : '' }}>User
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Masukan Password" name="password">
                            <small class="form-hint">
                                Kosongkan jika password tidak diganti.
                            </small>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Tim</label>
                        <div class="col">
                            <select type="text" class="form-select @error('tim_id') is-invalid @enderror"
                                id="select-users" name="tim_id">
                                <option value="" hidden>-- Pilih Tim --</option>
                                @foreach ($tims as $tim)
                                    <option value="{{ $tim->id }}" {{ $akun->tim_id == $tim->id ? 'selected' : '' }}>
                                        {{ $tim->nama_tim }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Jabatan</label>
                        <div class="col">
                            <select type="text" class="form-select @error('jabatan_id') is-invalid @enderror"
                                id="select-users" name="jabatan_id">
                                <option value="" hidden>-- Pilih Jabatan --</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}"
                                        {{ $akun->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                        {{ $jabatan->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Divisi</label>
                        <div class="col">
                            <select type="text" class="form-select @error('divisi_id') is-invalid @enderror"
                                id="select-users" name="divisi_id">
                                <option value="" hidden>-- Pilih Divisi --</option>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}"
                                        {{ $akun->divisi_id == $divisi->id ? 'selected' : '' }}>
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
                <div class="card-footer d-flex justify-content-between">
                    <a href="/akun" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
