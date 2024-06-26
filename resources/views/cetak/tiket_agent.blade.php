<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Tiket Keluhan</title>
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

        .border,
        tr,
        th,
        td {
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
    <h1 style="font-weight: bolder">Data Agent</h1>
    <table class="table" border="1" cellpadding="5" cellspacing="10">
        <tr>
            <th>No</th>
            <th>Nama Agent</th>
            <th>Email</th>
            <th>NIP</th>
            <th>No WhatsApp</th>
            <th>Tim</th>
            <th>Jabatan</th>
            <th>Divisi</th>
            <th>Status</th>
        </tr>
        @foreach ($agents as $agent)
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $agent->nama_akun }}</td>
                <td>{{ $agent->email }}</td>
                <td>{{ $agent->nip }}</td>
                <td>{{ $agent->no_whatsapp }}</td>
                <td>{{ $agent->tim->nama_tim }}</td>
                <td>{{ $agent->jabatan->nama_jabatan }}</td>
                <td>{{ $agent->divisi->nama_divisi }}</td>
                <td>{{ $agent->is_active ? 'Aktif' : 'Non Aktif' }}</td>
            </tr>
        @endforeach
    </table>
    <span>Dicetak oleh {{ Auth::user()->nama_akun }} pada {{ date('d/m/Y H:i:s') }}</span>
</body>

</html>
