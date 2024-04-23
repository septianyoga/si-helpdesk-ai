<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRerquest;
use App\Models\Akun;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $view = 'profile.profile_admin';
        if (Auth::user()->role == 'User') $view = 'profile.profile_user';
        return view($view, [
            'title'     => 'Profile',
            'user'      => Akun::find(Auth::user()->id),
            'jabatans'  => Jabatan::all(),
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
    public function store(Request $request)
    {
        //
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
    public function update(UpdateProfileRerquest $request)
    {
        //
        $data = [
            'nama_akun' => $request->nama_akun,
            'email' => $request->email,
            'nip' => $request->nip,
            'no_whatsapp' => $request->no_whatsapp,
            'password' => Hash::make($request->password),
            'jabatan_id' => $request->jabatan,
            'divisi_id' => $request->divisi,
        ];
        if ($request->password == null) {
            unset($data['password']);
        }
        $akun = Akun::findOrFail(Auth::user()->id);
        $akun->update($data);

        notify()->success('Profile berhasil diupdate.');
        return redirect()->to('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
