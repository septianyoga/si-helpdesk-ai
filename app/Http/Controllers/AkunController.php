<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $akun = Akun::all();
        return view('admin.akun.index', [
            'title' => 'Kelola Akun',
            'akuns'  => $akun
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
    public function store(StoreAkunRequest $request)
    {
        //
        // dd($request);
        Akun::create([
            'nama_akun' => $request->nama_akun,
            'email' => $request->email,
            'nip'   => $request->nip,
            'no_whatsapp'   => $request->no_whatsapp,
            'role'   => $request->role,
            'password'   => Hash::make($request->password),
        ]);
        notify()->success('Akun berhasil ditambakan!');
        return redirect()->to('/akun');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun, string $id)
    {
        //
        $akun = $akun->findOrFail($id);
        return view('admin.akun.edit', [
            'title' => 'Edit Akun',
            'akun'  => $akun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAkunRequest $request, Akun $akun, string $id)
    {
        //
        $data = [
            'id'    => $id,
            'nama_akun' => $request->nama_akun,
            'email' => $request->email,
            'nip' => $request->nip,
            'no_whatsapp' => $request->no_whatsapp,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ];
        if ($request->password == null) {
            unset($data['password']);
        }
        $akun = $akun->findOrFail($id);
        $akun->update($data);
        notify()->success('Akun Berhasil Di Edit');
        return redirect()->to('/akun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akun $akun)
    {
        //
        $cek = $akun->find(Request()->id);
        $cek->is_active = $cek->is_active == 1 ? 0 : 1;
        $status = $cek->is_active == 0 ? 'Nonaktifan' : 'Aktifkan';
        $cek->save();
        notify()->success('Akun Berhasil Di ' . $status);
        return redirect()->to('/akun');
    }
}
