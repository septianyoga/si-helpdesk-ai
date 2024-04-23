<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginStoreRequest;
use App\Http\Requests\StoreForgotPasswordRequest;
use App\Http\Requests\StoreResetPasswordRequest;
use App\Mail\ResetPasswordMail;
use App\Models\Akun;
use App\Models\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth/login', [
            'title' => 'Login'
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
    public function store(LoginStoreRequest $request)
    {
        //
        $credentials = [
            'email' => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            notify()->success('Selamat datang ' . Auth::user()->role . ' di Website Helpdesk IT!');
            return redirect()->to('dashboard');
        }
        notify()->error('Username atau Password Salah!');
        return redirect()->back();
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
    public function destroy(Request $request)
    {
        //
        Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }

    public function lupaPassword()
    {
        return view('auth.lupa_password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function sendMail(StoreForgotPasswordRequest $request)
    {
        $akun = Akun::where('email', $request->email)->first();
        if (!$akun) {
            notify()->error('Email tidak ditemukan!');
            return redirect()->back();
        }

        $token = Str::random(60);

        $data = [
            'email'     => $request->email,
            'token'     => $token,
            'created_at'    => now()
        ];

        ResetPassword::updateOrCreate(['email'  => $request->email], $data);

        Mail::to($request->email)->send(new ResetPasswordMail(['token'  => $token, 'nama' => $akun->nama_akun]));
        notify()->success('Reset password anda sudah terkirim via email. Silahkan cek!');
        return redirect()->to('login');
    }

    public function confirmResetPass($token)
    {
        $reset_pass = ResetPassword::where('token', $token)->first();
        if (!$reset_pass) {
            notify()->warning('Token tidak valid!');
            return redirect()->to('login');
        }
        return view('auth.new_password', [
            'title' => 'Password Baru',
            'token' => $token
        ]);
    }

    public function resetPassword(StoreResetPasswordRequest $request)
    {
        $reset_pass = ResetPassword::where('token', $request->token)->first();
        if (!$reset_pass) {
            notify()->warning('Token tidak valid!');
            return redirect()->to('login');
        }

        $user = Akun::where('email', $reset_pass->email)->first();
        if (!$user) {
            notify()->warning('User tidak terdaftar!');
            return redirect()->to('login');
        }

        $user->update(['password' => Hash::make($request->password)]);

        $reset_pass->delete();
        notify()->success('Reset Password Berhasil. Silahkan Login dengan Password Baru!');
        return redirect()->to('login');
    }
}
