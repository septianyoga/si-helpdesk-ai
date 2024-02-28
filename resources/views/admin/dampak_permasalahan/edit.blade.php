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
            <form class="card" action="/dampak_permasalahan/{{ $dampak_permasalahan->id }}" method="POST">
                @csrf
                @method('patch')
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama Dampak Permasalahan</label>
                        <div class="col">
                            <input type="text" class="form-control @error('nama_dampak') is-invalid @enderror"
                                placeholder="Masukan Nama" value="{{ $dampak_permasalahan->nama_dampak }}"
                                name="nama_dampak">
                            @error('nama_dampak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Prioritas</label>
                        <div class="col">
                            <select type="text" class="form-select @error('prioritas') is-invalid @enderror"
                                id="select-users" name="prioritas">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="Rendah" {{ $dampak_permasalahan->prioritas == 'Rendah' ? 'selected' : '' }}>
                                    Rendah
                                </option>
                                <option value="Sedang" {{ $dampak_permasalahan->prioritas == 'Sedang' ? 'selected' : '' }}>
                                    Sedang
                                </option>
                                <option value="Tinggi" {{ $dampak_permasalahan->prioritas == 'Tinggi' ? 'selected' : '' }}>
                                    Tinggi
                                </option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/dampak_permasalahan" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
