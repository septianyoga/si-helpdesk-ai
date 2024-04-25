<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimRequest;
use App\Http\Requests\UpdateTimRequest;
use App\Models\Tim;
use Illuminate\Http\Request;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.tim.index', [
            'title' => 'Kelola Tim',
            'tims'  => Tim::with('akun_tim.akun')->get()
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
    public function store(StoreTimRequest $request)
    {
        //
        Tim::create([
            'nama_tim'  => $request->nama_tim
        ]);
        notify()->success('Tim berhasil ditambakan!');
        return redirect()->to('/tim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cek = Tim::findOrFail($id);
        return view('admin.tim.edit', [
            'title' => 'Edit Tim',
            'tim'   =>  $cek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimRequest $request, string $id)
    {
        //
        $cek = Tim::findOrFail($id);
        $cek->update([
            'nama_tim' =>   $request->nama_tim
        ]);
        notify()->success('Tim berhasil diedit!');
        return redirect()->to('/tim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $cek = Tim::findOrFail($request->id);
        $cek->delete();
        notify()->success('Tim berhasil dihapus!');
        return redirect()->to('/tim');
    }
}
