<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To Do</title>

    <!-- menambahkan bootstrap -->
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">

    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <nav style="--bs-breadcrumb-divider: ''; padding-left: 20px;" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="/todo/user/login/{{ $idPengguna }}">Beranda</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="/todo/mytodo/selesai">Tugas Selesai</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="/todo/mytodo/ditolak">Tugas Ditolak</a>
        </li>
    </ol>
    </nav>
    <hr>
@if (count($daftarTugas)>0)
<table border="0" align="center">
        <tr>
            <td>No.</td>
            <td>Tugas Tersedia</td>
        </tr>
        @foreach ( $daftarTugas as $tugas )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/todo/detailTugas/{{ $tugas->id }}">{{ $tugas->tugas }}</a></td>
        </tr>
        @endforeach
    </table>
    @else
    <center>Tidak ada tugas baru!</center>
@endif
</body>
</html>