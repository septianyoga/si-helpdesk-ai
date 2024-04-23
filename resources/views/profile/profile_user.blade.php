@extends('layouts_front.main')
@section('content_front')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <form action="/profile" method="POST">
                    @csrf
                    <div class="row g-0">
                        <div class="col-12 col-md-12 d-flex flex-column">
                            <div class="card-body">
                                <h2 class="mb-4">My Profile</h2>
                                <h3 class="card-title">Profile Details</h3>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <div class="form-label">Nama</div>
                                        <input type="text" name="nama_akun"
                                            class="form-control @error('nama_akun') is-invalid @enderror"
                                            value="{{ $user->nama_akun }}">
                                        @error('nama_akun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-label">Email</div>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-label">NIP</div>
                                        <input type="text" name="nip"
                                            class="form-control @error('nip') is-invalid @enderror"
                                            value="{{ $user->nip }}">
                                        @error('nip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-label">No WhatsApp</div>
                                        <input type="text" name="no_whatsapp"
                                            class="form-control @error('no_whatsapp') is-invalid @enderror"
                                            value="{{ $user->no_whatsapp }}">
                                        @error('no_whatsapp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-label">Jabatan</div>
                                        <select name="jabatan" id="jabatan"
                                            class="form-select @error('jabatan') is-invalid @enderror">
                                            @foreach ($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}"
                                                    {{ $jabatan->id == $user->jabatan_id ? 'selected' : '' }}>
                                                    {{ $jabatan->nama_jabatan }}</option>
                                            @endforeach
                                        </select>
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-label">Divisi</div>
                                        <select name="divisi" id="divisi"
                                            class="form-select @error('divisi') is-invalid @enderror">
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}"
                                                    {{ $divisi->id == $user->divisi_id ? 'selected' : '' }}>
                                                    {{ $divisi->nama_divisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('divisi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Password</h3>
                                <p class="card-subtitle">Kosongkan password jika tidak diganti.
                                </p>
                                <div>
                                    <div class="row g-2">
                                        <div class="col-lg-3">
                                            <div class="input-group input-group-flat">
                                                <input type="password" id="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    placeholder="Your password" autocomplete="off" name="password">
                                                <span class="input-group-text">
                                                    <a href="#" onclick="showPW()" class="link-secondary"
                                                        title="Show password"
                                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>
                                                </span>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var passwordField = document.querySelector("#password")

        function showPW() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
@endsection
