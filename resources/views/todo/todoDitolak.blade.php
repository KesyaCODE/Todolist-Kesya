<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- menambahkan bootstrap -->
        <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">

    <style>
    /* Menambahkan margin atau padding pada body */
    body {
        padding-top: 30px; /* Menambahkan jarak atas */
    }
    </style>
</head>
<body>
    <div class="container-sm">
        <nav style="--bs-breadcrumb-divider: ''; padding-left: 20px;" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="link-offset-2 link-underline link-underline-opacity-0 border border-primary rounded px-3 py-2" href="/todo/user/login/{{ $idPengguna }}">
                Beranda
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="link-offset-2 link-underline link-underline-opacity-0 border border-primary rounded px-3 py-2" href="/todo/mytodo/{{ $idPengguna }}">
                Daftar Penugasan
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="link-offset-2 link-underline link-underline-opacity-0 border border-primary rounded px-3 py-2" href="/todo/mytodo/selesai/{{ $idPengguna }}">
                Tugas Diselesaikan
            </a>
        </li>
    </ol>
    </nav>
<hr>
    <center>
        <b>
            Tugas Tidak Dikerjakan
        </b>
    </center>
    @if (count($todoDitolak)>0)
        <table border="1" align="center" class="table table-bordered">
            <tr>
                <td>No.</td>
                <td>Nama Tugas</td>
                <td>Tugas Dimulai</td>
                <td>Selesai</td>
                <td>Status</td>
            </tr>
            @foreach ( $todoDitolak as $ts )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ts->tugas }}</td>
                <td>{{ $ts->waktu_mulai }}</td>
                <td>{{ $ts->waktu_selesai }}</td>
                <td><b><font color="red">{{ $ts->keterangan }}</font></b></td>
            </tr>
            @endforeach
        </table>
    @else
        <center>Tidak ditemukan data!</center>
    @endif
    </div>
</body>
</html>