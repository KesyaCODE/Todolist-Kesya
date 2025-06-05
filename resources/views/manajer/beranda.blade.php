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
        <p align="right"><a class="link-offset-2 link-underline link-underline-opacity-0 border border-primary rounded px-3 py-2" href="/">Keluar</a></p>
        <!-- menampilkan nama admin yang log in -->
        Selamat Datang, <b>{{ $detailPegawai->nama }}!</b> 
        <hr>
        <table class="table table-striped table-hover table-bordered align-middle shadow-sm rounded w-100 mb-4">
            <thead class="table-success text-center">
                <tr>
                    <th colspan="4"><b>Menu Admin</b></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>
                        <a href="/admin/todo/dataPenugasan/{{ $detailPegawai->id }}" class="text-decoration-none">
                            Penugasan
                        </a>
                    </td>
                    <td>
                        <a class="text-decoration-none" href="/admin/todo/rincianPenugasan/{{ $detailPegawai->id }}">
                            Statistik Penugasan
                        </a>
                    </td>
                    <td>
                        <a href="#" class="text-decoration-none">Kegawaian</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>