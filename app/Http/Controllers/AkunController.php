<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\AkunTim;
use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Tim;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $akun = Akun::with(['akun_tim.tim', 'jabatan', 'divisi'])->get();
        $tim = Tim::all();
        $jabatan = Jabatan::all();
        $divisi = Divisi::all();
        return view('admin.akun.index', [
            'title' => 'Kelola Akun',
            'akuns'  => $akun,
            'tims'  => $tim,
            'jabatans'  => $jabatan,
            'divisis'  => $divisi,
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
        // dd($request->all());
        $akun = Akun::create([
            'nama_akun' => $request->nama_akun,
            'email' => $request->email,
            'nip'   => $request->nip,
            'no_whatsapp'   => $request->no_whatsapp,
            'role'   => $request->role,
            'password'   => Hash::make($request->password),
            'jabatan_id'   => $request->jabatan_id,
            'divisi_id'   => $request->divisi_id,
        ]);

        if ($request->tim_id) {
            foreach ($request->tim_id as $value) {
                AkunTim::create([
                    'akun_id'   => $akun->id,
                    'tim_id'    => $value
                ]);
            }
        }

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
        $akun = $akun->with('akun_tim')->findOrFail($id);
        $tim = Tim::all();
        $jabatan = Jabatan::all();
        $divisi = Divisi::all();
        return view('admin.akun.edit', [
            'title' => 'Edit Akun',
            'akun'  => $akun,
            'tims'  => $tim,
            'jabatans'  => $jabatan,
            'divisis'  => $divisi,
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
            'jabatan_id' => $request->jabatan_id,
            'divisi_id' => $request->divisi_id,
        ];
        if ($request->password == null) {
            unset($data['password']);
        }
        $akun = $akun->findOrFail($id);
        $akun->update($data);

        // Menghapus relasi lama
        $akun->akun_tim()->delete();

        if ($request->tim_id) {
            foreach ($request->tim_id as $value) {
                AkunTim::create([
                    'akun_id' => $akun->id,
                    'tim_id' => $value
                ]);
            }
        }
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
