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
            <form class="card" action="/kategori_masalah/{{ $kategori_masalah->id }}" method="POST">
                @csrf
                @method('patch')
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama Kategori Permasalahan</label>
                        <div class="col">
                            <input type="text" class="form-control @error('nama_topik') is-invalid @enderror"
                                placeholder="Masukan Nama" value="{{ $kategori_masalah->nama_topik }}" name="nama_topik">
                            @error('nama_topik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama Tim</label>
                        <div class="col">
                            <select type="text" class="form-select @error('tim_id') is-invalid @enderror"
                                id="select-users" name="tim_id">
                                <option value="" hidden>-- Pilih Tim --</option>
                                @foreach ($tims as $tim)
                                    <option value="{{ $tim->id }}"
                                        {{ $kategori_masalah->tim_id == $tim->id ? 'selected' : '' }}>
                                        {{ $tim->nama_tim }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tim_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/kategori_masalah" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
