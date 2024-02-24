<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginStoreRequest;
use Illuminate\Support\Facades\Auth;

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
}
