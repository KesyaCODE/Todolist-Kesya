<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-lg">
        <p align="right"><a class="btn btn-outline-primary btn-sm" href="/">Keluar</a></p>
        Selamat Datang, <b>admin!</b>
        <hr>
        <table class="table table-striped table-hover table-bordered align-middle shadow-sm rounded">
            <tr>
                <td colspan="3" align="center"><b>Menu Penugasan</b></td>
            </tr>
            <tr align="center">
                <td><a href="/admin/todo/dataPenugasan">Daftar Penugasan</a></td>
                <td><a href="/admin/todo/mytodo/tugasDiselesaikan">Tugas Selesai</a></td>
                <td><a href="/admin/todo/mytodo/tugasDitolak">Tugas Ditolak</a></td>
            </tr>
        </table>
    </div>
</body>
</html>