<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.jabatan.index', [
            'title' => 'Kelola Jabatan',
            'jabatans'  => Jabatan::with('akun')->get()
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
    public function store(StoreJabatanRequest $request)
    {
        //
        Jabatan::create([
            'nama_jabatan'  => $request->nama_jabatan
        ]);
        notify()->success('Jabatan berhasil ditambakan!');
        return redirect()->to('/jabatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan, string $id)
    {
        //
        $cek = Jabatan::findOrFail($id);
        return view('admin.jabatan.edit', [
            'title' => 'Edit Jabatan',
            'jabatan'   =>  $cek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan, string $id)
    {
        //
        $cek = Jabatan::findOrFail($id);
        $cek->update([
            'nama_jabatan' =>   $request->nama_jabatan
        ]);
        notify()->success('Jabatan berhasil diedit!');
        return redirect()->to('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan, Request $request)
    {
        //
        $cek = Jabatan::findOrFail($request->id);
        $cek->delete();
        notify()->success('Jabatan berhasil dihapus!');
        return redirect()->to('/jabatan');
    }
}
