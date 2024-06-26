@extends('layouts_front.main')
@section('content_front')
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
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row" action="/buat_tiket" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label required">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukan Email" value="{{ $user?->email }}" {{ $user ? 'readonly' : '' }}>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label required">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                placeholder="Masukan NIP / NIK" value="{{ $user?->nip }}" {{ $user ? 'readonly' : '' }}>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label required">Kategori Permasalahan</label>
                            <select name="kategori_permasalahan_id" id="kategori_permasalahan_id"
                                class="form-select @error('kategori_permasalahan_id') is-invalid @enderror">
                                <option value="" hidden>--Pilih--</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_topik }}</option>
                                @endforeach
                            </select>
                            @error('kategori_permasalahan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label required">Dampak Permasalahan</label>
                            <select name="dampak_permasalahan_id" id="dampak_permasalahan_id"
                                class="form-select @error('dampak_permasalahan_id') is-invalid @enderror">
                                <option value="" hidden>--Pilih--</option>
                                @foreach ($dampaks as $dampak)
                                    <option value="{{ $dampak->id }}">{{ $dampak->nama_dampak }}</option>
                                @endforeach
                            </select>
                            @error('dampak_permasalahan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label required">Ringkasan Masalah</label>
                            <input type="text" class="form-control @error('ringkasan_masalah') is-invalid @enderror"
                                name="ringkasan_masalah" placeholder="Masukan Ringkasan Masalah">
                            @error('ringkasan_masalah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label required">Tipe Tiket</label>
                            <select name="tipe" id="tipe" class="form-select @error('tipe') is-invalid @enderror">
                                <option value="" hidden>--Pilih--</option>
                                <option value="Insiden">Insiden</option>
                                <option value="Permintaan Layanan">Permintaan Layanan</option>
                            </select>
                            @error('tipe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Deskripsi Masalah</label>
                            <textarea name="pesan" class="@error('pesan') is-invalid @enderror" id="summernote" cols="30" rows="10"></textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label">Lampiran <small>*Dapat lebih dari satu</small></label>
                            <input type="file" name="lampiran[]"
                                class="form-control @error('lampiran') is-invalid @enderror" multiple />
                            @error('lampiran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small>Maks. 3MB.</small><br>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
