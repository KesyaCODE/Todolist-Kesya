<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Selesai</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-md">
        <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/todo/admin">
            Beranda
        </a>
        <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/admin/todo/dataPenugasan">
            Rekap Penugasan
        </a>
        <hr>
        <table class="table table-bordered border-primary">
            <tr>
                <td>No.</td>
                <td>Nama Tugas</td>
                <td>Waktu Penugasan</td>
                <td>Waktu Selesai</td>
                <td>Pemberi</td>
                <td>Pelaksana</td>
            </tr>
            @foreach ( $penugasanSelesai as $ps )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ps->tugas }}</td>
                <td>{{ $ps->waktu_mulai }}</td>
                <td>{{ $ps->waktu_selesai }}</td>
                <td>{{ $ps->nama_pemberi }}</td>
                <td>{{ $ps->nama_penerima }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>