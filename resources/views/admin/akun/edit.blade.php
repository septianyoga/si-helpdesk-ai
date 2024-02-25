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
                    <div class="mb-3
                                    row">
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
                        <label class="col-3 col-form-label required">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Masukan Password" name="password">
                            <small class="form-hint">
                                Kosongkan jika password tidak diganti.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
