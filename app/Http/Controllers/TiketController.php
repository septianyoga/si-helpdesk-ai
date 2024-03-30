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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->get();
        // dd(Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->get());
        return view('tiket.index', [
            'title' => 'Tiket',
            'tikets'    => Tiket::orderBy('created_at', 'desc')->with(['akun', 'penjawab', 'dampak_permasalahan', 'kategori_permasalahan.tim'])->get()
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
        // $tiket = Tiket::with([
        //     'akun.jabatan',
        //     'akun.divisi',
        //     'kategori_permasalahan.tim',
        //     'dampak_permasalahan',
        //     'respon' => function ($query) {
        //         $query->orderBy('created_at', 'asc'); // Mengurutkan respon dari yang terbaru ke yang terlama
        //     },
        //     'respon.lampiran'
        // ])->where('id', $id)->first();
        // $sql = $query->toSql();
        // dd($sql);
        // return $tiket;
        return view('tiket.detail_tiket', [
            'title' => 'Detail Tiket',
            'tiket' => Tiket::with([
                'akun.jabatan',
                'akun.divisi',
                'kategori_permasalahan.tim',
                'dampak_permasalahan',
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
        notify()->success('Jawab Tiket Berhasil!');
        return redirect()->to('tiket/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        //
    }

    public function buatTiket()
    {
        return view('user.tiket.buat_tiket', [
            'title' => 'Buat Tiket',
            'kategoris'  => KategoriPermasalahan::all(),
            'dampaks'   => DampakPermasalahan::all()
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
        if (!Session::has('tiket_id')) {
            notify()->error('Nomor Tiket Tidak Ditemukan!');
            return redirect()->back();
        }

        $tiket = Tiket::with([
            'akun.jabatan',
            'akun.divisi',
            'kategori_permasalahan.tim',
            'dampak_permasalahan',
            'respon.lampiran',
            'penjawab'
        ])->where('id', Session::get('tiket_id'))->first();

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
        Tiket::findOrFail($id);

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
        notify()->success('Balas Tiket Berhasil!');
        return redirect()->to('detail_tiket');
    }
}
