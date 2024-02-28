<?php

namespace App\Http\Controllers;

use App\Models\DampakPermasalahan;
use App\Http\Requests\StoreDampakPermasalahanRequest;
use App\Http\Requests\UpdateDampakPermasalahanRequest;
use Illuminate\Http\Request;

class DampakPermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.dampak_permasalahan.index', [
            'title' => 'Kelola Dampak Permasalahan',
            'dampak_permasalahans'  => DampakPermasalahan::all()
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
    public function store(StoreDampakPermasalahanRequest $request)
    {
        //
        DampakPermasalahan::create([
            'nama_dampak'  => $request->nama_dampak,
            'prioritas'     => $request->prioritas
        ]);
        notify()->success('Dampak Permasalahan berhasil ditambakan!');
        return redirect()->to('/dampak_permasalahan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DampakPermasalahan $dampakPermasalahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DampakPermasalahan $dampakPermasalahan, string $id)
    {
        //
        $cek = DampakPermasalahan::findOrFail($id);
        return view('admin.dampak_permasalahan.edit', [
            'title' => 'Edit Dampak Permasalahan',
            'dampak_permasalahan'   =>  $cek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDampakPermasalahanRequest $request, DampakPermasalahan $dampakPermasalahan, string $id)
    {
        //
        $cek = DampakPermasalahan::findOrFail($id);
        $cek->update([
            'nama_dampak' =>   $request->nama_dampak,
            'prioritas'     => $request->prioritas
        ]);
        notify()->success('Dampak Permasalahan berhasil diedit!');
        return redirect()->to('/dampak_permasalahan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DampakPermasalahan $dampakPermasalahan, Request $request)
    {
        //
        $cek = DampakPermasalahan::findOrFail($request->id);
        $cek->delete();
        notify()->success('Dampak Permasalahan berhasil dihapus!');
        return redirect()->to('/dampak_permasalahan');
    }
}
