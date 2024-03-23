<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrasiRequest;
use App\Models\Akun;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.registrasi', [
            'title' => 'Registrasi',
            'jabatans' => Jabatan::all(),
            'divisis'   => Divisi::all()
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
    public function store(StoreRegistrasiRequest $request)
    {
        //
        Akun::create([
            'nama_akun' => $request->nama_akun,
            'email' => $request->email,
            'nip'   => $request->nip,
            'no_whatsapp'   => $request->no_whatsapp,
            'role'   => 'User',
            'password'   => Hash::make($request->password),
            'jabatan_id'   => $request->jabatan_id,
            'divisi_id'   => $request->divisi_id,
        ]);
        notify()->success('Registrasi berhasil. Silahkan login!');
        return redirect()->to('/login');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
