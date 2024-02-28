<?php

namespace App\Http\Controllers;

use App\Models\KategoriPermasalahan;
use App\Http\Requests\StoreKategoriPermasalahanRequest;
use App\Http\Requests\UpdateKategoriPermasalahanRequest;
use App\Models\Tim;
use Illuminate\Http\Request;

class KategoriPermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.kategori_masalah.index', [
            'title' => 'Kelola Kategori Permasalahan',
            'kategori_masalahs'  => KategoriPermasalahan::with('tim')->get(),
            'tims'  => Tim::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriPermasalahanRequest $request)
    {
        //
        KategoriPermasalahan::create([
            'nama_topik'  => $request->nama_topik,
            'tim_id'    => $request->tim_id
        ]);
        notify()->success('Kategori Permasalahan berhasil ditambakan!');
        return redirect()->to('/kategori_masalah');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriPermasalahan $kategoriPermasalahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriPermasalahan $kategoriPermasalahan, string $id)
    {
        //
        $cek = KategoriPermasalahan::findOrFail($id);
        return view('admin.kategori_masalah.edit', [
            'title' => 'Edit Kategori Permasalahan',
            'kategori_masalah'   =>  $cek,
            'tims'  => Tim::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriPermasalahanRequest $request, KategoriPermasalahan $kategoriPermasalahan, string $id)
    {
        //
        $cek = KategoriPermasalahan::findOrFail($id);
        $cek->update([
            'nama_topik'  => $request->nama_topik,
            'tim_id'    => $request->tim_id
        ]);
        notify()->success('Kategori Permasalahan berhasil diedit!');
        return redirect()->to('/kategori_masalah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriPermasalahan $kategoriPermasalahan, Request $request)
    {
        //
        $cek = KategoriPermasalahan::findOrFail($request->id);
        $cek->delete();
        notify()->success('Kategori Permasalahan berhasil dihapus!');
        return redirect()->to('/kategori_masalah');
    }
}
