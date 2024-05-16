<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Tiket</title>
    <style>
        {{ $css }} {{ $demo }} {{ $vendors }}
    </style>
    <style>
        .title {
            font-family: Arial, Helvetica, sans-serif;
            top: 105px;
        }

        .navbar-brand-image {
            /* background-color: red; */
        }

        .border {
            border: 1px solid grey;
        }

        .bg-biru {
            background-color: #c7e6ff;
        }

        .bg-kuning {
            background-color: #ead09e;
        }
    </style>
</head>

<body>
    <span style="float: right">{{ date('d/m/Y H:i:s') }}</span>
    <div class="nav" style="display: flex !important;">
        <img src="https://kb-sla.wika.co.id/uploads/images/system/2024-01/logo-it-div-stroke-putih-tipis.png"
            width="110" height="32" alt="Helpdesk" class="navbar-brand-image">
        <h5 class="title">HELPDESK IT</h5>
    </div>
    <h1 style="font-weight: bolder">Tiket #{{ $tiket->id }}</h1>
    <div class="row">
        <div class="col-6" style="float: right">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $tiket->akun->nama_akun }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $tiket->akun->email }}</td>
                    </tr>
                    <tr>
                        <td>No Telpon</td>
                        <td>:</td>
                        <td>{{ $tiket->akun->no_whatsapp }}</td>
                    </tr>
                </thead>
            </table>

        </div>
        <div class="col-6">
            <table class="table">
                <thead>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{ $tiket->status }}</td>
                    </tr>
                    <tr>
                        <td>Prioritas</td>
                        <td>:</td>
                        <td>{{ $tiket->dampak_permasalahan->prioritas }}</td>
                    </tr>
                    <tr>
                        <td>Dibuat Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($tiket->created_at)) }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-6">
            <table class="table">
                <thead>
                    <tr>
                        <td>Ditugaskan kepada</td>
                        <td>:</td>
                        <td>{{ $tiket->penjawab->nama_akun }}</td>
                    </tr>
                    <tr>
                        <td>Tim</td>
                        <td>:</td>
                        <td>{{ $tiket->penjawab?->tim?->nama_tim }}</td>
                    </tr>
                    <tr>
                        <td>Topik Permasalahan</td>
                        <td>:</td>
                        <td>{{ $tiket->kategori_permasalahan->nama_topik }}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <span style="font-weight: bolder">Detail Tiket</span>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $tiket->akun->jabatan->nama_jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Dampak</td>
                        <td>:</td>
                        <td>{{ $tiket->dampak_permasalahan->nama_dampak }}</td>
                    </tr>
                    <tr>
                        <td>Kategori Masalah</td>
                        <td>:</td>
                        <td>{{ $tiket->tipe }}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <h1 style="font-weight: bolder">{{ $tiket->ringkasan_masalah }}</h1>
    <div class="card">
        @foreach ($tiket->respon as $respons)
            @if ($respons->tipe == 'Chat')
                <table class="table border" border="1" cellpadding="5" cellspacing="10">
                    <tr class="border @if ($respons->action_by) bg-kuning @else bg-biru @endif">
                        <td>
                            <span>{{ $respons->action_by ? $respons->agent->nama_akun : $tiket->akun->nama_akun }}
                                {{ date('d/m/Y H:i:s', strtotime($respons->created_at)) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>{!! $respons->pesan !!}</td>
                    </tr>
                </table>
            @endif
        @endforeach
    </div>
    <span>Tiket #{{ $tiket->id }} dicetak oleh {{ Auth::user()->nama_akun }} pada {{ date('d/m/Y H:i:s') }}</span>
</body>

</html>
