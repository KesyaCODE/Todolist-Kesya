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
                <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/todo/user/login/{{ $idPengguna }}">
                    Beranda
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/todo/mytodo/{{ $idPengguna }}">
                    Daftar Tugas
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/todo/mytodo/selesai/{{ $idPengguna }}">
                    Tugas Selesai
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