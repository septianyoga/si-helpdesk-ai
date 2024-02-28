<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.divisi.index', [
            'title' => 'Kelola Divisi',
            'divisis'  => Divisi::with('akun')->get()
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
    public function store(StoreDivisiRequest $request)
    {
        //
        Divisi::create([
            'nama_divisi'  => $request->nama_divisi
        ]);
        notify()->success('Divisi berhasil ditambakan!');
        return redirect()->to('/divisi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi, string $id)
    {
        //
        $cek = Divisi::findOrFail($id);
        return view('admin.divisi.edit', [
            'title' => 'Edit Divisi',
            'divisi'   =>  $cek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDivisiRequest $request, Divisi $divisi, string $id)
    {
        //
        $cek = Divisi::findOrFail($id);
        $cek->update([
            'nama_divisi' =>   $request->nama_divisi
        ]);
        notify()->success('Divisi berhasil diedit!');
        return redirect()->to('/divisi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi, Request $request)
    {
        //
        $cek = Divisi::findOrFail($request->id);
        $cek->delete();
        notify()->success('Divisi berhasil dihapus!');
        return redirect()->to('/divisi');
    }
}
