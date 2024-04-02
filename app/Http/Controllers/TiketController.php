<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCekTiketRequest;
use App\Http\Requests\StoreCekTiketRequets;
use App\Http\Requests\StoreCreateTiketRequest;
use App\Models\Tiket;
use App\Http\Requests\StoreTiketRequest;
use App\Http\Requests\UpdateTiketRequest;
use App\Models\Akun;
use App\Models\DampakPermasalahan;
use App\Models\KategoriPermasalahan;
use App\Models\Lampiran;
use App\Models\Respon;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Request()->c) {
            return view('tiket.tiket_trash', [
                'title' => 'Tiket Terhapus',
                'tikets'    => Tiket::onlyTrashed()->orderBy('deleted_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->get()
            ]);
        } else {
            return view('tiket.index', [
                'title' => 'Tiket',
                'tikets'    => Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->get(),
                'agents'     => Akun::where('role', 'agent')->get()
            ]);
        }
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
    public function store(StoreTiketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket, string $id)
    {
        //
        // return Tiket::withTrashed()->with([
        //     'akun.jabatan',
        //     'akun.divisi',
        //     'kategori_permasalahan.tim',
        //     'dampak_permasalahan',
        //     'respon.agent',
        //     'respon.lampiran',
        //     'penjawab'
        // ])->where('id', $id)->first();
        return view('tiket.detail_tiket', [
            'title' => 'Detail Tiket',
            'tiket' => Tiket::withTrashed()->with([
                'akun.jabatan',
                'akun.divisi',
                'kategori_permasalahan.tim',
                'dampak_permasalahan',
                'respon.agent',
                'respon.lampiran',
                'penjawab'
            ])->where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTiketRequest $request, Tiket $tiket, string $id)
    {
        //
        $cek = Tiket::findOrFail($id);
        $cek->update([
            'penjawab_id'   => Auth::user()->id
        ]);

        $chat_id = mt_rand(1, 999999);
        Respon::create([
            'id'        => $chat_id,
            'pesan'     => $request->pesan,
            'tipe'      => 'Chat',
            'action_by' => Auth::user()->id,
            'tiket_id'  => $id
        ]);
        if ($request->lampiran) {
            // insert multiple attachment
            foreach ($request->lampiran as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = public_path('lampiran') . '/' . $fileName;

                // handle file with same name
                if (file_exists($filePath)) {
                    $fileName = $file->getClientOriginalName() . '(1).' . $file->getClientOriginalExtension();
                }
                $filePath = $file->move(public_path('lampiran'), $fileName);
                Lampiran::create([
                    'nama_lampiran' => $fileName,
                    'respon_id' => $chat_id
                ]);
            }
        }


        if ($request->status != 'Open') {
            sleep(1);
            Respon::create([
                'id'        => mt_rand(1, 999999),
                'pesan'     => $request->status,
                'tipe'      => 'Closed',
                'action_by' => Auth::user()->id,
                'tiket_id'  => $id
            ]);
            $cek->update([
                'status'    => $request->status
            ]);
        }

        notify()->success('Jawab Tiket Berhasil!');
        return redirect()->to('tiket/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket, Request $request)
    {
        //
        $tikets = $tiket->findOrFail($request->id);
        $tikets->delete();
        notify()->success('Tiket Berhasil Dihapus!');
        return redirect()->to('tiket');
    }

    public function restore(Request $request)
    {
        $tiket = Tiket::onlyTrashed()->findOrFail($request->id);
        $tiket->restore();

        notify()->success('Tiket Berhasil Dikembalikan!');
        return redirect()->to('tiket?c=trashed');
    }

    public function alihTiket(Request $request)
    {
        $tiket = Tiket::findOrFail($request->id);
        $tiket->update([
            'penjawab_id'   => $request->agent_id
        ]);
        Respon::create([
            'id'        => mt_rand(1, 999999),
            'pesan'     => 'Assigned',
            'tipe'      => 'Assigned',
            'action_by' => Auth::user()->id,
            'tiket_id'  => $request->id
        ]);
        notify()->success('Tiket Berhasil Dialihkan!');
        return redirect()->to('tiket');
    }

    public function cetak(string $id)
    {
        $tiket = Tiket::withTrashed()->with([
            'akun.jabatan',
            'akun.divisi',
            'kategori_permasalahan.tim',
            'dampak_permasalahan',
            'respon.agent',
            'respon.lampiran',
            'penjawab.tim'
        ])->where('id', $id)->first();

        $css = file_get_contents(public_path() . '/template/back/dist/css/tabler.min.css');
        $demo = file_get_contents(public_path() . '/template/back/dist/css/demo.min.css');
        $vendors = file_get_contents(public_path() . '/template/back/dist/css/tabler-vendors.min.css');

        $pdf = PDF::loadView('cetak.tiket_agent', [
            'tiket' => $tiket,
            'css' => $css,
            'demo' => $demo,
            'vendors' => $vendors,
        ])->setPaper('A4')->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true, 'isJavascriptEnabled' => true
        ]);
        return $pdf->download('tiket-' . $id . '.pdf');
        // return $pdf->stream('tiket.pdf');
        // return view('cetak.tiket_agent', [
        //     'css' => $bootstrap5,
        // ]);
    }

    // user area

    public function buatTiket()
    {
        return view('user.tiket.buat_tiket', [
            'title' => 'Buat Tiket',
            'kategoris'  => KategoriPermasalahan::all(),
            'dampaks'   => DampakPermasalahan::all(),
            'user'      => Auth::user()
        ]);
    }

    public function kirimTiket(StoreCreateTiketRequest $request)
    {
        // generate a unique id
        $tiket_id = mt_rand(100000, 999999);
        $chat_id = mt_rand(1, 999999);

        // check user email & password
        $cek = Akun::where(['email' => $request->email, 'nip' => $request->nip])->first();

        if (!$cek) {
            notify()->error('Email atau NIP anda tidak terdaftar! Silahkan daftar terlebih dahulu!');
            return redirect()->to('buat_tiket');
        }

        Tiket::create([
            'id'                        => $tiket_id,
            'ringkasan_masalah'         => $request->ringkasan_masalah,
            'status'                    => 'Open',
            'tipe'                      => $request->tipe,
            'akun_id'                   => $cek->id,
            'kategori_permasalahan_id'  => $request->kategori_permasalahan_id,
            'dampak_permasalahan_id'    => $request->dampak_permasalahan_id,
        ]);
        Respon::create([
            'id'        => $chat_id,
            'pesan'     => $request->pesan,
            'tipe'      => 'Chat',
            'tiket_id'  => $tiket_id
        ]);
        if ($request->lampiran) {
            // insert multiple attachment
            foreach ($request->lampiran as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = public_path('lampiran') . '/' . $fileName;

                // handle file with same name
                if (file_exists($filePath)) {
                    $fileName = $file->getClientOriginalName() . '(1).' . $file->getClientOriginalExtension();
                }
                $filePath = $file->move(public_path('lampiran'), $fileName);
                Lampiran::create([
                    'nama_lampiran' => $fileName,
                    'respon_id' => $chat_id
                ]);
            }
        }
        notify()->success('Pembuatan Tiket Berhasil!');
        Session::put('tiket_id', $tiket_id);
        return redirect()->to('detail_tiket');
    }

    public function cekTiket()
    {
        return view('user.tiket.cek_tiket', [
            'title' => 'Cek Tiket'
        ]);
    }

    public function prosesCekTiket(StoreCekTiketRequest $request)
    {
        $tiket = Tiket::with('akun')
            ->where('id', $request->tiket_id)
            ->whereHas('akun', function ($query) use ($request) {
                $query->where('email', $request->email);
            })
            ->first();

        if ($tiket == null) {
            notify()->warning('Email atau Nomor Tiket anda tidak ditemukan!');
            return redirect()->to('cek_tiket');
        }

        Session::put('tiket_id', $request->tiket_id);
        notify()->success('Tiket Ditemukan!');
        return redirect()->to('detail_tiket');
    }

    public function detailTiket()
    {
        // dd(Request()->tiket);
        if (Request()->tiket) {
            $tiket_id = Request()->tiket;
        } else {
            $tiket_id = Session::get('tiket_id');
        }

        if (!$tiket_id) {
            notify()->error('Nomor Tiket Tidak Ditemukan!');
            return redirect()->to('/');
        }

        $tiket = Tiket::with([
            'akun.jabatan',
            'akun.divisi',
            'kategori_permasalahan.tim',
            'dampak_permasalahan',
            'respon.lampiran',
            'penjawab'
        ])->findOrFail($tiket_id);

        return view('user.tiket.detail_tiket', [
            'title' => 'Detail Tiket',
            'tiket' => $tiket
        ]);
    }

    public function logoutCekTiket()
    {
        Session::remove('tiket_id');
        return redirect()->to('/');
    }

    public function downloadLampiran(string $nama_lampiran)
    {
        $lampiran = Lampiran::where('nama_lampiran', $nama_lampiran)->first();
        $file = public_path() . "/lampiran/$lampiran->nama_lampiran";
        return Response::download($file);
    }

    public function balasTiket(UpdateTiketRequest $request, string $id)
    {
        $tiket = Tiket::findOrFail($id);

        $chat_id = mt_rand(1, 999999);
        Respon::create([
            'id'        => $chat_id,
            'pesan'     => $request->pesan,
            'tipe'      => 'Chat',
            'tiket_id'  => $id
        ]);
        if ($request->lampiran) {
            // insert multiple attachment
            foreach ($request->lampiran as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = public_path('lampiran') . '/' . $fileName;

                // handle file with same name
                if (file_exists($filePath)) {
                    $fileName = $file->getClientOriginalName() . '(1).' . $file->getClientOriginalExtension();
                }
                $filePath = $file->move(public_path('lampiran'), $fileName);
                Lampiran::create([
                    'nama_lampiran' => $fileName,
                    'respon_id' => $chat_id
                ]);
            }
        }
        if ($tiket->status != 'Open') {
            sleep(1);
            $tiket->update([
                'status'    => 'Open'
            ]);
            Respon::create([
                'id'        => mt_rand(1, 999999),
                'pesan'     => 'Open',
                'tipe'      => 'Reopened',
                'tiket_id'  => $id
            ]);
        }
        notify()->success('Balas Tiket Berhasil!');
        return redirect()->to('detail_tiket');
    }

    public function tiketUser()
    {
        return view('user.tiket.index', [
            'title'     => 'Tiket User',
            'tikets'    => Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->where('akun_id', Auth::user()->id)->get()
        ]);
    }

    // General Manager AREA !

    public function tiketKeluhan()
    {
        return view('general_manager.tiket_keluhan', [
            'title' => 'Tiket Keluhan',
            'tikets' => Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->where('tipe', 'Insiden')->get()
        ]);
    }

    public function tiketLayanan()
    {
        return view('general_manager.tiket_keluhan', [
            'title' => 'Tiket Layanan',
            'tikets' => Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->where('tipe', 'Permintaan Layanan')->get()
        ]);
    }

    public function dataAgent()
    {
        $akun = Akun::with(['tim', 'jabatan', 'divisi'])->where('role', 'Agent')->get();
        return view('general_manager.agent', [
            'title' => 'Data Agent',
            'akuns'  => $akun,
        ]);
    }
}
